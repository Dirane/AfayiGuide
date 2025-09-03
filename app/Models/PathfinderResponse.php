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

    public function getSkillsTextAttribute(): string
    {
        $items = $this->normalizeMixedList($this->skills);
        return $items ? implode(', ', $items) : '—';
    }

    public function getInterestsTextAttribute(): string
    {
        $items = $this->normalizeMixedList($this->interests);
        return $items ? implode(', ', $items) : '—';
    }

    public function getCareerGoalsTextAttribute(): string
    {
        if (empty($this->career_goals)) {
            return '—';
        }

        $goals = is_string($this->career_goals)
            ? json_decode($this->career_goals, true)
            : $this->career_goals;

        if (is_array($goals)) {
            return implode(', ', array_filter($goals));
        }

        return (string) $this->career_goals;
    }

    public function getPreferredLocationTextAttribute(): string
    {
        $items = $this->normalizeMixedList($this->preferred_location);
        return $items ? implode(', ', $items) : '—';
    }

    public function getAspirationsTextAttribute(): string
    {
        if (empty($this->aspirations)) {
            return '—';
        }

        $asp = is_string($this->aspirations)
            ? json_decode($this->aspirations, true)
            : $this->aspirations;

        if (is_array($asp)) {
            return implode(', ', array_filter($asp));
        }

        return (string) $this->aspirations;
    }

    public function getAcademicBackgroundTextAttribute(): string
    {
        if (empty($this->academic_background)) {
            return '—';
        }

        $value = is_string($this->academic_background)
            ? json_decode($this->academic_background, true)
            : $this->academic_background;

        if (is_array($value)) {
            // Common keys we might expect
            $parts = [];
            $map = [
                'academic_level' => 'Level',
                'self_academic_rating' => 'Rating',
                'fields' => 'Fields',
                'other_fields' => 'Other',
                'current_school' => 'School',
                'year' => 'Year',
            ];
            foreach ($map as $key => $label) {
                if (!isset($value[$key]) || $value[$key] === '' || $value[$key] === null) {
                    continue;
                }
                $val = $value[$key];
                if (is_array($val)) {
                    $val = implode(', ', array_filter($val));
                }
                $parts[] = $label . ': ' . $val;
            }
            if (!empty($parts)) {
                return implode(' • ', $parts);
            }
            // Fallback: flatten all values
            return implode(' • ', array_map(function ($v) {
                if (is_array($v)) {
                    return implode(', ', array_filter($v));
                }
                return (string) $v;
            }, array_filter($value, fn($v) => $v !== null && $v !== '')));
        }

        return (string) $this->academic_background;
    }

    public function getPreferencesTextAttribute(): string
    {
        if (empty($this->preferences)) {
            return '—';
        }

        $pref = is_string($this->preferences)
            ? json_decode($this->preferences, true)
            : $this->preferences;

        if (is_array($pref)) {
            $parts = [];
            foreach ($pref as $key => $val) {
                if ($val === null || $val === '') continue;
                if (is_array($val)) {
                    $val = implode(', ', array_filter($val));
                }
                $parts[] = ucfirst(str_replace('_', ' ', (string)$key)) . ': ' . $val;
            }
            return $parts ? implode(' • ', $parts) : '—';
        }

        return (string) $this->preferences;
    }

    /**
     * Normalize a value that may contain:
     * - an array
     * - a JSON array string
     * - multiple JSON arrays separated by commas
     * - a comma-separated string possibly mixed with the above
     * Returns a flat array of strings with empty values removed.
     */
    private function normalizeMixedList($value): array
    {
        if ($value === null || $value === '') {
            return [];
        }

        // If already an array, flatten and clean
        if (is_array($value)) {
            $out = [];
            foreach ($value as $v) {
                if (is_array($v)) {
                    $out = array_merge($out, array_filter(array_map('strval', $v)));
                } elseif ($v !== null && $v !== '') {
                    $out[] = (string)$v;
                }
            }
            return array_values(array_filter(array_map(fn($s) => trim($s), $out)));
        }

        // Try a single JSON decode first
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $this->normalizeMixedList($decoded);
            }

            // Extract all JSON array fragments within the string
            preg_match_all('/\[[^\]]*\]/', $value, $matches);
            $collected = [];
            foreach ($matches[0] as $fragment) {
                $arr = json_decode($fragment, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $collected = array_merge($collected, $this->normalizeMixedList($arr));
                }
            }

            // Remove the JSON fragments and split remaining by commas
            $remaining = trim(preg_replace('/\[[^\]]*\]/', '', $value));
            if ($remaining !== '') {
                $parts = array_map('trim', explode(',', $remaining));
                foreach ($parts as $p) {
                    if ($p !== '') {
                        $collected[] = trim($p, " \"'\t\n\r");
                    }
                }
            }

            // De-duplicate while preserving order
            $unique = [];
            foreach ($collected as $item) {
                if ($item === '' || $item === null) continue;
                if (!in_array($item, $unique, true)) {
                    $unique[] = $item;
                }
            }
            return $unique;
        }

        // Fallback
        return [(string)$value];
    }
    public function getBudgetRangeTextAttribute(): string
    {
        $min = $this->budget_range_min;
        $max = $this->budget_range_max;
        $currency = $this->currency ?: 'XAF';

        if ($min === null && $max === null) {
            return '—';
        }

        if ($min !== null && $max !== null) {
            return number_format((float)$min, 0) . ' - ' . number_format((float)$max, 0) . ' ' . $currency;
        }

        if ($min !== null) {
            return '≥ ' . number_format((float)$min, 0) . ' ' . $currency;
        }

        return '≤ ' . number_format((float)$max, 0) . ' ' . $currency;
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
