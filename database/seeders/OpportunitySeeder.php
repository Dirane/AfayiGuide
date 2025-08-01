<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $opportunities = [
            [
                'title' => 'Computer Science Scholarship',
                'description' => 'Full scholarship for outstanding students pursuing computer science degrees.',
                'type' => 'scholarship',
                'organization' => 'Cameroon Digital Foundation',
                'location' => 'Yaoundé',
                'amount' => 500000,
                'currency' => 'XAF',
                'deadline' => '2024-09-30',
                'start_date' => '2024-10-01',
                'end_date' => '2025-09-30',
                'requirements' => ['GCE A-Level', 'Mathematics', 'Programming Experience'],
                'benefits' => ['Full Tuition Coverage', 'Monthly Stipend', 'Laptop Provided'],
                'application_link' => 'https://www.cameroon-digital.org/scholarship',
                'contact_email' => 'scholarship@cameroon-digital.org',
                'contact_phone' => '+237 222 123 456',
                'is_featured' => true,
                'posted_by' => $user->id,
            ],
            [
                'title' => 'Engineering Internship Program',
                'description' => 'Paid internship opportunity for engineering students at leading construction companies.',
                'type' => 'internship',
                'organization' => 'Cameroon Engineering Consortium',
                'location' => 'Douala',
                'amount' => 150000,
                'currency' => 'XAF',
                'deadline' => '2024-08-15',
                'start_date' => '2024-09-01',
                'end_date' => '2024-12-31',
                'requirements' => ['Engineering Student', 'GPA 3.0+', 'Team Player'],
                'benefits' => ['Hands-on Experience', 'Mentorship', 'Potential Job Offer'],
                'application_link' => 'https://www.cameroon-engineering.org/internship',
                'contact_email' => 'internship@cameroon-engineering.org',
                'contact_phone' => '+237 233 234 567',
                'is_featured' => true,
                'posted_by' => $user->id,
            ],
            [
                'title' => 'Business Plan Competition',
                'description' => 'Annual competition for young entrepreneurs with cash prizes and mentorship.',
                'type' => 'workshop',
                'organization' => 'Cameroon Entrepreneurship Network',
                'location' => 'Yaoundé',
                'amount' => 1000000,
                'currency' => 'XAF',
                'deadline' => '2024-10-15',
                'start_date' => '2024-11-01',
                'end_date' => '2024-12-15',
                'requirements' => ['Age 18-35', 'Innovative Business Idea', 'Cameroonian Citizen'],
                'benefits' => ['Cash Prize', 'Business Mentorship', 'Networking Opportunities'],
                'application_link' => 'https://www.cameroon-entrepreneurship.org/competition',
                'contact_email' => 'competition@cameroon-entrepreneurship.org',
                'contact_phone' => '+237 222 345 678',
                'is_featured' => true,
                'posted_by' => $user->id,
            ],
            [
                'title' => 'Medical Research Grant',
                'description' => 'Research grant for medical students and professionals working on public health projects.',
                'type' => 'scholarship',
                'organization' => 'Cameroon Health Research Institute',
                'location' => 'Buea',
                'amount' => 750000,
                'currency' => 'XAF',
                'deadline' => '2024-09-01',
                'start_date' => '2024-10-01',
                'end_date' => '2025-09-30',
                'requirements' => ['Medical Background', 'Research Proposal', 'Academic References'],
                'benefits' => ['Research Funding', 'Publication Support', 'Conference Attendance'],
                'application_link' => 'https://www.cameroon-health.org/grant',
                'contact_email' => 'grant@cameroon-health.org',
                'contact_phone' => '+237 233 456 789',
                'is_featured' => false,
                'posted_by' => $user->id,
            ],
            [
                'title' => 'Legal Advocacy Fellowship',
                'description' => 'One-year fellowship for law graduates interested in human rights and legal advocacy.',
                'type' => 'job',
                'organization' => 'Cameroon Human Rights Center',
                'location' => 'Yaoundé',
                'amount' => 300000,
                'currency' => 'XAF',
                'deadline' => '2024-08-30',
                'start_date' => '2024-10-01',
                'end_date' => '2025-09-30',
                'requirements' => ['Law Degree', 'Human Rights Interest', 'English/French'],
                'benefits' => ['Monthly Stipend', 'Legal Training', 'Networking'],
                'application_link' => 'https://www.cameroon-humanrights.org/fellowship',
                'contact_email' => 'fellowship@cameroon-humanrights.org',
                'contact_phone' => '+237 222 567 890',
                'is_featured' => true,
                'posted_by' => $user->id,
            ],
            [
                'title' => 'Tech Startup Accelerator',
                'description' => '6-month accelerator program for tech startups with funding and mentorship.',
                'type' => 'workshop',
                'organization' => 'Cameroon Innovation Hub',
                'location' => 'Douala',
                'amount' => 2000000,
                'currency' => 'XAF',
                'deadline' => '2024-09-15',
                'start_date' => '2024-10-01',
                'end_date' => '2025-03-31',
                'requirements' => ['Tech Startup', 'MVP Ready', 'Team of 2+'],
                'benefits' => ['Seed Funding', 'Mentorship', 'Office Space', 'Investor Network'],
                'application_link' => 'https://www.cameroon-innovation.org/accelerator',
                'contact_email' => 'accelerator@cameroon-innovation.org',
                'contact_phone' => '+237 233 678 901',
                'is_featured' => true,
                'posted_by' => $user->id,
            ],
        ];

        foreach ($opportunities as $opportunity) {
            Opportunity::create($opportunity);
        }
    }
} 