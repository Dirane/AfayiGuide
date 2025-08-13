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
            [
                'name' => 'HIMS BUEA Higher Institute of Management Studies',
                'type' => 'institute',
                'location' => 'Buea',
                'description' => 'HIMS BUEA is a higher institute of management studies located in Buea, Cameroon. The institution focuses on providing quality education in business, management, tourism, logistics, engineering, and medical sciences with the motto "Together Let\'s Shape Your Future."',
                'contact_email' => 'info@himsbuea.org',
                'contact_phone' => '+(237)671 854 464 / 652 203 039 / 657 080 102 / 683 522 606',
                'website' => 'www.himsbuea.org',
                'address' => 'Mayor Street, Molyko-Buea, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'English proficiency',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Submit application form',
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
                    'School of Business and Management (HND/B.TECH): Accountancy, Banking and Finance, Insurance, Marketing, Human Resource Management, Administrative Assistance/Executive Secretarial Studies',
                    'Bachelor of Business Administration (BBA): Management, Supply Chain Management',
                    'Master of Business Administration (MBA): Accountancy, Banking and Finance, Marketing, Human Resource Management, Project Management, Management, Insurance and Risk Management, Managerial Economics, Logistics Management',
                    'School of Tourism, Logistics and Transport Management (HND/B.TECH): Logistics and Transport Management, Port and Shipping Management, Custom and Transit, Hotel Management and Catering, Tourism and Travel Agency Management',
                    'School of Engineering and Technology (HND/B.TECH): Software Engineering, Hardware Maintenance, Networks and Security, Computer Science Networks, Computer Graphic Design, E-Commerce and Digital Marketing',
                    'School of Medical and Biomedical Sciences (HND/B.TECH): Nursing, Medical Laboratory Sciences, Mid-wifery, Healthcare Management'
                ],
                'application_fee' => 25000,
                'tuition_fee_min' => 300000,
                'tuition_fee_max' => 600000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Catholic University Institute of Buea (CUIB)',
                'type' => 'university',
                'location' => 'Buea',
                'description' => 'The Catholic University Institute of Buea (CUIB) is a private Catholic university located in Buea, Cameroon. It focuses on providing quality education with emphasis on entrepreneurship and vocational competence. The university offers programs across multiple schools including business, engineering, agriculture, health sciences, and information technology.',
                'contact_email' => 'info@cuib-cameroon.net',
                'contact_phone' => '(+237) 656062976 / 677001470',
                'website' => 'www.cuib-cameroon.org',
                'address' => 'P.O.Box 563, Buea, SW Region, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'English proficiency',
                    'Vocational competence and passion for chosen field',
                    'One page essay justifying passion for chosen field',
                    'Two references',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Visit CUIB website and complete online application',
                    'Upload required documents',
                    'Submit application form online',
                    'Pay application fee',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Birth certificate',
                    'Academic transcripts (O level, A level, Baccalaureate, Probatoire)',
                    'Passport photos',
                    'Application fee receipt',
                    'Medical certificate',
                    'One page essay on vocational competence',
                    'Two reference contacts',
                    'Detailed academic transcript (for transfer students)',
                    'Hand-written application explaining transfer circumstances (for transfer students)'
                ],
                'programs_offered' => [
                    'School of Business: HND (Accountancy, Human Resource Management, Logistics & Transport Management), BTECH (Accountancy, Human Resource Management and Employment Relations), BSc (Accountancy, Banking & Finance, Management, Human Resource Management and Employment Relations, Marketing, Insurance and Risk Management), Masters (Accountancy, Finance, Human Resource Management and Employment Relations)',
                    'School of Agriculture and Natural Resources: HND (Food Technology, Agro-Pastoral Advisers), BTECH (Food Technology), BSc (Integrated Agriculture), MSc (Nutrition and Food Quality, Organic Crop Production, Organic Livestock Husbandry & Breeding, Sustainable Agriculture & Development)',
                    'School of Engineering: HND (Civil Engineering Technology, Building Science and Technology, Industrial Computing and Automation, Electrical Engineering Power Systems), BTECH (Civil Engineering Technology, Electrical Power Systems), BSc (Chemical Engineering, Civil & Environmental Engineering, Electrical & Computer Engineering, Mechanical Engineering)',
                    'School of Information Technology: Certification (Huawei Certified ICT Associate, Oracle Certified Associate OCA, CompTIA Security+), HND (Network & Security, Computer Science & Network, Computer Graphics & Web Design, E-Commerce & Digital Marketing), BTECH (Network & Security, Computer Graphics & Web Design), BSc (Cyber Security, Software Engineering), MSc (Cyber Security, Software Engineering)',
                    'School of Health Sciences: Top-Up BSc (Health Sanitary Inspection, Nursing, Medical Laboratory Science, Midwifery, Healthcare Management Technology), HND (Nursing, Medical Laboratory Science, Midwifery, Pharmacy Technology), BSc (Healthcare Management, Nursing, Medical Laboratory Science, Midwifery, Pharmacy Technology)',
                    'School of Arts and Education: Bachelor of Education (Educational Administration & Leadership, Curriculum Innovation & Development Education, Psychology)',
                    'School of Journalism & Communication: BSc (Journalism & Communication)',
                    'School of Law: Bachelor of Law (Law)'
                ],
                'application_fee' => 45000,
                'tuition_fee_min' => 400000,
                'tuition_fee_max' => 1000000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Biaka University Institute of Buea (BUIB)',
                'type' => 'university',
                'location' => 'Buea',
                'description' => 'Biaka University Institute of Buea (BUIB) is a private university located in Buea, Cameroon. The institution focuses on providing transparent and affordable quality education with emphasis on learning and development, professionalism, and international student support. BUIB offers flexible application options including online and on-campus application processes.',
                'contact_email' => 'infocm@biakahc.org',
                'contact_phone' => '+237 671 710 796 / +237 675-800-610',
                'website' => 'https://biakahc.org/',
                'address' => 'Bokoko, Biaka St, Buea, South West Region, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'English proficiency',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Visit apply.buibsystems.org',
                    'Create applicant account with personal details',
                    'Fill out online application form accurately',
                    'Upload required documents',
                    'Review information before submitting',
                    'Track application status through portal',
                    'Pay application fee',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Certified copies of Ordinary level certificates',
                    'Certified copies of Advanced level certificates',
                    'Birth certificate',
                    'Application fee receipt',
                    'HND result slip (for Top-up programs)',
                    'BSc attestation/certificate (for Post Graduate programs)',
                    'Academic transcripts',
                    'ID card',
                    'Passport photo'
                ],
                'programs_offered' => [
                    'School of Health Sciences (SHS): HND Programs (Tuition: 400,000 XAF, Registration: 40,000 XAF), BSc Programs (Tuition: 400,000 XAF, Registration: 90,000 XAF), Top-Up BSc Programs (Tuition: 450,000 XAF, Registration: 120,000 XAF), MSc Programs (Tuition: 500,000 XAF, Registration: 137,000 XAF)',
                    'School of Management Sciences (SMS): HND Programs (Tuition: 300,000 XAF, Registration: 25,000 XAF), BSc Programs (Tuition: 350,000 XAF, Registration: 75,000 XAF), MSc Programs (Tuition: 500,000 XAF, Registration: 125,000 XAF)',
                    'School of Engineering and Technology (SET): BSc Programs (Tuition: 400,000 XAF, Registration: 75,000 XAF)',
                    'School of Education (SED): BEd Programs (Tuition: 200,000 XAF, Registration: 75,000 XAF), MEd Programs (Tuition: 300,000 XAF, Registration: 125,000 XAF)',
                    'School of Agricultural Sciences (SAS): HND Programs (Tuition: 300,000 XAF, Registration: 25,000 XAF), BSc Programs (Tuition: 350,000 XAF, Registration: 75,000 XAF), MSc Programs (Tuition: 500,000 XAF, Registration: 125,000 XAF)'
                ],
                'application_fee' => 15500,
                'tuition_fee_min' => 200000,
                'tuition_fee_max' => 637000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Chartered Higher Institute of Technology and Management (CHITECHMA)',
                'type' => 'institute',
                'location' => 'Buea',
                'description' => 'CHITECHMA University is a higher institute of technology and management authorized by the Ministry of Higher Education in Buea, Cameroon. The institution focuses on promoting capacity building, professionalism, and integrity with a mission to ensure graduates integrate seamlessly into society. CHITECHMA offers both national and international programs with innovative teaching methods including 80% online and 20% on-site delivery for master\'s programs.',
                'contact_email' => 'info@chitechma.com',
                'contact_phone' => '+237 233 323 893 / 650 675 076 / 675 254 348',
                'website' => 'https://chitechma.com',
                'address' => 'Opposite Presbyterian Church – Molyko, Buea, Cameroon. P.O Box 218 Buea, Cameroon',
                'admission_requirements' => [
                    'At least 2 Advanced level papers (excluding religion studies)',
                    'At least 4 Ordinary level papers (excluding religion studies)',
                    'Equivalents of the above mentioned qualifications',
                    'Application form',
                    'Registration fee payment'
                ],
                'application_steps' => [
                    'Click on APPLY NOW button',
                    'Create an account',
                    'Start the application process',
                    'Submit required documents',
                    'Pay registration fee',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Photocopy of academic credentials',
                    'Photocopy of Birth Certificate',
                    'Photocopy of national ID card or resident permit for foreigners',
                    'Passport size photographs (2-4 depending on program)',
                    'Filled admission form',
                    'Registration fee receipt',
                    'Certified copy of Degree (for Masters/MBA/M-TECH)',
                    'Certified copy of Transcript (for Masters/MBA/M-TECH)',
                    'Medical Certificate (for Masters/MBA/M-TECH)',
                    'HND result slip (for B-TECH and BSc TOP-UP)'
                ],
                'programs_offered' => [
                    'School of Engineering and Technology: Computer Software Engineering, Computer Hardware Maintenance, Digital Marketing and E-commerce, Network and Security, Electrical and Electronic Engineering, M-TECH in Software Engineering, M-TECH in Network and Security',
                    'School of Business, Finance and Management: Logistics and Transport Management, Human Resource Management, Project Management, Accountancy, Banking and Finance, Marketing & Trade Sales, Insurance, Assistant Manager, MBA in Project Management, MBA in Entrepreneurship and Business Management, MBA in Accounting and Audit, MBA in Digital Marketing And Branding, M.Sc in Logistics and Transport Management, M.Sc in Human Resource Management, M.Sc in Project Management, M.Sc in Accounting and Financial Management, M.Sc in Supply Chain Management and Procurement',
                    'School of Home Economics, Tourism and Hotel Management: Bakery And Food Processing, Fashion Design, Clothing And Textile, Tourism And Travel Agency Management, Hotel Management And Catering, Hospitality Management, M.Sc in Food Processing & Technology, M.Sc in Nutrition and Dietetics',
                    'School of Biomedical Sciences: Nursing, Midwifery, Medical Laboratory Science programs',
                    'Short Diploma Programs: Web Development, Industrial Safety (QHSE), Computerized Accounting, Project Management, Human Resource Management, Bakery And Pastry, Interior And Exterior Decoration, ICT Basics, Computer Maintenance, Secretariat Studies, Graphic Design',
                    'International Programs: Project Management Professional, ABMA, Diploma Programs for International Students'
                ],
                'application_fee' => 10000,
                'tuition_fee_min' => 250000,
                'tuition_fee_max' => 450000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Redemption Higher Institute of Biomedical Sciences (RHIBMS)',
                'type' => 'institute',
                'location' => 'Buea',
                'description' => 'RHIBMS  is a premier institution dedicated to excellence in healthcare education, research, and innovation. The institute focuses on offering cutting-edge programs in medicine, nursing, laboratory sciences, and public health, equipping students with hands-on training and leadership skills to address Africa\'s unique health challenges. RHIBMS is accredited and industry-aligned, fostering future-ready healthcare professionals committed to transforming communities.',
                'contact_email' => 'info@rhibms.org',
                'contact_phone' => '(+237) 677 172 022 / 681 019 578 / 671 507 814 / 233 324 850',
                'website' => 'https://rhibms.org',
                'address' => 'Molyko Buea CMR, Opposite Pres Hostel, Tarred Malingo, Buea, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'English proficiency',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Fill online application form',
                    'Submit required documents',
                    'Pay application fee',
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
                    'School of Health Sciences: Various healthcare and biomedical programs',
                    'School of Engineering and Technology: Engineering and technology programs',
                    'School of Agriculture: HND Food Technology (2 years, 250,000 XAF), HND Agro Pastoral Entrepreneurship (2 years, 250,000 XAF), HND Agro Pastoral Adviser (2 years, 250,000 XAF), Crop Production Technology (2 years, 250,000 XAF)',
                    'School of Management Sciences: Business and management programs',
                    'School of Home Economics: HND Fashion Clothing and Textile (2 years, 250,000 XAF), HND Bakery and Food Processing (2 years, 250,000 XAF)'
                ],
                'application_fee' => 25000,
                'tuition_fee_min' => 250000,
                'tuition_fee_max' => 500000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'Higher Institute of Business and Engineering Sciences (HIBES)',
                'type' => 'institute',
                'location' => 'Buea',
                'description' => 'HIBES is a private Higher Education Institution authorized by the Ministry of Higher Education (MINESUP), Cameroon with License N: 21-03652/L/MINESUP/SG/DDES/ESUP/SDA/ and 23-00487/L/MINESUP/SG/DDES/ESUP/SDA/MF. Located in Buea metropolitan city at the feet of mount Fako in the quiet suburb of Molyko, HIBES focuses on innovation and entrepreneurship, transforming minds and attitudes to adapt to current global challenges in education. The institution offers a two-year compulsory entrepreneurial training for all students irrespective of their program.',
                'contact_email' => 'infos@hibesb.com',
                'contact_phone' => '+237 682462403 / +237 651948117 / +237 676619572',
                'website' => 'https://hibesb.com',
                'address' => 'Molyko, Buea, Cameroon',
                'admission_requirements' => [
                    'A pass in at least two Advance level subjects (excluding Religion)',
                    'Ordinary level slip/certificate (Anglophone) OR Probatoire results (Francophone)',
                    'Advanced level slip/certificate (Anglophone) OR Baccalaureate (Francophone)',
                    'Application form',
                    'Application fee payment'
                ],
                'application_steps' => [
                    'Submit application with required documents',
                    'Pay application fee of 25,000 XAF',
                    'Submit photocopies of academic credentials',
                    'Provide passport size photographs',
                    'Receive admission letter'
                ],
                'required_documents' => [
                    'Photocopy of Ordinary level slip/certificate OR Probatoire results',
                    'Photocopy of Advanced level slip/certificate OR Baccalaureate',
                    'Birth certificate',
                    'Valid Identity Card',
                    'Two passport size photographs',
                    'Application fee receipt (25,000 XAF)'
                ],
                'programs_offered' => [
                    'School of Business Management: HND programs (Registration: 25,000 XAF, Tuition: 235,000 XAF with 22% scholarship)',
                    'School of Legal Studies: HND programs (Registration: 25,000 XAF, Tuition: 235,000 XAF with 22% scholarship)',
                    'School of Engineering: Civil & Structural Engineering (Registration: 25,000 XAF, Tuition: 290,000 XAF with 17% scholarship), Electrical & Electronic (Registration: 25,000 XAF, Tuition: 265,000 XAF with 24% scholarship), Computer Science (Registration: 25,000 XAF, Tuition: 245,000 XAF with 30% scholarship)',
                    'School of Health & Biomedical Sciences: HND programs (Registration: 25,000 XAF, Tuition: 300,000 XAF with 21% scholarship)',
                    'School of Home Economics, Tourism & Hotel Management: HND programs (Registration: 25,000 XAF, Tuition: 260,000 XAF with 32% scholarship)',
                    'School of Agriculture: HND programs',
                    'International Programs: SSBM GENEVA - MBA/DBA, SSBR ZURICH - BBA/MBA/MSc/DBA/PhD, Chartered Economist (ACCE), IIC University Cambodia - PhD & DBA, AZTECA University Mexico - PhD & DBA'
                ],
                'application_fee' => 25000,
                'tuition_fee_min' => 235000,
                'tuition_fee_max' => 7500000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
            [
                'name' => 'FOMIC Polytechnic University',
                'type' => 'university',
                'location' => 'Buea',
                'description' => 'FOMIC Polytechnic University, founded in 2011, is a Private Higher Institute accredited by the Ministry of Higher Education of Cameroon and mentored by the University of BUEA and the University of Bamenda. The institution is part of FOMIC GROUP, representing a group of academic institutions that provide world class training in a wide range of academic disciplines. FOMIC Polytechnic has campuses in Buea and Douala, with over 3,000 students and 70 staff members.',
                'contact_email' => 'info@fomicgroup.cm',
                'contact_phone' => '233391452 / +237 675551924 / +237 677505889',
                'website' => 'https://fomicgroup.cm',
                'address' => 'Buea Campus, Tarred Malingo Street, Molyko Buea, Cameroon',
                'admission_requirements' => [
                    'GCE A-Level or equivalent',
                    'Baccalauréat or equivalent',
                    'English proficiency',
                    'Application form',
                    'Academic transcripts'
                ],
                'application_steps' => [
                    'Submit application with required documents',
                    'Pay application fee',
                    'Submit academic credentials',
                    
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
                    'School of Business: Various business and management programs',
                    'School of Engineering and Technology: Engineering and technology programs',
                    'School of Medical & Biomedical Sciences: Healthcare and medical programs',
                    'School of Agriculture: Agricultural sciences and related programs',
                    'Faculty of Law & International Relations: Legal studies and international relations programs',
                    'Language Institute: IELTS, TOEFL & GRE preparation programs for language proficiency and international examinations'
                ],
                'application_fee' => 25000,
                'tuition_fee_min' => 300000,
                'tuition_fee_max' => 600000,
                'currency' => 'XAF',
                'is_active' => true,
            ],
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
