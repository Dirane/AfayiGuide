<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Bachelor of Computer Science',
                'description' => 'A comprehensive program covering programming, algorithms, data structures, and software engineering principles.',
                'institution' => 'University of Yaoundé I',
                'location' => 'Yaoundé',
                'field_of_study' => 'Computer Science',
                'level' => 'Bachelor',
                'duration_months' => 36,
                'tuition_fee' => 150000,
                'currency' => 'XAF',
                'requirements' => ['GCE A-Level', 'Mathematics', 'English'],
                'curriculum' => ['Programming Fundamentals', 'Data Structures', 'Algorithms', 'Database Systems'],
                'application_deadline' => '2024-09-15',
                'start_date' => '2024-10-01',
                'website' => 'https://www.uy1.uninet.cm',
                'contact_email' => 'admissions@uy1.uninet.cm',
                'contact_phone' => '+237 222 234 567',
                'is_featured' => true,
            ],
            [
                'name' => 'Master of Business Administration',
                'description' => 'Advanced business management program focusing on leadership, strategy, and entrepreneurship.',
                'institution' => 'University of Douala',
                'location' => 'Douala',
                'field_of_study' => 'Business Administration',
                'level' => 'Master',
                'duration_months' => 24,
                'tuition_fee' => 250000,
                'currency' => 'XAF',
                'requirements' => ['Bachelor Degree', 'Work Experience', 'English'],
                'curriculum' => ['Strategic Management', 'Financial Analysis', 'Marketing', 'Operations Management'],
                'application_deadline' => '2024-08-30',
                'start_date' => '2024-09-15',
                'website' => 'https://www.univ-douala.com',
                'contact_email' => 'mba@univ-douala.com',
                'contact_phone' => '+237 233 456 789',
                'is_featured' => true,
            ],
            [
                'name' => 'Bachelor of Engineering in Civil Engineering',
                'description' => 'Engineering program focusing on infrastructure development, construction, and project management.',
                'institution' => 'National Advanced School of Engineering',
                'location' => 'Yaoundé',
                'field_of_study' => 'Engineering',
                'level' => 'Bachelor',
                'duration_months' => 48,
                'tuition_fee' => 180000,
                'currency' => 'XAF',
                'requirements' => ['GCE A-Level', 'Mathematics', 'Physics'],
                'curriculum' => ['Structural Analysis', 'Construction Management', 'Transportation Engineering', 'Hydraulics'],
                'application_deadline' => '2024-09-01',
                'start_date' => '2024-10-01',
                'website' => 'https://www.polytechnique.cm',
                'contact_email' => 'admissions@polytechnique.cm',
                'contact_phone' => '+237 222 345 678',
                'is_featured' => false,
            ],
            [
                'name' => 'Bachelor of Medicine and Surgery',
                'description' => 'Medical program preparing students for careers in healthcare and medicine.',
                'institution' => 'University of Buea',
                'location' => 'Buea',
                'field_of_study' => 'Medicine',
                'level' => 'Bachelor',
                'duration_months' => 72,
                'tuition_fee' => 300000,
                'currency' => 'XAF',
                'requirements' => ['GCE A-Level', 'Biology', 'Chemistry', 'Physics'],
                'curriculum' => ['Anatomy', 'Physiology', 'Pathology', 'Clinical Medicine'],
                'application_deadline' => '2024-08-15',
                'start_date' => '2024-09-01',
                'website' => 'https://www.ubuea.cm',
                'contact_email' => 'medicine@ubuea.cm',
                'contact_phone' => '+237 233 567 890',
                'is_featured' => true,
            ],
            [
                'name' => 'Bachelor of Laws',
                'description' => 'Comprehensive legal education program covering various aspects of law and justice.',
                'institution' => 'University of Dschang',
                'location' => 'Dschang',
                'field_of_study' => 'Law',
                'level' => 'Bachelor',
                'duration_months' => 36,
                'tuition_fee' => 120000,
                'currency' => 'XAF',
                'requirements' => ['GCE A-Level', 'English', 'History'],
                'curriculum' => ['Constitutional Law', 'Criminal Law', 'Civil Law', 'International Law'],
                'application_deadline' => '2024-09-30',
                'start_date' => '2024-10-15',
                'website' => 'https://www.univ-dschang.org',
                'contact_email' => 'law@univ-dschang.org',
                'contact_phone' => '+237 233 678 901',
                'is_featured' => false,
            ],
            [
                'name' => 'Master of Computer Science',
                'description' => 'Advanced computer science program with specialization in artificial intelligence and machine learning.',
                'institution' => 'University of Yaoundé I',
                'location' => 'Yaoundé',
                'field_of_study' => 'Computer Science',
                'level' => 'Master',
                'duration_months' => 24,
                'tuition_fee' => 200000,
                'currency' => 'XAF',
                'requirements' => ['Bachelor in Computer Science', 'Programming Skills', 'Mathematics'],
                'curriculum' => ['Machine Learning', 'Artificial Intelligence', 'Advanced Algorithms', 'Research Methods'],
                'application_deadline' => '2024-08-20',
                'start_date' => '2024-09-15',
                'website' => 'https://www.uy1.uninet.cm',
                'contact_email' => 'mcs@uy1.uninet.cm',
                'contact_phone' => '+237 222 234 567',
                'is_featured' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
