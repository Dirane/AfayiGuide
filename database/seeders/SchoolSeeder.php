<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'University of Yaoundé I',
                'description' => 'The University of Yaoundé I is the oldest and largest university in Cameroon, offering a wide range of undergraduate and graduate programs in various fields.',
                'type' => 'university',
                'location' => 'Yaoundé',
                'website' => 'https://www.uy1.uninet.cm',
                'contact_email' => 'admissions@uy1.uninet.cm',
                'contact_phone' => '+237 222 234 567',
                'address' => 'P.O. Box 812, Yaoundé, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent qualification',
                    'Minimum age of 18 years',
                    'Proficiency in English or French',
                    'Medical certificate',
                    'Police clearance certificate',
                    'Passport-sized photographs'
                ],
                'application_steps' => [
                    'Complete the online application form',
                    'Submit required documents',
                    'Pay application fee',
                    'Take entrance examination (if required)',
                    'Attend interview (if required)',
                    'Receive admission letter'
                ],
                'documents_required' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'GCE A-Level certificate',
                    'Medical certificate',
                    'Police clearance',
                    'Passport photos',
                    'Application fee receipt'
                ],
                'application_fee' => 25000,
                'currency' => 'XAF',
                'application_deadline' => '2024-09-15',
                'academic_year_start' => '2024-10-01',
                'programs_offered' => ['Computer Science', 'Engineering', 'Medicine', 'Law', 'Business Administration'],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'University of Douala',
                'description' => 'A leading public university in Douala offering quality education in various disciplines with modern facilities and experienced faculty.',
                'type' => 'university',
                'location' => 'Douala',
                'website' => 'https://www.univ-douala.com',
                'contact_email' => 'admissions@univ-douala.com',
                'contact_phone' => '+237 233 456 789',
                'address' => 'P.O. Box 24157, Douala, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Minimum GPA of 2.5',
                    'Language proficiency test',
                    'Medical examination',
                    'Character reference letter'
                ],
                'application_steps' => [
                    'Register online account',
                    'Fill application form',
                    'Upload required documents',
                    'Pay application fee',
                    'Submit application',
                    'Wait for admission decision'
                ],
                'documents_required' => [
                    'Birth certificate',
                    'Academic records',
                    'GCE certificate',
                    'Medical report',
                    'Character reference',
                    'Application fee proof'
                ],
                'application_fee' => 30000,
                'currency' => 'XAF',
                'application_deadline' => '2024-08-30',
                'academic_year_start' => '2024-09-15',
                'programs_offered' => ['Business Administration', 'Economics', 'Engineering', 'Medicine', 'Arts'],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'National Advanced School of Engineering',
                'description' => 'Premier engineering institution in Cameroon offering specialized programs in various engineering disciplines with state-of-the-art laboratories.',
                'type' => 'polytechnic',
                'location' => 'Yaoundé',
                'website' => 'https://www.polytechnique.cm',
                'contact_email' => 'admissions@polytechnique.cm',
                'contact_phone' => '+237 222 345 678',
                'address' => 'P.O. Box 8390, Yaoundé, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level with Mathematics and Physics',
                    'Minimum age of 17 years',
                    'Physical fitness test',
                    'Technical aptitude test',
                    'Interview with faculty'
                ],
                'application_steps' => [
                    'Complete pre-registration',
                    'Submit academic documents',
                    'Take entrance examination',
                    'Undergo physical test',
                    'Attend technical interview',
                    'Receive admission notification'
                ],
                'documents_required' => [
                    'Birth certificate',
                    'GCE A-Level certificate',
                    'Mathematics and Physics results',
                    'Medical fitness certificate',
                    'Physical test results',
                    'Interview report'
                ],
                'application_fee' => 35000,
                'currency' => 'XAF',
                'application_deadline' => '2024-09-01',
                'academic_year_start' => '2024-10-01',
                'programs_offered' => ['Civil Engineering', 'Mechanical Engineering', 'Electrical Engineering', 'Computer Engineering'],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'University of Buea',
                'description' => 'Located in the scenic city of Buea, this university offers excellent programs in medicine, sciences, and humanities with a focus on research.',
                'type' => 'university',
                'location' => 'Buea',
                'website' => 'https://www.ubuea.cm',
                'contact_email' => 'admissions@ubuea.cm',
                'contact_phone' => '+237 233 567 890',
                'address' => 'P.O. Box 63, Buea, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level certificate',
                    'Biology, Chemistry, and Physics for Medicine',
                    'English language proficiency',
                    'Medical examination',
                    'Interview with admission committee'
                ],
                'application_steps' => [
                    'Create online application account',
                    'Complete application form',
                    'Submit supporting documents',
                    'Pay application fee',
                    'Take entrance examination',
                    'Attend medical interview'
                ],
                'documents_required' => [
                    'Birth certificate',
                    'GCE A-Level results',
                    'Biology, Chemistry, Physics certificates',
                    'Medical examination report',
                    'English proficiency certificate',
                    'Application fee receipt'
                ],
                'application_fee' => 40000,
                'currency' => 'XAF',
                'application_deadline' => '2024-08-15',
                'academic_year_start' => '2024-09-01',
                'programs_offered' => ['Medicine', 'Nursing', 'Pharmacy', 'Biology', 'Chemistry'],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'University of Dschang',
                'description' => 'A comprehensive university offering diverse programs in agriculture, sciences, and humanities with modern research facilities.',
                'type' => 'university',
                'location' => 'Dschang',
                'website' => 'https://www.univ-dschang.org',
                'contact_email' => 'admissions@univ-dschang.org',
                'contact_phone' => '+237 233 678 901',
                'address' => 'P.O. Box 67, Dschang, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Minimum age of 16 years',
                    'Language proficiency',
                    'Medical certificate',
                    'Character reference'
                ],
                'application_steps' => [
                    'Download application form',
                    'Complete form manually',
                    'Gather required documents',
                    'Pay application fee',
                    'Submit application package',
                    'Wait for admission letter'
                ],
                'documents_required' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'GCE certificate',
                    'Medical certificate',
                    'Character reference letter',
                    'Application fee receipt'
                ],
                'application_fee' => 20000,
                'currency' => 'XAF',
                'application_deadline' => '2024-09-30',
                'academic_year_start' => '2024-10-15',
                'programs_offered' => ['Agriculture', 'Law', 'Economics', 'Sciences', 'Arts'],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Cameroon Institute of Technology',
                'description' => 'Specialized technical institute offering practical-oriented programs in technology and applied sciences.',
                'type' => 'institute',
                'location' => 'Douala',
                'website' => 'https://www.cit-cameroon.org',
                'contact_email' => 'info@cit-cameroon.org',
                'contact_phone' => '+237 233 789 012',
                'address' => 'P.O. Box 1234, Douala, Cameroon',
                'admission_requirements' => [
                    'GCE O-Level or equivalent',
                    'Technical aptitude',
                    'Minimum age of 16 years',
                    'Physical fitness test',
                    'Technical interview'
                ],
                'application_steps' => [
                    'Register for entrance exam',
                    'Take technical aptitude test',
                    'Submit application form',
                    'Pay registration fee',
                    'Attend technical interview',
                    'Receive admission notification'
                ],
                'documents_required' => [
                    'Birth certificate',
                    'GCE O-Level certificate',
                    'Technical aptitude test results',
                    'Medical certificate',
                    'Interview report',
                    'Registration fee receipt'
                ],
                'application_fee' => 15000,
                'currency' => 'XAF',
                'application_deadline' => '2024-10-15',
                'academic_year_start' => '2024-11-01',
                'programs_offered' => ['Information Technology', 'Automotive Technology', 'Electronics', 'Construction'],
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
} 