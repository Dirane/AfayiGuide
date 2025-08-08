<?php

namespace Database\Seeders;

use App\Models\School;
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
                'type' => 'university',
                'location' => 'Yaoundé',
                'description' => 'The University of Yaoundé I is a public university located in Yaoundé, Cameroon. It is one of the oldest and most prestigious universities in the country.',
                'contact_email' => 'info@uy1.uninet.cm',
                'contact_phone' => '+237 222 22 22 22',
                'website' => 'https://www.uy1.uninet.cm',
                'address' => 'P.O. Box 337, Yaoundé, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'English proficiency',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Submit online application',
                    'Pay application fee',
                    'Submit required documents',
                    'Attend interview (if required)',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'Passport photos',
                    'Application fee receipt',
                    'Medical certificate'
                ],
                'programs_offered' => [
                    'Computer Science',
                    'Business Administration',
                    'Law',
                    'Medicine',
                    'Engineering'
                ],
                'application_fee' => 25000,
                'tuition_fee_min' => 150000,
                'tuition_fee_max' => 250000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'University of Buea',
                'type' => 'university',
                'location' => 'Buea',
                'description' => 'The University of Buea is a public university located in Buea, Southwest Region of Cameroon. It is known for its strong programs in agriculture and environmental sciences.',
                'contact_email' => 'info@ubuea.cm',
                'contact_phone' => '+237 233 32 22 22',
                'website' => 'https://www.ubuea.cm',
                'address' => 'P.O. Box 63, Buea, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'English proficiency',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Submit online application',
                    'Pay application fee',
                    'Submit required documents',
                    'Attend interview (if required)',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'Passport photos',
                    'Application fee receipt',
                    'Medical certificate'
                ],
                'programs_offered' => [
                    'Agriculture',
                    'Environmental Sciences',
                    'Education',
                    'Arts and Humanities',
                    'Social Sciences'
                ],
                'application_fee' => 20000,
                'tuition_fee_min' => 120000,
                'tuition_fee_max' => 200000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'University of Douala',
                'type' => 'university',
                'location' => 'Douala',
                'description' => 'The University of Douala is a public university located in Douala, the economic capital of Cameroon. It offers a wide range of programs in various fields.',
                'contact_email' => 'info@univ-douala.com',
                'contact_phone' => '+237 233 42 22 22',
                'website' => 'https://www.univ-douala.com',
                'address' => 'P.O. Box 24157, Douala, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'French proficiency',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Submit online application',
                    'Pay application fee',
                    'Submit required documents',
                    'Attend interview (if required)',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'Passport photos',
                    'Application fee receipt',
                    'Medical certificate'
                ],
                'programs_offered' => [
                    'Economics',
                    'Management',
                    'Law',
                    'Medicine',
                    'Engineering'
                ],
                'application_fee' => 30000,
                'tuition_fee_min' => 180000,
                'tuition_fee_max' => 300000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'National Advanced School of Engineering',
                'type' => 'institute',
                'location' => 'Yaoundé',
                'description' => 'The National Advanced School of Engineering (ENSPY) is a prestigious engineering school in Cameroon, offering high-quality engineering education.',
                'contact_email' => 'info@enspy.cm',
                'contact_phone' => '+237 222 22 22 23',
                'website' => 'https://www.enspy.cm',
                'address' => 'P.O. Box 8390, Yaoundé, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level with Mathematics and Physics',
                    'Baccalauréat with Mathematics and Physics',
                    'Competitive entrance exam',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Register for entrance exam',
                    'Pay exam fee',
                    'Take competitive exam',
                    'Submit application if qualified',
                    'Attend interview'
                ],
                'required_documents' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'Entrance exam results',
                    'Passport photos',
                    'Medical certificate'
                ],
                'programs_offered' => [
                    'Civil Engineering',
                    'Electrical Engineering',
                    'Mechanical Engineering',
                    'Computer Engineering',
                    'Telecommunications'
                ],
                'application_fee' => 50000,
                'tuition_fee_min' => 250000,
                'tuition_fee_max' => 400000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Higher Institute of Management',
                'type' => 'institute',
                'location' => 'Yaoundé',
                'description' => 'The Higher Institute of Management (HIM) is a specialized institution offering business and management education in Cameroon.',
                'contact_email' => 'info@him.cm',
                'contact_phone' => '+237 222 22 22 24',
                'website' => 'https://www.him.cm',
                'address' => 'P.O. Box 1234, Yaoundé, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'Application form',
                    'Academic transcripts',
                    'Personal statement'
                ],
                'application_steps' => [
                    'Submit online application',
                    'Pay application fee',
                    'Submit required documents',
                    'Attend interview',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'Passport photos',
                    'Application fee receipt',
                    'Personal statement'
                ],
                'programs_offered' => [
                    'Business Administration',
                    'Finance and Banking',
                    'Marketing',
                    'Human Resource Management',
                    'Project Management'
                ],
                'application_fee' => 35000,
                'tuition_fee_min' => 200000,
                'tuition_fee_max' => 350000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Cameroon Institute of Technology',
                'type' => 'polytechnic',
                'location' => 'Douala',
                'description' => 'The Cameroon Institute of Technology (CIT) is a polytechnic institution offering practical and technical education in various fields.',
                'contact_email' => 'info@cit.cm',
                'contact_phone' => '+237 233 42 22 23',
                'website' => 'https://www.cit.cm',
                'address' => 'P.O. Box 5678, Douala, Cameroon',
                'admission_requirements' => [
                    'GCE O-Level or equivalent',
                    'GCE A-Level or equivalent',
                    'Application form',
                    'Academic transcripts',
                    'Technical aptitude'
                ],
                'application_steps' => [
                    'Submit application',
                    'Pay application fee',
                    'Submit required documents',
                    'Attend technical assessment',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Birth certificate',
                    'Academic transcripts',
                    'Passport photos',
                    'Application fee receipt',
                    'Technical assessment results'
                ],
                'programs_offered' => [
                    'Information Technology',
                    'Automotive Technology',
                    'Construction Technology',
                    'Electronics Technology',
                    'Industrial Technology'
                ],
                'application_fee' => 15000,
                'tuition_fee_min' => 80000,
                'tuition_fee_max' => 150000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
