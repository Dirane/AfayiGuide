<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'avatar',
        'bio',
        'expertise',
        'experience_years',
        'hourly_rate',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'hourly_rate' => 'decimal:2',
    ];

    // Relationships

    public function mentorshipSessionsAsStudent()
    {
        return $this->hasMany(MentorshipSession::class, 'student_id');
    }

    public function mentorshipSessionsAsMentor()
    {
        return $this->hasMany(MentorshipSession::class, 'mentor_id');
    }

    public function pathfinderResponses()
    {
        return $this->hasMany(PathfinderResponse::class);
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

    // Permission checks
    public function canViewSchools() { return in_array($this->role, ['student', 'mentor', 'admin']); }
    public function canViewOpportunities() { return in_array($this->role, ['student', 'mentor', 'admin']); }
    public function canUsePathfinder() { return in_array($this->role, ['student', 'mentor', 'admin']); }

    public function canBookMentorship() { return $this->role === 'student'; }
    public function canProvideMentorship() { return $this->role === 'mentor'; }
    public function canManageUsers() { return $this->role === 'admin'; }
    public function canManageSchools() { return $this->role === 'admin'; }
    public function canManageOpportunities() { return $this->role === 'admin'; }
    public function canViewReports() { return $this->role === 'admin'; }
    public function canManageSettings() { return $this->role === 'admin'; }
    public function canViewAssessments() { return in_array($this->role, ['mentor', 'admin']); }
    public function canManageMentors() { return $this->role === 'admin'; }


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
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function scopeMentors($query)
    {
        return $query->where('role', 'mentor');
    }

    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }
}
