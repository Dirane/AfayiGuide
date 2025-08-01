@extends('layouts.app')

@section('title', 'PathFinder - Your Journey to Success')
@section('description', 'Get personalized recommendations based on your background, goals, and aspirations.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- PathFinder Component -->
    <livewire:path-finder />
</div>
@endsection 