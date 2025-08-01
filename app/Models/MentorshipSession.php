<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorshipSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'mentor_id',
        'title',
        'description',
        'scheduled_at',
        'duration_minutes',
        'status',
        'session_type',
        'meeting_link',
        'notes',
        'price',
        'currency',
        'payment_status',
        'payment_method',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('scheduled_at', '>', now());
    }
}
