<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentors = [
            [
                'name' => 'Dr. Sarah Johnson',
                'email' => 'sarah.johnson@afayiguide.com',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'expertise' => 'Computer Science & Technology',
                'bio' => 'Experienced software engineer and educator with 10+ years in the tech industry. Specializes in helping students transition into technology careers.',
                'location' => 'Yaoundé',
                'experience_years' => 12,
                'hourly_rate' => 25000,
                'rating' => 4.8,
                'is_active' => true,
            ],
            [
                'name' => 'Prof. Michael Chen',
                'email' => 'michael.chen@afayiguide.com',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'expertise' => 'Business Administration & Entrepreneurship',
                'bio' => 'Business consultant and former startup founder. Helps students develop business acumen and entrepreneurial skills.',
                'location' => 'Douala',
                'experience_years' => 15,
                'hourly_rate' => 30000,
                'rating' => 4.9,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Amina Diallo',
                'email' => 'amina.diallo@afayiguide.com',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'expertise' => 'Medicine & Healthcare',
                'bio' => 'Medical professional with expertise in healthcare education and career guidance. Passionate about helping students pursue medical careers.',
                'location' => 'Buea',
                'experience_years' => 8,
                'hourly_rate' => 35000,
                'rating' => 4.7,
                'is_active' => true,
            ],
            [
                'name' => 'Adv. Pierre Nguemo',
                'email' => 'pierre.nguemo@afayiguide.com',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'expertise' => 'Law & Legal Studies',
                'bio' => 'Practicing lawyer and legal educator. Provides guidance on legal education and career paths in law.',
                'location' => 'Yaoundé',
                'experience_years' => 10,
                'hourly_rate' => 28000,
                'rating' => 4.6,
                'is_active' => true,
            ],
            [
                'name' => 'Eng. Fatima Hassan',
                'email' => 'fatima.hassan@afayiguide.com',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'expertise' => 'Engineering & Construction',
                'bio' => 'Civil engineer with extensive experience in infrastructure projects. Mentors students interested in engineering careers.',
                'location' => 'Douala',
                'experience_years' => 14,
                'hourly_rate' => 32000,
                'rating' => 4.8,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Jean-Paul Mbarga',
                'email' => 'jeanpaul.mbarga@afayiguide.com',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'expertise' => 'Education & Teaching',
                'bio' => 'Education specialist and former university professor. Helps students navigate academic paths and teaching careers.',
                'location' => 'Dschang',
                'experience_years' => 16,
                'hourly_rate' => 22000,
                'rating' => 4.9,
                'is_active' => true,
            ],
        ];

        foreach ($mentors as $mentor) {
            User::create($mentor);
        }
    }
} 