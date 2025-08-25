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
                'tuition_fee_min' => 50000,
                'tuition_fee_max' => 75000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'University of Buea',
                'type' => 'university',
                'location' => 'Buea',
                'description' => 'The University of Buea is a public university located in Buea, Southwest Region of Cameroon. It is known for its strong programs in agriculture and environmental sciences and technology.',
                'contact_email' => 'info@ubuea.cm',
                'contact_phone' => '237 2 33 32 27 60',
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
                    'Fill the Application Form',
                    'Submit The Form',
                    'Review of Application',
                    'Get Student Letter',
                    'Submit Documents',
                    'Get Access To Your Portal',
                    'Go for Medicals',
                    'Register Courses'
                ],
                'required_documents' => [
                    'GCE O/L with passes in four approved subjects prior to sitting the GCE A/L',
                    'GCE A/L with two passes at the same sitting OR BAC in appropriate series',
                    'Birth certificate',
                    'Academic transcripts',
                    'Academic Certificate',
                    'Passport photos',
                    'Application fee receipt',
                    'Medical certificate',
                    'English Language test results (if applicable)',
                    'Special Intensive English Language Course certificate (if applicable)'
                ],
                'programs_offered' => [
                    'Advanced School of Translators and Interpreters (ASTI)',
                    'College of Technology (COT)',
                    'Faculty of Agriculture and Veterinary Medicine (FAVM)',
                    'Faculty of Arts (FA)',
                    'Faculty of Education (FED)',
                    'Faculty of Engineering and Technology (FET)',
                    'Faculty of Health Sciences (FHS)',
                    'Faculty of Laws and Political Science (FLPS)',
                    'Faculty of Science (FS)',
                    'Faculty of Social and Management Sciences (FSMS)',
                    'Higher Teachers Training College (HTTC)',
                    'Higher Technical Teachers Training College (HTTTC)'
                ],
                'application_fee' => 20000,
                'tuition_fee_min' => 50000,
                'tuition_fee_max' => 75000,
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
                'tuition_fee_min' => 50000,
                'tuition_fee_max' => 75000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Landmark Metropolitan University Institute',
                'type' => 'university',
                'location' => 'Buea',
                'description' => 'Landmark Metropolitan University Institute is a private university located in Buea, Cameroon. Known as "The Pride of Africa" and focused on training productive leaders.',
                'contact_email' => 'info@study.landmark.cm',
                'contact_phone' => '+237 672 339 570',
                'website' => 'https://www.study.landmark.cm',
                'address' => 'Campus A: Opposite UNICS BANK PLC UB JUNCTION, MOLYKO - BUEA | Campus B: TARRED MALINGO STRETCH TOWARDS MILE 18 JUNCTION, BUEA',
                'admission_requirements' => [
                    'At least a PASS in any Two (2) GCE Advanced Level Papers (excluding Religion) or its equivalence',
                    'GCE Ordinary Level Certificate or its equivalence',
                    'BAC or its equivalence',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Submit application with required documents',
                    'Pay registration fee',
                    'Receive student ID card and materials',
                    'Complete medical examination',
                    'Begin academic program'
                ],
                'required_documents' => [
                    'Photocopy of Birth Certificate',
                    'Photocopy of Ordinary Level Slip / Certificate or its equivalence',
                    'Photocopy of Advanced Level Slip / Certificate',
                    'Photocopy of BAC or its equivalence',
                    'Photocopy of National Identification Card or Passport (if applicable)',
                    'Four (4) Passport Size Photographs',
                    'Photocopy of HND Results Slip (For Top-Up Students)',
                    'Photocopy of BTech or BSc (For Masters Students)'
                ],
                'programs_offered' => [
                    'Software Engineering',
                    'Hardware Engineering',
                    'Database Development & Administration',
                    'Computer Graphics & Webdesign',
                    'Telecommunication Engineering',
                    'Networking & Security',
                    'Cyber Security',
                    'Information Technology Security',
                    'CISCO Network Package',
                    'Electrical Power System',
                    'Robotic Engineering',
                    'Electronics Engineering',
                    'Civil Engineering',
                    'Public Works Engineering',
                    'Mechanical Engineering',
                    'Devops Engineering'
                ],
                'application_fee' => 30000,
                'tuition_fee_min' => 350000,
                'tuition_fee_max' => 650000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'ICT University',
                'type' => 'university',
                'location' => 'Yaoundé',
                'description' => 'The ICT University is a specialized institution focused on Information and Communication Technology education. It provides competence-based technical education and training, research and consultancy in ICT for socio-economic development.',
                'contact_email' => 'admin@ictuniversity.edu.cm',
                'contact_phone' => '+237 651 060 049',
                'website' => 'https://ictuniversity.org',
                'address' => 'P.O. Box 526, 1 Avenue Dispensaire Messassi, Zoatoupsi, Yaounde, Cameroon',
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
                    'BSc in Information Systems and Networking (ISN)',
                    'BSc in Cyber Security',
                    'BSc in Computer Science (CS)',
                    'BSc in Renewable Energy (RE)',
                    'BSc in Software Engineering (SE)',
                    'BSc in Information and Communication Technology (ICT)',
                    'MSc in Information Systems and Networking (ISN)',
                    'MSc in Information Technology (IT)',
                    'MSc in Information Systems Security (ISS)'
                ],
                'application_fee' => 25000,
                'tuition_fee_min' => 500000,
                'tuition_fee_max' => 800000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
