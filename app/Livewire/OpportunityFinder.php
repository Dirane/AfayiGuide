<?php

namespace App\Livewire;

use App\Models\Opportunity;
use Livewire\Component;
use Livewire\WithPagination;

class OpportunityFinder extends Component
{
    use WithPagination;

    public $search = '';
    public $type = '';
    public $location = '';
    public $organization = '';
    public $minAmount = '';
    public $maxAmount = '';
    public $sortBy = 'deadline';
    public $sortDirection = 'asc';
    public $appliedFilters = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'type' => ['except' => ''],
        'location' => ['except' => ''],
        'organization' => ['except' => ''],
        'minAmount' => ['except' => ''],
        'maxAmount' => ['except' => ''],
    ];

    public function mount()
    {
        // Initialize applied filters from query string
        $this->appliedFilters = [
            'search' => $this->search,
            'type' => $this->type,
            'location' => $this->location,
            'organization' => $this->organization,
            'minAmount' => $this->minAmount,
            'maxAmount' => $this->maxAmount,
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingType()
    {
        $this->resetPage();
    }

    public function updatingLocation()
    {
        $this->resetPage();
    }

    public function updatingOrganization()
    {
        $this->resetPage();
    }

    public function updatingMinAmount()
    {
        $this->resetPage();
    }

    public function updatingMaxAmount()
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
        $this->reset(['search', 'type', 'location', 'organization', 'minAmount', 'maxAmount']);
        $this->appliedFilters = [
            'search' => '',
            'type' => '',
            'location' => '',
            'organization' => '',
            'minAmount' => '',
            'maxAmount' => '',
        ];
        $this->resetPage();
    }

    public function applyFilters()
    {
        // Apply the current filter values
        $this->appliedFilters = [
            'search' => $this->search,
            'type' => $this->type,
            'location' => $this->location,
            'organization' => $this->organization,
            'minAmount' => $this->minAmount,
            'maxAmount' => $this->maxAmount,
        ];
        $this->resetPage();
    }

    public function render()
    {
        $query = Opportunity::active();

        // Apply search using applied filters
        if ($this->appliedFilters['search']) {
            $query->where(function($q) {
                $q->where('title', 'like', "%{$this->appliedFilters['search']}%")
                  ->orWhere('description', 'like', "%{$this->appliedFilters['search']}%")
                  ->orWhere('organization', 'like', "%{$this->appliedFilters['search']}%")
                  ->orWhere('location', 'like', "%{$this->appliedFilters['search']}%");
            });
        }

        // Apply filters using applied filters
        if ($this->appliedFilters['type']) {
            $query->byType($this->appliedFilters['type']);
        }

        if ($this->appliedFilters['location']) {
            $query->byLocation($this->appliedFilters['location']);
        }

        if ($this->appliedFilters['organization']) {
            $query->byOrganization($this->appliedFilters['organization']);
        }

        if ($this->appliedFilters['minAmount'] && $this->appliedFilters['maxAmount']) {
            $query->byAmountRange($this->appliedFilters['minAmount'], $this->appliedFilters['maxAmount']);
        }

        // Apply sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        $opportunities = $query->paginate(12);

        // Get filter options
        $types = Opportunity::active()
            ->whereNotNull('type')
            ->distinct()
            ->pluck('type')
            ->filter()
            ->sort()
            ->values();

        $locations = Opportunity::active()
            ->whereNotNull('location')
            ->distinct()
            ->pluck('location')
            ->filter()
            ->sort()
            ->values();

        $organizations = Opportunity::active()
            ->whereNotNull('organization')
            ->distinct()
            ->pluck('organization')
            ->filter()
            ->sort()
            ->values();

        return view('livewire.opportunity-finder', compact('opportunities', 'types', 'locations', 'organizations'));
    }
} 