<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'institution',
        'location',
        'field_of_study',
        'level',
        'duration_months',
        'tuition_fee',
        'currency',
        'requirements',
        'curriculum',
        'application_deadline',
        'start_date',
        'website',
        'contact_email',
        'contact_phone',
        'images',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'requirements' => 'array',
        'curriculum' => 'array',
        'images' => 'array',
        'tuition_fee' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByField($query, $field)
    {
        return $query->where('field_of_study', $field);
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', 'like', "%{$location}%");
    }

    public function scopeByLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    public function scopeByBudget($query, $min, $max)
    {
        return $query->whereBetween('tuition_fee', [$min, $max]);
    }
}
