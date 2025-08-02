# AfayiGuide User Role System

## Overview
AfayiGuide implements a comprehensive role-based access control system with three main user roles: **Student**, **Mentor**, and **Admin**. Each role has specific permissions and access to different features of the platform.

## User Roles

### 1. Student Role
**Default role for new registrations**

#### Permissions:
- ✅ View schools and their details
- ✅ Browse programs and opportunities
- ✅ Use PathFinder assessment tool
- ✅ Book mentorship sessions with mentors
- ✅ View personal dashboard with assessment history
- ✅ Download PathFinder reports
- ✅ Update personal profile

#### Dashboard Features:
- Personal assessment history
- Booked mentorship sessions
- Platform statistics overview
- Featured schools, programs, and opportunities
- Quick action buttons for main features

#### Navigation Access:
- Home
- Schools (browse only)
- Programs (browse only)
- Opportunities (browse only)
- PathFinder
- Mentorship (book sessions)
- Student Dashboard

### 2. Mentor Role
**Admin-created role for providing mentorship services**

#### Permissions:
- ✅ View schools and their details
- ✅ Browse programs and opportunities
- ✅ Use PathFinder assessment tool
- ✅ View student assessments (for guidance)
- ✅ Manage mentorship sessions
- ✅ Update mentor profile and bio
- ✅ View earnings and session statistics
- ❌ Cannot book mentorship sessions (they provide them)

#### Dashboard Features:
- Mentorship session management
- Earnings and financial overview
- Student assessment reviews
- Platform statistics
- Profile management tools
- Recent student assessments table

#### Navigation Access:
- Home
- Schools (browse only)
- Programs (browse only)
- Opportunities (browse only)
- PathFinder
- Mentor Dashboard

#### Mentor-Specific Fields:
- Expertise area
- Location
- Years of experience
- Hourly rate
- Bio/description
- Rating system
- Active/inactive status

### 3. Admin Role
**Full platform management access**

#### Permissions:
- ✅ All student and mentor permissions
- ✅ Full CRUD operations on all content
- ✅ User management (create, edit, delete users)
- ✅ Mentor management (create, edit, delete mentors)
- ✅ School management (create, edit, delete schools)
- ✅ Program management (create, edit, delete programs)
- ✅ Opportunity management (create, edit, delete opportunities)
- ✅ Assessment management (view, delete assessments)
- ✅ Report generation and analytics
- ✅ Platform settings management
- ✅ System backup and maintenance
- ✅ Export data to CSV

#### Dashboard Features:
- Comprehensive platform statistics
- User growth analytics
- Content management overview
- Recent activity monitoring
- Quick action buttons for all admin functions
- Management links to all admin sections

#### Navigation Access:
- All public features
- Admin Dashboard
- Schools Management
- Programs Management
- Opportunities Management
- Users Management
- Mentors Management
- Assessments Management
- Reports
- Settings

## Role-Based Access Control Implementation

### User Model Methods
```php
// Role checks
$user->isStudent()
$user->isMentor()
$user->isAdmin()

// Permission checks
$user->canViewSchools()
$user->canViewPrograms()
$user->canViewOpportunities()
$user->canUsePathfinder()
$user->canBookMentorship()
$user->canProvideMentorship()
$user->canManageUsers()
$user->canManageSchools()
$user->canManagePrograms()
$user->canManageOpportunities()
$user->canViewReports()
$user->canManageSettings()
$user->canViewAssessments()
$user->canManageMentors()

// Dashboard access
$user->getDashboardRoute()
$user->getDashboardTitle()
```

### Navigation Implementation
The navigation system automatically shows/hides menu items based on user permissions:

```blade
@if(auth()->user()->canViewSchools())
    <a href="{{ route('schools.index') }}">Schools</a>
@endif

@if(auth()->user()->canBookMentorship())
    <a href="{{ route('mentorship.index') }}">Mentorship</a>
@endif
```

### Dashboard Routing
- **Students**: Redirected to `/dashboard` (student dashboard)
- **Mentors**: Redirected to `/dashboard` (mentor dashboard)
- **Admins**: Redirected to `/admin/dashboard` (admin dashboard)

## Registration System

### Public Registration
- Only **Student** role available for public registration
- Mentor accounts can only be created by admins
- Admin accounts can only be created by existing admins

### Registration Fields by Role

#### Student Registration:
- Name
- Email
- Password
- Phone (optional)
- Location (optional)
- Role: Automatically set to 'student'

#### Mentor Creation (Admin Only):
- All student fields
- Expertise
- Experience years
- Hourly rate
- Bio
- Role: Set to 'mentor'

#### Admin Creation (Admin Only):
- All basic fields
- Role: Set to 'admin'

## Dashboard Views

### Student Dashboard (`/dashboard`)
- Personal assessment statistics
- Mentorship session tracking
- Featured content recommendations
- Quick action buttons
- Recent activity feed

### Mentor Dashboard (`/dashboard`)
- Session management
- Earnings overview
- Student assessment reviews
- Profile management
- Platform statistics

### Admin Dashboard (`/admin/dashboard`)
- Platform-wide statistics
- User growth analytics
- Content management overview
- Recent activity monitoring
- Quick action buttons for all admin functions

## Security Features

### Middleware Protection
- `auth` middleware for authenticated routes
- `admin` middleware for admin-only routes
- `role.redirect` middleware for proper dashboard routing

### Permission-Based Access
- All features check user permissions before allowing access
- Graceful degradation for unauthorized access
- Clear user feedback for permission restrictions

## Database Schema

### Users Table
```sql
- id (primary key)
- name
- email
- password
- role (enum: 'student', 'mentor', 'admin')
- phone (nullable)
- location (nullable)
- bio (nullable)
- profile_picture (nullable)
- preferences (json, nullable)
- expertise (nullable, for mentors)
- experience_years (nullable, for mentors)
- hourly_rate (decimal, nullable, for mentors)
- rating (decimal, nullable, for mentors)
- is_active (boolean, default true)
- email_verified_at (timestamp, nullable)
- created_at
- updated_at
```

## Role Transition

### Student to Mentor
- Only admins can promote students to mentors
- Requires additional mentor-specific information
- Maintains original user data

### Mentor to Admin
- Only existing admins can promote mentors to admins
- Requires careful consideration of permissions

### Role Demotion
- Admins can change user roles
- Maintains user history and data
- Updates permissions immediately

## Best Practices

### Permission Checking
Always check permissions before displaying features:
```php
@if(auth()->user()->canBookMentorship())
    // Show mentorship booking feature
@endif
```

### Route Protection
Use middleware to protect routes:
```php
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin-only routes
});
```

### User Experience
- Clear indication of user role in navigation
- Appropriate dashboard routing
- Permission-based feature visibility
- Helpful error messages for unauthorized access

## Future Enhancements

### Potential Role Additions
- **Partner**: Educational institutions with limited admin access
- **Moderator**: Content moderation with limited admin access
- **Premium Student**: Enhanced features for paid users

### Advanced Permissions
- Granular permission system
- Role hierarchies
- Time-based permissions
- Location-based access control

This role system provides a solid foundation for the AfayiGuide platform while maintaining security and user experience best practices. 