<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'school_id',
        'program_name',
        'program_fee',
        'application_fee',
        'total_amount',
        'status',
        'additional_requirements',
        'notes',
        'deadline',
        'submitted_at',
        'response_date',
        'response_notes',
    ];

    protected $casts = [
        'program_fee' => 'decimal:2',
        'application_fee' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'deadline' => 'date',
        'submitted_at' => 'date',
        'response_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Pending</span>',
            'processing' => '<span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Processing</span>',
            'submitted' => '<span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Submitted</span>',
            'accepted' => '<span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Accepted</span>',
            'rejected' => '<span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Rejected</span>',
            'cancelled' => '<span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">Cancelled</span>',
            default => '<span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">Unknown</span>',
        };
    }

    public function getFormattedTotalAmountAttribute()
    {
        return number_format($this->total_amount, 0) . ' XAF';
    }

    public function getFormattedProgramFeeAttribute()
    {
        return number_format($this->program_fee, 0) . ' XAF';
    }

    public function getFormattedApplicationFeeAttribute()
    {
        return number_format($this->application_fee, 0) . ' XAF';
    }
}
