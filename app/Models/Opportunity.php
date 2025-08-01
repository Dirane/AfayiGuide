<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'organization',
        'location',
        'amount',
        'currency',
        'deadline',
        'start_date',
        'end_date',
        'requirements',
        'benefits',
        'application_link',
        'contact_email',
        'contact_phone',
        'images',
        'is_featured',
        'is_active',
        'posted_by',
    ];

    protected $casts = [
        'requirements' => 'array',
        'benefits' => 'array',
        'images' => 'array',
        'amount' => 'decimal:2',
        'deadline' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

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

    public function scopeByOrganization($query, $organization)
    {
        return $query->where('organization', 'like', "%{$organization}%");
    }

    public function scopeByAmountRange($query, $min, $max)
    {
        return $query->whereBetween('amount', [$min, $max]);
    }

    public function scopeDeadlineApproaching($query, $days = 30)
    {
        return $query->where('deadline', '<=', now()->addDays($days));
    }
}
