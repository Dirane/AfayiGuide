<?php

namespace App\Livewire;

use App\Models\MentorshipSession;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MentorshipBooking extends Component
{
    use WithPagination;

    public $search = '';
    public $expertise = '';
    public $location = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $selectedMentor = null;
    public $showBookingModal = false;
    public $bookingDate = '';
    public $bookingTime = '';
    public $sessionType = 'video';
    public $notes = '';
    public $appliedFilters = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'expertise' => ['except' => ''],
        'location' => ['except' => ''],
    ];

    protected $rules = [
        'bookingDate' => 'required|date|after:today',
        'bookingTime' => 'required',
        'sessionType' => 'required|in:video,audio,chat',
        'notes' => 'nullable|string|max:500',
    ];

    public function mount()
    {
        // Initialize applied filters from query string
        $this->appliedFilters = [
            'search' => $this->search,
            'expertise' => $this->expertise,
            'location' => $this->location,
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingExpertise()
    {
        $this->resetPage();
    }

    public function updatingLocation()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function clearFilters()
    {
        $this->reset(['search', 'expertise', 'location']);
        $this->appliedFilters = [
            'search' => '',
            'expertise' => '',
            'location' => '',
        ];
        $this->resetPage();
    }

    public function applyFilters()
    {
        // Apply the current filter values
        $this->appliedFilters = [
            'search' => $this->search,
            'expertise' => $this->expertise,
            'location' => $this->location,
        ];
        $this->resetPage();
    }

    public function selectMentor($mentorId)
    {
        $this->selectedMentor = User::find($mentorId);
        $this->showBookingModal = true;
    }

    public function closeBookingModal()
    {
        $this->showBookingModal = false;
        $this->selectedMentor = null;
        $this->reset(['bookingDate', 'bookingTime', 'sessionType', 'notes']);
    }

    public function bookSession()
    {
        $this->validate();

        MentorshipSession::create([
            'student_id' => auth()->id(),
            'mentor_id' => $this->selectedMentor->id,
            'session_date' => $this->bookingDate,
            'session_time' => $this->bookingTime,
            'session_type' => $this->sessionType,
            'notes' => $this->notes,
            'status' => 'pending',
        ]);

        $this->closeBookingModal();
        session()->flash('message', 'Session booked successfully! The mentor will contact you soon.');
    }

    public function render()
    {
        $query = User::where('role', 'mentor')->where('is_active', true);

        // Apply search using applied filters
        if ($this->appliedFilters['search']) {
            $query->where(function($q) {
                $q->where('name', 'like', "%{$this->appliedFilters['search']}%")
                  ->orWhere('expertise', 'like', "%{$this->appliedFilters['search']}%")
                  ->orWhere('bio', 'like', "%{$this->appliedFilters['search']}%");
            });
        }

        // Apply filters using applied filters
        if ($this->appliedFilters['expertise']) {
            $query->where('expertise', 'like', "%{$this->appliedFilters['expertise']}%");
        }

        if ($this->appliedFilters['location']) {
            $query->where('location', 'like', "%{$this->appliedFilters['location']}%");
        }

        // Apply sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        $mentors = $query->paginate(12);

        // Get filter options
        $expertiseOptions = User::where('role', 'mentor')
            ->where('is_active', true)
            ->whereNotNull('expertise')
            ->distinct()
            ->pluck('expertise')
            ->filter()
            ->sort()
            ->values();

        $locationOptions = User::where('role', 'mentor')
            ->where('is_active', true)
            ->whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->filter()
            ->sort()
            ->values();

        return view('livewire.mentorship-booking', compact('mentors', 'expertiseOptions', 'locationOptions'));
    }
} 