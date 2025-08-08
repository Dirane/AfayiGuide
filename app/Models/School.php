<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'location',
        'description',
        'image',
        'contact_email',
        'contact_phone',
        'website',
        'address',
        'admission_requirements',
        'application_steps',
        'required_documents',
        'programs_offered',
        'is_active',
        'application_fee',
        'tuition_fee_min',
        'tuition_fee_max',
        'currency',
    ];

    protected $casts = [
        'admission_requirements' => 'array',
        'application_steps' => 'array',
        'required_documents' => 'array',
        'programs_offered' => 'array',
        'is_active' => 'boolean',
        'application_fee' => 'decimal:2',
        'tuition_fee_min' => 'decimal:2',
        'tuition_fee_max' => 'decimal:2',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', 'like', "%{$location}%");
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return null;
    }

    public function getFormattedTypeAttribute()
    {
        return ucfirst($this->type);
    }

    public function getAdmissionRequirementsList()
    {
        return $this->admission_requirements ?? [];
    }

    public function getApplicationStepsList()
    {
        return $this->application_steps ?? [];
    }

    public function getRequiredDocumentsList()
    {
        return $this->required_documents ?? [];
    }

    public function getProgramsOfferedList()
    {
        return $this->programs_offered ?? [];
    }

    public function admissionApplications()
    {
        return $this->hasMany(AdmissionApplication::class);
    }

    public function getFormattedApplicationFeeAttribute()
    {
        if (!$this->application_fee) {
            return 'Not specified';
        }
        return number_format($this->application_fee, 0) . ' ' . $this->currency;
    }

    public function getFormattedTuitionRangeAttribute()
    {
        if (!$this->tuition_fee_min && !$this->tuition_fee_max) {
            return 'Not specified';
        }
        
        if ($this->tuition_fee_min && $this->tuition_fee_max) {
            if ($this->tuition_fee_min == $this->tuition_fee_max) {
                            return number_format($this->tuition_fee_min, 0) . ' ' . $this->currency;
        }
        return number_format($this->tuition_fee_min, 0) . ' - ' . number_format($this->tuition_fee_max, 0) . ' ' . $this->currency;
        }
        
        if ($this->tuition_fee_min) {
            return 'From ' . number_format($this->tuition_fee_min, 0) . ' ' . $this->currency;
        }
        
        if ($this->tuition_fee_max) {
            return 'Up to ' . number_format($this->tuition_fee_max, 0) . ' ' . $this->currency;
        }
        
        return 'Not specified';
    }

    public function hasFeeInformation()
    {
        return $this->application_fee || $this->tuition_fee_min || $this->tuition_fee_max;
    }
} 