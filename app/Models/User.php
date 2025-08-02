<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    // Permission checks
    public function canViewSchools()
    {
        return in_array($this->role, ['student', 'mentor', 'admin']);
    }

    public function canViewPrograms()
    {
        return in_array($this->role, ['student', 'mentor', 'admin']);
    }

    public function canViewOpportunities()
    {
        return in_array($this->role, ['student', 'mentor', 'admin']);
    }

    public function canUsePathfinder()
    {
        return in_array($this->role, ['student', 'mentor', 'admin']);
    }

    public function canBookMentorship()
    {
        return $this->role === 'student';
    }

    public function canProvideMentorship()
    {
        return $this->role === 'mentor';
    }

    public function canManageUsers()
    {
        return $this->role === 'admin';
    }

    public function canManageSchools()
    {
        return $this->role === 'admin';
    }

    public function canManagePrograms()
    {
        return $this->role === 'admin';
    }

    public function canManageOpportunities()
    {
        return $this->role === 'admin';
    }

    public function canViewReports()
    {
        return $this->role === 'admin';
    }

    public function canManageSettings()
    {
        return $this->role === 'admin';
    }

    public function canViewAssessments()
    {
        return in_array($this->role, ['mentor', 'admin']);
    }

    public function canManageMentors()
    {
        return $this->role === 'admin';
    }

    // Dashboard access
    public function getDashboardRoute()
    {
        if ($this->isAdmin()) {
            return route('admin.dashboard');
        }
        return route('dashboard');
    }

    public function getDashboardTitle()
    {
        if ($this->isAdmin()) {
            return 'Admin Dashboard';
        } elseif ($this->isMentor()) {
            return 'Mentor Dashboard';
        } else {
            return 'Student Dashboard';
        }
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
