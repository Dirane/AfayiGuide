<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'location',
        'website',
        'contact_email',
        'contact_phone',
        'address',
        'admission_requirements',
        'application_steps',
        'documents_required',
        'application_fee',
        'currency',
        'application_deadline',
        'academic_year_start',
        'programs_offered',
        'images',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'admission_requirements' => 'array',
        'application_steps' => 'array',
        'documents_required' => 'array',
        'programs_offered' => 'array',
        'images' => 'array',
        'application_fee' => 'decimal:2',
        'application_deadline' => 'date',
        'academic_year_start' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', 'like', "%{$location}%");
    }

    public function scopeByProgram($query, $program)
    {
        return $query->whereJsonContains('programs_offered', $program);
    }

    public function scopeDeadlineApproaching($query, $days = 30)
    {
        return $query->where('application_deadline', '<=', now()->addDays($days));
    }

    // Relationships
    public function programs()
    {
        return $this->hasMany(Program::class, 'institution', 'name');
    }

    // Helper methods
    public function isApplicationOpen()
    {
        if (!$this->application_deadline) {
            return true;
        }
        return $this->application_deadline->isFuture();
    }

    public function getDeadlineStatus()
    {
        if (!$this->application_deadline) {
            return 'No deadline set';
        }
        
        if ($this->application_deadline->isPast()) {
            return 'Application closed';
        }
        
        $daysLeft = now()->diffInDays($this->application_deadline, false);
        if ($daysLeft <= 7) {
            return 'Deadline approaching';
        }
        
        return 'Open for applications';
    }
}
