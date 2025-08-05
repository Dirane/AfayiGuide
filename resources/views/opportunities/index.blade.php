@extends('layouts.app')

@section('title', 'Opportunities Board')
@section('description', 'Discover scholarships, internships, jobs, and admissions opportunities.')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-primary text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Opportunities Board</h1>
                <p class="text-xl text-gray-200">Discover scholarships, internships, jobs, and admissions opportunities</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search and Filters -->
        <div class="card mb-8">
            <form method="GET" action="{{ route('opportunities.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Search opportunities...">
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">All Types</option>
                            <option value="scholarship" {{ request('type') === 'scholarship' ? 'selected' : '' }}>Scholarship</option>
                            <option value="internship" {{ request('type') === 'internship' ? 'selected' : '' }}>Internship</option>
                            <option value="job" {{ request('type') === 'job' ? 'selected' : '' }}>Job</option>
                            <option value="admission" {{ request('type') === 'admission' ? 'selected' : '' }}>Admission</option>
                        </select>
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <input type="text" name="location" id="location" value="{{ request('location') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Location...">
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" class="btn-primary">Apply Filters</button>
                    <a href="{{ route('opportunities.index') }}" class="btn-outline">Clear Filters</a>
                </div>
            </form>
        </div>

        <!-- Opportunities List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Sample Opportunities (Replace with actual data) -->
            <div class="card hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Scholarship
                        </span>
                        <span class="text-sm text-gray-500">Deadline: Dec 15, 2024</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Merit Scholarship Program</h3>
                    <p class="text-gray-600 mb-4">Full scholarship for outstanding students with exceptional academic records.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">University of Yaoundé</span>
                        <a href="#" class="text-primary hover:text-primary-800 text-sm font-medium">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            Internship
                        </span>
                        <span class="text-sm text-gray-500">Duration: 3 months</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Software Development Intern</h3>
                    <p class="text-gray-600 mb-4">Gain hands-on experience in web development and software engineering.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">TechCorp Cameroon</span>
                        <a href="#" class="text-primary hover:text-primary-800 text-sm font-medium">Apply Now</a>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                            Admission
                        </span>
                        <span class="text-sm text-gray-500">Open Now</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Computer Science Program</h3>
                    <p class="text-gray-600 mb-4">Bachelor's degree in Computer Science with modern curriculum.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">ENSPY</span>
                        <a href="#" class="text-primary hover:text-primary-800 text-sm font-medium">Apply</a>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                            Job
                        </span>
                        <span class="text-sm text-gray-500">Full-time</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Marketing Assistant</h3>
                    <p class="text-gray-600 mb-4">Entry-level position for recent graduates with strong communication skills.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Marketing Solutions Ltd</span>
                        <a href="#" class="text-primary hover:text-primary-800 text-sm font-medium">Apply</a>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Scholarship
                        </span>
                        <span class="text-sm text-gray-500">Deadline: Jan 30, 2025</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Women in STEM Scholarship</h3>
                    <p class="text-gray-600 mb-4">Supporting women pursuing degrees in Science, Technology, Engineering, and Mathematics.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Cameroon Women in Tech</span>
                        <a href="#" class="text-primary hover:text-primary-800 text-sm font-medium">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="card hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            Internship
                        </span>
                        <span class="text-sm text-gray-500">Duration: 6 months</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Business Analyst Intern</h3>
                    <p class="text-gray-600 mb-4">Learn business analysis and project management in a dynamic environment.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Business Consulting Group</span>
                        <a href="#" class="text-primary hover:text-primary-800 text-sm font-medium">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="px-3 py-2 text-sm font-medium text-white bg-primary border border-primary rounded-md">
                    1
                </a>
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    3
                </a>
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Next
                </a>
            </nav>
        </div>

        <!-- Call to Action -->
        <div class="mt-12 text-center">
            <div class="card bg-primary text-white">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-4">Don't See What You're Looking For?</h2>
                    <p class="text-lg mb-6">Our mentorship services can help you find the right opportunities for your career goals.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('mentorship.index') }}" class="btn-accent">Book Mentorship Session</a>
                        <a href="{{ route('pathfinder.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-primary">Take PathFinder Assessment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 