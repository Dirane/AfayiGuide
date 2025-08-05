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
    ];

    protected $casts = [
        'admission_requirements' => 'array',
        'application_steps' => 'array',
        'required_documents' => 'array',
        'programs_offered' => 'array',
        'is_active' => 'boolean',
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
} 