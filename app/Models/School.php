<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type', // university, polytechnic, college, institute
        'location',
        'city',
        'region',
        'country',
        'website',
        'email',
        'phone',
        'description',
        'logo',
        'images',
        'accreditation',
        'founded_year',
        'student_population',
        'is_public',
        'is_active',
        'application_deadline',
        'tuition_range_min',
        'tuition_range_max',
        'currency',
        'languages_offered',
        'specializations',
        'admission_requirements',
        'contact_person',
        'contact_position',
        'social_media',
    ];

    protected $casts = [
        'images' => 'array',
        'languages_offered' => 'array',
        'specializations' => 'array',
        'social_media' => 'array',
        'is_public' => 'boolean',
        'is_active' => 'boolean',
        'founded_year' => 'integer',
        'student_population' => 'integer',
        'tuition_range_min' => 'decimal:2',
        'tuition_range_max' => 'decimal:2',
        'application_deadline' => 'date',
    ];

    // Relationships
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopePrivate($query)
    {
        return $query->where('is_public', false);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', 'like', "%{$location}%")
                    ->orWhere('city', 'like', "%{$location}%")
                    ->orWhere('region', 'like', "%{$location}%");
    }

    public function scopeByCountry($query, $country)
    {
        return $query->where('country', $country);
    }

    // Accessors
    public function getFullAddressAttribute()
    {
        return "{$this->location}, {$this->city}, {$this->region}, {$this->country}";
    }

    public function getTuitionRangeAttribute()
    {
        if ($this->tuition_range_min && $this->tuition_range_max) {
            return "{$this->currency} {$this->tuition_range_min} - {$this->tuition_range_max}";
        }
        return null;
    }

    // Methods
    public function isAcceptingApplications()
    {
        if (!$this->application_deadline) {
            return true;
        }
        return now()->lte($this->application_deadline);
    }

    public function getProgramsCount()
    {
        return $this->programs()->count();
    }

    public function getActiveProgramsCount()
    {
        return $this->programs()->active()->count();
    }
}
