<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'bio',
        'profile_picture',
        'preferences',
        'expertise',
        'location',
        'experience_years',
        'hourly_rate',
        'rating',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'preferences' => 'array',
            'hourly_rate' => 'decimal:2',
            'rating' => 'decimal:1',
            'is_active' => 'boolean',
        ];
    }

    // Relationships
    public function pathfinderResponses()
    {
        return $this->hasMany(PathfinderResponse::class);
    }

    public function studentSessions()
    {
        return $this->hasMany(MentorshipSession::class, 'student_id');
    }

    public function mentorSessions()
    {
        return $this->hasMany(MentorshipSession::class, 'mentor_id');
    }

    public function mentorshipSessions()
    {
        return $this->hasMany(MentorshipSession::class, 'mentor_id');
    }

    public function postedOpportunities()
    {
        return $this->hasMany(Opportunity::class, 'posted_by');
    }

    // Role checks
    public function isStudent()
    {
        return $this->role === 'student';
    }

    public function isMentor()
    {
        return $this->role === 'mentor';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPartner()
    {
        return $this->role === 'partner';
    }

    // Scopes
    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    public function scopeMentors($query)
    {
        return $query->where('role', 'mentor');
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopePartners($query)
    {
        return $query->where('role', 'partner');
    }
}
