<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathfinderResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'academic_background',
        'field_of_interest',
        'career_goals',
        'aspirations',
        'skills',
        'interests',
        'preferred_location',
        'budget_range_min',
        'budget_range_max',
        'currency',
        'preferences',
        'additional_notes',
        'recommended_programs',
        'recommended_opportunities',
        'pathway_report',
        'report_file_path',
        'is_completed',
    ];

    protected $casts = [
        'skills' => 'array',
        'interests' => 'array',
        'preferences' => 'array',
        'recommended_programs' => 'array',
        'recommended_opportunities' => 'array',
        'budget_range_min' => 'decimal:2',
        'budget_range_max' => 'decimal:2',
        'is_completed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedFieldOfInterestAttribute()
    {
        if (!$this->field_of_interest) {
            return 'General Assessment';
        }

        $field = is_string($this->field_of_interest) 
            ? json_decode($this->field_of_interest, true) 
            : $this->field_of_interest;

        if (is_array($field)) {
            return implode(', ', $field);
        }

        return $this->field_of_interest;
    }

    public function scopeCompleted($query)
    {
        return $query->where('is_completed', true);
    }

    public function scopeByAcademicBackground($query, $background)
    {
        return $query->where('academic_background', $background);
    }

    public function scopeByFieldOfInterest($query, $field)
    {
        return $query->where('field_of_interest', $field);
    }

    public function generateRecommendations()
    {
        // Get programs based on field of interest and budget
        $programs = Program::active()
            ->byField($this->field_of_interest)
            ->when($this->budget_range_min && $this->budget_range_max, function($query) {
                return $query->byBudget($this->budget_range_min, $this->budget_range_max);
            })
            ->limit(5)
            ->get();

        // Get opportunities based on location
        $opportunities = Opportunity::active()
            ->when($this->preferred_location, function($query) {
                return $query->byLocation($this->preferred_location);
            })
            ->limit(5)
            ->get();

        $this->update([
            'recommended_programs' => $programs->toArray(),
            'recommended_opportunities' => $opportunities->toArray(),
        ]);

        return $this;
    }

    public function generatePathwayReport()
    {
        $report = "## Personalized Pathway Report for {$this->user->name}\n\n";
        $report .= "### Academic Background\n";
        $report .= "- {$this->academic_background}\n\n";
        
        $report .= "### Career Goals\n";
        $report .= "{$this->career_goals}\n\n";
        
        $report .= "### Aspirations\n";
        $report .= "{$this->aspirations}\n\n";
        
        if ($this->skills) {
            $report .= "### Skills\n";
            foreach ($this->skills as $skill) {
                $report .= "- {$skill}\n";
            }
            $report .= "\n";
        }
        
        $report .= "### Recommended Programs\n";
        if ($this->recommended_programs) {
            foreach ($this->recommended_programs as $program) {
                $report .= "- **{$program['name']}** at {$program['institution']}\n";
                $report .= "  - Location: {$program['location']}\n";
                $report .= "  - Duration: {$program['duration_months']} months\n";
                $report .= "  - Tuition: {$program['currency']} {$program['tuition_fee']}\n\n";
            }
        }
        
        $report .= "### Recommended Opportunities\n";
        if ($this->recommended_opportunities) {
            foreach ($this->recommended_opportunities as $opportunity) {
                $report .= "- **{$opportunity['title']}** by {$opportunity['organization']}\n";
                $report .= "  - Type: {$opportunity['type']}\n";
                $report .= "  - Location: {$opportunity['location']}\n";
                if ($opportunity['amount']) {
                    $report .= "  - Amount: {$opportunity['currency']} {$opportunity['amount']}\n";
                }
                $report .= "\n";
            }
        }
        
        $report .= "### Next Steps\n";
        $report .= "1. Review the recommended programs and opportunities\n";
        $report .= "2. Contact institutions for more information\n";
        $report .= "3. Apply for scholarships and opportunities\n";
        $report .= "4. Schedule mentorship sessions for guidance\n";
        $report .= "5. Stay updated with new opportunities\n";
        
        $this->update(['pathway_report' => $report]);
        
        return $this;
    }
}
