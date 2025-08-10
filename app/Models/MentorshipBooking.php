<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MentorshipBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'whatsapp_number',
        'email',
        'session_duration',
        'amount',
        'session_topic',
        'additional_notes',
        'status',
        'assigned_mentor_id',
        'scheduled_at',
        'completed_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'completed_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedMentor()
    {
        return $this->belongsTo(User::class, 'assigned_mentor_id');
    }

    public function getFormattedSessionTopicAttribute()
    {
        if (!$this->session_topic) {
            return 'General Session';
        }

        return Str::limit($this->session_topic, 40);
    }

    public function getDurationTextAttribute()
    {
        return match($this->session_duration) {
            '15min' => '15 minutes',
            '30min' => '30 minutes',
            '1hour' => '1 hour',
            default => $this->session_duration,
        };
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'assigned' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
