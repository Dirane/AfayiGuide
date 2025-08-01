<?php

namespace App\Livewire;

use App\Models\Program;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramFinder extends Component
{
    use WithPagination;

    public $search = '';
    public $field = '';
    public $location = '';
    public $level = '';
    public $minBudget = '';
    public $maxBudget = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'field' => ['except' => ''],
        'location' => ['except' => ''],
        'level' => ['except' => ''],
        'minBudget' => ['except' => ''],
        'maxBudget' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingField()
    {
        $this->resetPage();
    }

    public function updatingLocation()
    {
        $this->resetPage();
    }

    public function updatingLevel()
    {
        $this->resetPage();
    }

    public function updatingMinBudget()
    {
        $this->resetPage();
    }

    public function updatingMaxBudget()
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
        $this->reset(['search', 'field', 'location', 'level', 'minBudget', 'maxBudget']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Program::active();

        // Apply search
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('institution', 'like', "%{$this->search}%")
                  ->orWhere('field_of_study', 'like', "%{$this->search}%")
                  ->orWhere('location', 'like', "%{$this->search}%");
            });
        }

        // Apply filters
        if ($this->field) {
            $query->byField($this->field);
        }

        if ($this->location) {
            $query->byLocation($this->location);
        }

        if ($this->level) {
            $query->byLevel($this->level);
        }

        if ($this->minBudget && $this->maxBudget) {
            $query->byBudget($this->minBudget, $this->maxBudget);
        }

        // Apply sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        $programs = $query->paginate(12);

        // Get filter options
        $fields = Program::active()->distinct()->pluck('field_of_study')->sort();
        $locations = Program::active()->distinct()->pluck('location')->sort();
        $levels = Program::active()->distinct()->pluck('level')->sort();

        return view('livewire.program-finder', compact('programs', 'fields', 'locations', 'levels'));
    }
}
