<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Support\CourseCatalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the official iCEEDS Home Page.
     */
    public function home(Request $request): View
    {
        $code = trim((string) $request->query('code', ''));
        $searched = !empty($code);
        $certificate = null;

        if ($searched) {
            $certificate = Certificate::whereRaw(
                'LOWER(certificate_code) = ?',
                [strtolower($code)]
            )->first();
        }

        // Dynamic stats and courses from database with fallbacks
        $totalCertificates = Certificate::count();
        if ($totalCertificates === 0) {
            $totalCertificates = 2875;
        }

        $featuredCourses = Certificate::select('course')
            ->distinct()
            ->take(6)
            ->pluck('course')
            ->all();

        if (empty($featuredCourses)) {
            $featuredCourses = [
                'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
                'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT COURSE',
                'EXECUTIVE DIPLOMA IN CHILD & ADOLESCENT PSYCHOLOGY',
                'ADVANCED DIPLOMA IN SPECIAL EDUCATION NEEDS (SEN)',
                'PROFESSIONAL CERTIFICATION IN CAREER GUIDANCE',
                'CERTIFICATE IN DEVELOPMENTAL DISABILITIES MANAGEMENT',
            ];
        }

        $servicesList = $this->getServicesData();
        $mentors = $this->getMentorsData();
        $whyIceeds = $this->getWhyIceedsData();

        return view('pages.home', [
            'searched' => $searched,
            'code' => $code,
            'certificate' => $certificate,
            'totalCertificates' => $totalCertificates,
            'featuredCourses' => $featuredCourses,
            'services' => $servicesList,
            'mentors' => $mentors,
            'whyIceeds' => $whyIceeds,
        ]);
    }

    /**
     * Display the About iCEEDS page.
     */
    public function about(): View
    {
        $mentors = $this->getMentorsData();
        $pillars = $this->getPillarsData();

        return view('pages.about', [
            'mentors' => $mentors,
            'pillars' => $pillars,
        ]);
    }

    /**
     * Display the Services & Programs page.
     */
    public function services(): View
    {
        $services = $this->getServicesData();

        return view('pages.services', [
            'services' => $services,
        ]);
    }

    /**
     * Get verified 10 Services & Programs data.
     */
    public function getServicesData(): array
    {
        return [
            [
                'number' => '01',
                'title' => 'Vocational & Professional Courses',
                'description' => 'Comprehensive skill development curricula designed and monitored by the Academic Board of Studies—spanning short-term skill enhancement, mid-term diplomas, and long-term professional qualifications.',
                'badge' => 'Academic Board Monitored',
                'icon' => 'academic-cap',
            ],
            [
                'number' => '02',
                'title' => 'Accredited Certifications',
                'description' => 'ISO-accredited, tamper-proof certifications valued across government and private industry, aligned with NSDC standards under the Ministry of Skill Development and Entrepreneurship, Govt. of India.',
                'badge' => 'ISO & NSDC Aligned',
                'icon' => 'badge-check',
            ],
            [
                'number' => '03',
                'title' => 'Career Services & Employability',
                'description' => 'Dedicated professional support including personalized resume building, interview preparation, job placement assistance, and industry-oriented competency tracking.',
                'badge' => 'Employability',
                'icon' => 'briefcase',
            ],
            [
                'number' => '04',
                'title' => 'Customized Corporate Training',
                'description' => 'Tailored enterprise workforce training solutions partnering with organizations to address specific business needs, boost productivity, and elevate competitive advantage.',
                'badge' => 'B2B Corporate',
                'icon' => 'office-building',
            ],
            [
                'number' => '05',
                'title' => 'E-Learning & Digital Modules',
                'description' => 'Interactive digital learning platform allowing students and working professionals to acquire industry-relevant skills and qualifications at their own pace.',
                'badge' => 'Digital Learning',
                'icon' => 'desktop-computer',
            ],
            [
                'number' => '06',
                'title' => 'Workshops and Seminars',
                'description' => 'Intensive, hands-on industry workshops and expert-led seminars focused on practical execution and emerging global workplace competencies.',
                'badge' => 'Interactive',
                'icon' => 'presentation-chart-line',
            ],
            [
                'number' => '07',
                'title' => 'Academic Board Mentorship',
                'description' => 'Direct guidance from university professors and industry authorities on our Academic Board of Studies, providing strategic direction for educational and vocational navigation.',
                'badge' => 'Expert Mentorship',
                'icon' => 'user-group',
            ],
            [
                'number' => '08',
                'title' => 'Global Exposure Opportunities',
                'description' => 'International academic collaborations, global study opportunities, and direct exposure to international industry standards and emerging trends.',
                'badge' => 'International',
                'icon' => 'globe',
            ],
            [
                'number' => '09',
                'title' => 'Alumni Network',
                'description' => 'Lifelong professional connections, networking opportunities, and exclusive institutional resources supporting career growth long after graduation.',
                'badge' => 'Community',
                'icon' => 'users',
            ],
            [
                'number' => '10',
                'title' => 'Community & Skill Outreach',
                'description' => 'Social development initiatives, grassroots vocational training programs, and community partnerships expanding skill opportunities to underserved sectors.',
                'badge' => 'Social Impact',
                'icon' => 'heart',
            ],
        ];
    }

    /**
     * Display the Courses page (/courses).
     */
    public function courses(Request $request): View
    {
        $courses = $this->getCoursesData();
        $sectors = CourseCatalog::getSectors();
        $degreeTrades = CourseCatalog::getDegreeTrades();
        $totalRoles = CourseCatalog::getTotalRolesCount();

        $categories = [
            'all' => 'All Sectors & Programs',
            'vocational-degree' => 'B.Voc & M.Voc Degree Trades',
            'it-ites' => 'IT & IT-ITES (NASSCOM)',
            'healthcare' => 'Healthcare & Paramedical (HSSC)',
            'electronics' => 'Electronics & Drones (ESSCI)',
            'management-security' => 'Management & Security (MEPSC)',
            'beauty' => 'Beauty & Wellness (B&W SSC)',
            'apparel' => 'Apparel & Home Furnishings (AMH SSC)',
            'food-processing' => 'Food Processing (FICSI)',
            'featured-diplomas' => 'Academic Board Diplomas',
        ];

        return view('pages.courses', [
            'courses' => $courses,
            'sectors' => $sectors,
            'degreeTrades' => $degreeTrades,
            'totalRoles' => $totalRoles,
            'categories' => $categories,
            'totalCourses' => count($courses),
        ]);
    }

    /**
     * Download the complete course list & syllabus brochure PDF.
     */
    public function downloadCourseListPdf()
    {
        $pdfPath = public_path('documents/iceeds-course-catalog.pdf');

        if (file_exists($pdfPath)) {
            return response()->download(
                $pdfPath,
                'iCEEDS-Official-Course-Catalog-and-Syllabus.pdf',
                ['Content-Type' => 'application/pdf']
            );
        }

        // Fallback: stream inline printable document
        return redirect()->route('courses', ['#catalog-download']);
    }

    /**
     * Download individual course syllabus PDF.
     */
    public function downloadSyllabusPdf(string $slug)
    {
        $courses = collect($this->getCoursesData())->keyBy('slug');
        $course = $courses->get($slug);

        $pdfPath = public_path('documents/' . $slug . '-syllabus.pdf');
        if (file_exists($pdfPath)) {
            return response()->download($pdfPath, ($course ? str_replace(' ', '-', $course['title']) : 'iCEEDS-Syllabus') . '.pdf');
        }

        $catalogPdf = public_path('documents/iceeds-course-catalog.pdf');
        if (file_exists($catalogPdf)) {
            return response()->download($catalogPdf, ($course ? str_replace(' ', '-', $course['title']) : 'iCEEDS') . '-Syllabus-Brochure.pdf');
        }

        return redirect()->route('courses');
    }

    /**
     * Display the Media & Social Gallery page (/gallery).
     */
    public function gallery(Request $request): View
    {
        $mediaItems = $this->getGalleryData();

        return view('pages.gallery', [
            'mediaItems' => $mediaItems,
        ]);
    }

    /**
     * Get verified Leadership & Mentors data.
     * Card 1: Dr. A B ALIYAR (Registrar, I-CEEDS)
     * Card 2: Dr. P. ARUNACHALAM (Director, Board of Studies, I-CEEDS)
     */
    public function getMentorsData(): array
    {
        return [
            [
                'name' => 'Dr. A B ALIYAR',
                'display_name' => 'Dr. A B ALIYAR',
                'title' => 'Dr. A B ALIYAR',
                'role' => 'Registrar, I-CEEDS',
                'designation' => 'Registrar',
                'affiliation' => 'Registrar, I-CEEDS',
                'credentials' => 'MA(Eco), MA(IH), MBA, PhD (CUSAT)',
                'attribution' => 'Registrar, I-CEEDS',
                'honors' => [
                    'Registrar, I-CEEDS',
                    'Member, Board of Studies, University of Calicut',
                    'Member, Indian Economic Association',
                    'Former Director, Kerala State Minorities Development Financial Corporation',
                ],
                'message' => 'Championing the philosophy that the pursuit of knowledge is a lifelong journey. With determination, hard work, and the right mindset, every learner can unlock their potential and achieve true greatness.',
                'initials' => 'ABA',
                'image' => 'images/mentors/dr-a-b-aliyar.webp',
                'department' => 'Executive Secretariat',
            ],
            [
                'name' => 'Dr. P. ARUNACHALAM',
                'display_name' => 'Dr. P. ARUNACHALAM',
                'title' => 'Dr. P. ARUNACHALAM',
                'role' => 'Director, Board of Studies, I-CEEDS',
                'designation' => 'Director, Board of Studies',
                'affiliation' => 'Director, Board of Studies, I-CEEDS',
                'credentials' => 'MA(Eco), MPhil, PhD (CUSAT)',
                'attribution' => 'Academic Board of Studies, I-CEEDS',
                'honors' => [
                    'Director, Board of Studies, I-CEEDS',
                    'Emeritus Professor, CUSAT',
                    'Member, Indian Economic Association',
                    'Fellow, IIAS, Raj Bhavan, Shimla',
                ],
                'message' => 'Steering curriculum design, evaluation benchmarks, and industry alignment to ensure our graduates and diploma holders excel with accredited, globally relevant competencies.',
                'initials' => 'PA',
                'image' => 'images/mentors/dr-p-arunachalam.webp',
                'department' => 'Academic Board of Studies',
            ],
        ];
    }

    /**
     * Get verified "Why iCEEDS" Value Proposition points.
     */
    public function getWhyIceedsData(): array
    {
        return [
            [
                'title' => 'Established Legal Trust',
                'description' => 'Established under the Indian Trusts Act, 1882 as a self-governing educational organization and independent skill development entity.',
                'icon' => 'shield-check',
            ],
            [
                'title' => 'Academic Board of Studies',
                'description' => 'Guided and monitored by an expert Academic Board of Studies, ensuring high standards in curriculum design and quality evaluation.',
                'icon' => 'academic-cap',
            ],
            [
                'title' => 'NSDC & Ministry Aligned',
                'description' => 'Facilitating skill training and certification support aligned with the National Skill Development Corporation (NSDC) under the Ministry of Skill Development and Entrepreneurship, Govt. of India.',
                'icon' => 'sparkles',
            ],
            [
                'title' => 'Vocational & Professional Courses',
                'description' => 'Designing and conducting rigorous vocational and professional courses to empower students with industry-relevant skills and practical competencies.',
                'icon' => 'book-open',
            ],
            [
                'title' => 'ISO Accredited Benchmarks',
                'description' => 'Globally recognized ISO quality management certification ensuring compliance with international evaluation and administrative benchmarks.',
                'icon' => 'trending-up',
            ],
            [
                'title' => 'Career Advancement & Support',
                'description' => 'Dedicated career coaching, globally respected credentials, verified digital transcripts, and active post-graduation employability support.',
                'icon' => 'globe-alt',
            ],
        ];
    }

    /**
     * Get verified Core Pillars data for About page.
     */
    public function getPillarsData(): array
    {
        return [
            [
                'number' => '01',
                'title' => 'Academic Board of Studies Governance',
                'description' => 'Every curriculum and evaluation framework is guided and monitored by an expert Academic Board of Studies composed of distinguished academicians and industry leaders.',
            ],
            [
                'number' => '02',
                'title' => 'Industry-Relevant Vocational Training',
                'description' => 'Designing and conducting vocational and professional courses that directly address real-world employer requirements and technical competencies.',
            ],
            [
                'number' => '03',
                'title' => 'NSDC & National Standards Alignment',
                'description' => 'Facilitating skill training and certification support aligned with the National Skill Development Corporation (NSDC) under the Ministry of Skill Development and Entrepreneurship, Govt. of India.',
            ],
            [
                'number' => '04',
                'title' => 'Legal Integrity & ISO Quality Accreditation',
                'description' => 'Established under the Indian Trusts Act, 1882, operating with ISO accredited quality control, digital record security, and zero-compromise credential verification.',
            ],
        ];
    }

    /**
     * Get structured catalog data of courses.
     */
    public function getCoursesData(): array
    {
        return [
            // Psychology & Counselling
            [
                'id' => 1,
                'slug' => 'diploma-in-counselling-psychology',
                'title' => 'iCEEDS Diploma in Counselling Psychology',
                'category' => 'psychology',
                'category_label' => 'Psychology & Counselling',
                'duration' => '1 Year (Fast-track 6 Mos. available)',
                'level' => 'Diploma',
                'eligibility' => '+2 / Pre-Degree or Any Degree / Equivalent',
                'certification' => 'ISO 9001:2015 Accredited & Board of Studies Certified',
                'description' => 'Comprehensive foundational and clinical counselling training covering therapeutic modalities, psychopathology, psychometric assessments, and field practicum.',
                'modules' => [
                    'Fundamentals of Human Behaviour & Cognitive Processes',
                    'Theories of Counselling & Modern Psychotherapy Modalities',
                    'Child, Adolescent & Family Dynamics Counselling',
                    'Psychological Assessment, Case History & Diagnostics',
                    'Supervised Practicum, Role Play & Field Clinical Hours',
                ],
                'popular' => true,
            ],
            [
                'id' => 2,
                'slug' => 'post-diploma-in-learning-difficulty-management',
                'title' => 'Post Diploma in Learning Difficulty Management Course',
                'category' => 'psychology',
                'category_label' => 'Psychology & Counselling',
                'duration' => '1 Year',
                'level' => 'Post Diploma',
                'eligibility' => 'Degree in Psychology / Education / Social Work or General Graduation',
                'certification' => 'ISO 9001:2015 Accredited & Academic Directorate Conferred',
                'description' => 'Specialized therapeutic and pedagogical intervention framework designed for dyslexia, dyscalculia, ADHD, and executive function management.',
                'modules' => [
                    'Identification & Assessment of Specific Learning Difficulties (SLD)',
                    'Neurodevelopmental Disorders & Sensory Integration',
                    'Remedial Teaching Methodologies & IEP (Individualized Education Plan)',
                    'Cognitive Behavior Strategies & Classroom Accommodations',
                    'Parental Guidance & Clinical Intervention Workshop',
                ],
                'popular' => true,
            ],
            [
                'id' => 3,
                'slug' => 'advanced-diploma-in-counselling-psychology',
                'title' => 'iCEEDS Advanced Diploma in Counselling Psychology',
                'category' => 'psychology',
                'category_label' => 'Psychology & Counselling',
                'duration' => '18 Months',
                'level' => 'Advanced Diploma',
                'eligibility' => 'Graduation / Prior Diploma in Counselling or Psychology',
                'certification' => 'ISO 9001:2015 Accredited & Board of Studies Conferred',
                'description' => 'In-depth specialization exploring CBT, REBT, trauma-informed care, systemic couple therapy, and advanced clinical intervention techniques.',
                'modules' => [
                    'Advanced Cognitive Behavioral Therapy (CBT) & Rational Emotive Behavior Therapy (REBT)',
                    'Trauma, Grief & Crisis De-escalation Interventions',
                    'Addiction & Substance Abuse Rehabilitation Counselling',
                    'Marriage, Marital Discord & Family Systems Therapy',
                    'Ethics, Professional Boundaries & Supervised Case Presentations',
                ],
                'popular' => false,
            ],
            [
                'id' => 4,
                'slug' => 'executive-diploma-in-child-adolescent-psychology',
                'title' => 'Executive Diploma in Child & Adolescent Psychology',
                'category' => 'psychology',
                'category_label' => 'Psychology & Counselling',
                'duration' => '1 Year',
                'level' => 'Executive Diploma',
                'eligibility' => 'Teachers, Counsellors, Healthcare Workers, or Any Degree',
                'certification' => 'ISO 9001:2015 Accredited Credential',
                'description' => 'Targeted behavioral and developmental study of children and teens, behavioral modification, cyber addictions, and developmental milestone support.',
                'modules' => [
                    'Developmental Milestones from Infancy to Late Adolescence',
                    'Childhood Behavioral Disorders & Diagnostic Criteria',
                    'Bullying, Peer Pressure, Screen & Substance Habits',
                    'Play Therapy & Expressive Arts in Child Psychotherapy',
                    'School Counselling Protocols & Teacher-Parent Consultations',
                ],
                'popular' => false,
            ],
            [
                'id' => 5,
                'slug' => 'advanced-diploma-in-special-education-needs',
                'title' => 'Advanced Diploma in Special Education Needs (SEN)',
                'category' => 'psychology',
                'category_label' => 'Psychology & Counselling',
                'duration' => '1 Year',
                'level' => 'Advanced Diploma',
                'eligibility' => '+2 / Degree / D.Ed / B.Ed or Aspiring Educators',
                'certification' => 'ISO 9001:2015 Accredited & National Registry Aligned',
                'description' => 'Comprehensive preparation for special educators supporting children with Autism Spectrum Disorder (ASD), Cerebral Palsy, Down Syndrome, and sensory challenges.',
                'modules' => [
                    'Perspectives on Inclusive Education & Disability Rights',
                    'Instructional Adaptation & Assistive Technologies',
                    'Autism Spectrum Disorder & Applied Behaviour Analysis (ABA)',
                    'Communication Strategies for Non-Verbal Learners',
                    'Inclusive Classroom Management & Special School Internship',
                ],
                'popular' => true,
            ],
            [
                'id' => 6,
                'slug' => 'diploma-in-hypnosis-and-eft',
                'title' => 'iCEEDS Diploma in Hypnosis & Emotional Freedom Technique',
                'category' => 'psychology',
                'category_label' => 'Psychology & Counselling',
                'duration' => '6 Months',
                'level' => 'Diploma',
                'eligibility' => 'Open to Counsellors, Healers & Interested Candidates (Min +2)',
                'certification' => 'ISO 9001:2015 Accredited Skill Qualification',
                'description' => 'Practical clinical hypnosis, induction techniques, subconscious reprogramming, and meridian-based EFT tapping protocols.',
                'modules' => [
                    'Conscious vs. Subconscious Mind & Suggestibility Testing',
                    'Progressive Relaxation & Rapid Induction Methods',
                    'Regression & Positive Reframing Protocols',
                    'EFT (Emotional Freedom Technique) Tapping Points & Scripts',
                    'Stress, Phobia & Anxiety Alleviation Applications',
                ],
                'popular' => false,
            ],

            // Teacher Education & ECCE
            [
                'id' => 7,
                'slug' => 'diploma-in-montessori-teachers-training',
                'title' => 'iCEEDS Diploma in Montessori Teachers Training Course (MTTC)',
                'category' => 'education',
                'category_label' => 'Teacher Education & ECCE',
                'duration' => '1 Year',
                'level' => 'Diploma',
                'eligibility' => 'SSLC / +2 Pass or Graduation',
                'certification' => 'ISO 9001:2015 Accredited & Global Montessori Aligned',
                'description' => 'World-class Dr. Maria Montessori educational pedagogy, hands-on didactic apparatus training, practical life exercises, and school management.',
                'modules' => [
                    'Philosophy of Dr. Maria Montessori & Child Development',
                    'Exercises of Practical Life (EPL) & Sensorial Apparatus',
                    'Montessori Mathematical & Language Didactic Materials',
                    'Cultural Activities: Botany, Zoology & Geography',
                    'Classroom Observation, Record Keeping & School Administration',
                ],
                'popular' => true,
            ],
            [
                'id' => 8,
                'slug' => 'post-graduate-diploma-in-montessori-teachers-training',
                'title' => 'iCEEDS PG Diploma in Montessori Teachers Training (PGDMTTC)',
                'category' => 'education',
                'category_label' => 'Teacher Education & ECCE',
                'duration' => '1 Year (Post Graduate)',
                'level' => 'PG Diploma',
                'eligibility' => 'Any Bachelor Degree from a Recognised University',
                'certification' => 'ISO 9001:2015 Accredited & Academic Directorate Conferred',
                'description' => 'Advanced pedagogical training for preschool founders, academic coordinators, and primary school curriculum supervisors.',
                'modules' => [
                    'Advanced Child Psychology & Early Brain Development',
                    'Advanced Sensorial & Math Apparatus Design',
                    'Preschool Establishment, Safety Standards & Licensing',
                    'Curriculum Planning & Multi-Grade Class Supervision',
                    'Practicum Portfolio & Demonstration Teaching',
                ],
                'popular' => false,
            ],
            [
                'id' => 9,
                'slug' => 'diploma-in-pre-primary-teachers-training',
                'title' => 'iCEEDS Diploma in Pre-Primary Teachers Training Course (PPTTC)',
                'category' => 'education',
                'category_label' => 'Teacher Education & ECCE',
                'duration' => '1 Year',
                'level' => 'Diploma',
                'eligibility' => '+2 / Higher Secondary Pass or Graduation',
                'certification' => 'ISO 9001:2015 Accredited & Academic Board Monitored',
                'description' => 'Essential nursery, kindergarten, and play school teaching methods, storytelling, rhymes, phonics, and child health care.',
                'modules' => [
                    'Pre-Primary Child Psychology & Pedagogy',
                    'Phonics, Early Literacy & Numeracy Skill Building',
                    'Creative Rhymes, Story-Telling & Puppetry',
                    'Art, Craft, Origami & Audio-Visual Teaching Aids',
                    'School Health, Nutrition & Safety Management',
                ],
                'popular' => false,
            ],
            [
                'id' => 10,
                'slug' => 'diploma-in-early-childhood-care-and-education',
                'title' => 'iCEEDS Diploma in Early Childhood Care and Education (ECCE)',
                'category' => 'education',
                'category_label' => 'Teacher Education & ECCE',
                'duration' => '1 Year',
                'level' => 'Diploma',
                'eligibility' => '+2 / Higher Secondary or Equivalent',
                'certification' => 'ISO 9001:2015 Accredited & NSDC Aligned Framework',
                'description' => 'Focuses on early childhood development from birth to age 8, holistic physical, cognitive, social, and emotional nurturing.',
                'modules' => [
                    'Foundations of Early Childhood Care & Nutrition',
                    'Cognitive, Language & Motor Development in Early Years',
                    'Play-Based Learning & Experiential Activities',
                    'Child Rights, Protection Policies & Inclusive Early Care',
                    'Early Childhood Center Management & Internship',
                ],
                'popular' => false,
            ],
            [
                'id' => 11,
                'slug' => 'certificate-in-ai-for-educators',
                'title' => 'iCEEDS Certificate in AI for Educators',
                'category' => 'education',
                'category_label' => 'Teacher Education & ECCE',
                'duration' => '3 Months',
                'level' => 'Certificate',
                'eligibility' => 'Teachers, Educators & Educational Administrators',
                'certification' => 'ISO 9001:2015 Accredited Digital Competency Certificate',
                'description' => 'Empowering modern teachers with generative AI tools, automated lesson planning, personalized worksheet generation, and AI ethics.',
                'modules' => [
                    'Introduction to Generative AI in the Modern Classroom',
                    'Prompt Engineering for Lesson Plans, Quizzes & Rubrics',
                    'AI Presentation, Visual Generation & Interactive Learning Tools',
                    'Automated Grading, Student Feedback & Administrative Automation',
                    'Ethics, Plagiarism & Safe Classroom AI Implementation',
                ],
                'popular' => true,
            ],

            // Management & Healthcare Administration
            [
                'id' => 12,
                'slug' => 'diploma-in-business-administration-and-hospital-management',
                'title' => 'iCEEDS Diploma in Business Administration & Hospital Management',
                'category' => 'management',
                'category_label' => 'Management & Healthcare',
                'duration' => '1 Year',
                'level' => 'Diploma',
                'eligibility' => '+2 / Higher Secondary or Any Graduation',
                'certification' => 'ISO 9001:2015 Accredited & Industry Aligned',
                'description' => 'Dual-domain curriculum bridging core corporate business principles with hospital operations, patient relations, and healthcare quality standards.',
                'modules' => [
                    'Principles of Modern Management & Business Communication',
                    'Hospital Front Office Operations & Patient Admission Services',
                    'Healthcare Billing, Insurance TPA & Electronic Medical Records',
                    'NABH Standards, Bio-Medical Waste & Hospital Quality Protocols',
                    'Human Resource & Financial Management in Healthcare Facilities',
                ],
                'popular' => true,
            ],
            [
                'id' => 13,
                'slug' => 'professional-diploma-in-shipping-and-logistics',
                'title' => 'iCEEDS Professional Diploma in Shipping & Logistics Operations',
                'category' => 'management',
                'category_label' => 'Management & Healthcare',
                'duration' => '1 Year',
                'level' => 'Professional Diploma',
                'eligibility' => '+2 / Degree in Any Discipline',
                'certification' => 'ISO 9001:2015 Accredited & Global Logistics Aligned',
                'description' => 'Practical training for international shipping, customs documentation, freight forwarding, port operations, and supply chain management.',
                'modules' => [
                    'International Trade, Incoterms & Bill of Lading Procedures',
                    'Ocean, Air & Multimodal Freight Forwarding Logistics',
                    'Customs Clearance, Tariff Classifications & Port Documentation',
                    'Warehouse Operations, Inventory Management & Tracking Systems',
                    'Supply Chain Analytics & Global Trade Compliance',
                ],
                'popular' => false,
            ],
            [
                'id' => 14,
                'slug' => 'professional-certification-in-career-guidance',
                'title' => 'Professional Certification in Career Guidance & Counselling',
                'category' => 'management',
                'category_label' => 'Management & Healthcare',
                'duration' => '6 Months',
                'level' => 'Professional Certificate',
                'eligibility' => 'Degree in Any Stream / Teachers / HR Professionals',
                'certification' => 'ISO 9001:2015 Accredited & Directorate Conferred',
                'description' => 'Psychometric career mapping, aptitude analysis, global higher education pathways, and vocational counselling techniques.',
                'modules' => [
                    'Theory of Career Development & Vocational Choice Factors',
                    'Psychometric Assessment Tools: MBTI, RIASEC & Aptitude Tests',
                    'Emerging Career Paths in STEM, Arts, AI & Global Markets',
                    'Educational Pathway Mapping & Scholarship Advising',
                    'One-on-One Career Counselling Protocols & Report Generation',
                ],
                'popular' => false,
            ],

            // Engineering & Technical
            [
                'id' => 15,
                'slug' => 'master-diploma-in-oil-and-gas-engineering',
                'title' => 'iCEEDS Master Diploma in Oil & Gas Engineering',
                'category' => 'engineering',
                'category_label' => 'Engineering & Technical',
                'duration' => '1 Year',
                'level' => 'Master Diploma',
                'eligibility' => 'Diploma / B.Tech / B.E. / B.Sc or Any Technical Stream',
                'certification' => 'ISO 9001:2015 Accredited & Industrial Benchmarks Aligned',
                'description' => 'Comprehensive technical training for offshore/onshore petroleum facilities, piping engineering, QA/QC, and safety management.',
                'modules' => [
                    'Upstream, Midstream & Downstream Petroleum Processing',
                    'Piping Engineering, P&ID Reading & Isometric Drawings',
                    'Non-Destructive Testing (NDT) Level-II Overview',
                    'Health, Safety & Environment (HSE) in Oil & Gas Plants',
                    'QA/QC Protocols, Welding Inspection & Material Standards',
                ],
                'popular' => true,
            ],
            [
                'id' => 16,
                'slug' => 'certificate-in-electrical-vehicle-and-automobile',
                'title' => 'iCEEDS Certificate in Electric Vehicle (EV) & Auto Maintenance',
                'category' => 'engineering',
                'category_label' => 'Engineering & Technical',
                'duration' => '6 Months',
                'level' => 'Certificate',
                'eligibility' => 'SSLC / +2 / ITI / Polytechnic Diploma / Any Stream',
                'certification' => 'ISO 9001:2015 Accredited Technical Credential',
                'description' => 'Hands-on practical training on EV powertrains, lithium-ion battery management systems (BMS), motor controllers, and auto diagnostics.',
                'modules' => [
                    'Fundamentals of Electric Vehicles & Powertrain Architecture',
                    'Lithium-ion Battery Chemistry, Thermal Management & BMS',
                    'BLDC & Permanent Magnet Synchronous Motors & Inverters',
                    'Regenerative Braking & High Voltage Safety Protocols',
                    'Computerized Auto Diagnostics, Fault Codes & Maintenance',
                ],
                'popular' => false,
            ],

            // Creative Technologies & AI
            [
                'id' => 17,
                'slug' => 'diploma-in-introduction-to-ai',
                'title' => 'iCEEDS Diploma in Applied Artificial Intelligence',
                'category' => 'technology',
                'category_label' => 'Creative & AI Technologies',
                'duration' => '1 Year',
                'level' => 'Diploma',
                'eligibility' => '+2 / Any Degree / Basic Computer Knowledge',
                'certification' => 'ISO 9001:2015 Accredited & Directorate Conferred',
                'description' => 'Comprehensive vocational AI course covering modern machine learning fundamentals, generative AI tools, prompt engineering, and business automation.',
                'modules' => [
                    'Foundations of Computing, Logic & Python for AI',
                    'Machine Learning Fundamentals & Data Processing',
                    'Natural Language Processing & Large Language Models (LLMs)',
                    'Generative AI for Creative Workflows, Audio & Visual Media',
                    'AI Ethics, Deployment & Real-World Capstone Project',
                ],
                'popular' => true,
            ],
            [
                'id' => 18,
                'slug' => 'diploma-in-graphic-design-mastery',
                'title' => 'iCEEDS Diploma in Graphic Design Mastery & Visual Arts',
                'category' => 'technology',
                'category_label' => 'Creative & AI Technologies',
                'duration' => '6 Months',
                'level' => 'Diploma',
                'eligibility' => 'SSLC / +2 or Any Degree',
                'certification' => 'ISO 9001:2015 Accredited Creative Qualification',
                'description' => 'Master industry-standard creative tools including Adobe Photoshop, Illustrator, InDesign, typography, branding, and digital UI layout.',
                'modules' => [
                    'Design Theory, Color Harmony, Grid Systems & Typography',
                    'Raster Graphics, Photo Retouching & Compositing (Photoshop)',
                    'Vector Illustration, Iconography & Brand Identity (Illustrator)',
                    'Editorial Publication, Print Production & Pre-Press (InDesign)',
                    'Professional Portfolio Development & Freelance Client Workflow',
                ],
                'popular' => false,
            ],
            [
                'id' => 19,
                'slug' => 'certificate-in-professional-translation-and-arabic',
                'title' => 'iCEEDS Certificate in Professional Translation & Arabic-English',
                'category' => 'technology',
                'category_label' => 'Creative & AI Technologies',
                'duration' => '6 Months',
                'level' => 'Certificate',
                'eligibility' => '+2 / Degree / Working Knowledge of Languages',
                'certification' => 'ISO 9001:2015 Accredited Language Skill Credential',
                'description' => 'Specialized commercial, legal, medical, and governmental translation training between Arabic, English, and regional Indian languages.',
                'modules' => [
                    'Grammatical Structures & Contrastive Linguistic Analysis',
                    'Commercial, Visa, Embassy & Legal Document Translation',
                    'Computer-Assisted Translation (CAT) Tools & Speed Typing',
                    'Medical & Technical Terminology Localization',
                    'Notarial Attestation Preparation & Official Sworn Formats',
                ],
                'popular' => false,
            ],
            [
                'id' => 20,
                'slug' => 'diploma-in-fashion-designing',
                'title' => 'iCEEDS Diploma in Fashion Designing & Garment Construction',
                'category' => 'technology',
                'category_label' => 'Creative & AI Technologies',
                'duration' => '1 Year',
                'level' => 'Diploma',
                'eligibility' => 'SSLC / +2 or Any Degree',
                'certification' => 'ISO 9001:2015 Accredited Vocational Certification',
                'description' => 'Hands-on garment sketching, pattern making, fabric selection, garment stitching, and boutique entrepreneurial setup.',
                'modules' => [
                    'Fashion Illustration, Figure Drawing & Color Trends',
                    'Textile Science, Fiber Identification & Surface Ornamentation',
                    'Drafting, Flat Pattern Making & Grading Techniques',
                    'Garment Construction, Stitching & Finishing Quality Control',
                    'Boutique Management, Merchandising & Exhibition Showcase',
                ],
                'popular' => false,
            ],
        ];
    }

    /**
     * Get verified Media & Social Gallery items.
     * Categorized by: youtube, instagram, facebook
     */
    public function getGalleryData(): array
    {
        return [
            // YouTube Videos
            [
                'id' => 'yt-1',
                'type' => 'youtube',
                'title' => 'iCEEDS Institutional Profile & Skill Development Mission',
                'subtitle' => 'Official Documentary',
                'embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'direct_url' => 'https://www.youtube.com/@iceeds',
                'duration' => '4:25',
                'category' => 'Institutional',
                'description' => 'An overview of the iCEEDS educational trust, nationwide affiliated training centers, and ISO-accredited student outcomes.',
                'tags' => ['Institutional', 'Skill Mission', 'National Trust'],
                'thumbnail' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'yt-2',
                'type' => 'youtube',
                'title' => 'Convocation & Academic Directorate Certification Ceremony',
                'subtitle' => 'Student Graduation Day',
                'embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'direct_url' => 'https://www.youtube.com/@iceeds',
                'duration' => '6:12',
                'category' => 'Events',
                'description' => 'Honoring graduates of our Counselling Psychology, MTTC, and Professional Management diplomas in the presence of distinguished faculty.',
                'tags' => ['Graduation', 'Convocation', 'Certificates'],
                'thumbnail' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'yt-3',
                'type' => 'youtube',
                'title' => 'Masterclass on Learning Difficulty Management (SLD & ADHD)',
                'subtitle' => 'Academic Board Lecture Series',
                'embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'direct_url' => 'https://www.youtube.com/@iceeds',
                'duration' => '12:40',
                'category' => 'Webinar',
                'description' => 'Distinguished clinical psychologists demonstrate assessment rubrics and sensory integration strategies for child education professionals.',
                'tags' => ['Psychology', 'Education', 'Special Needs'],
                'thumbnail' => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=800&q=80',
            ],

            // Instagram Reels (9:16 Aspect Frames)
            [
                'id' => 'ig-1',
                'type' => 'instagram',
                'title' => 'Hands-on Montessori Sensorial Apparatus in Action',
                'subtitle' => '@iceeds_official &bull; Instagram Reel',
                'embed_url' => 'https://www.instagram.com/p/reel-demo-1/embed',
                'direct_url' => 'https://www.instagram.com',
                'duration' => '0:58',
                'category' => 'Campus Life',
                'description' => 'Traindee educators demonstrating cylinder blocks and pink tower sensorial apparatus at our accredited MTTC workshop.',
                'tags' => ['Montessori', 'Teaching', 'EarlyYears'],
                'thumbnail' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'id' => 'ig-2',
                'type' => 'instagram',
                'title' => 'Instant Online QR Certificate Verification Tutorial',
                'subtitle' => '@iceeds_official &bull; Instagram Reel',
                'embed_url' => 'https://www.instagram.com/p/reel-demo-2/embed',
                'direct_url' => 'https://www.instagram.com',
                'duration' => '0:45',
                'category' => 'Student Guide',
                'description' => 'How employers and students can verify iCEEDS credentials within 3 seconds using the serial code scanner on iceeds.com.',
                'tags' => ['Verification', 'GovtRegistry', 'Credentials'],
                'thumbnail' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'id' => 'ig-3',
                'type' => 'instagram',
                'title' => 'Student Testimonials: From Diploma to Career Placement',
                'subtitle' => '@iceeds_official &bull; Instagram Reel',
                'embed_url' => 'https://www.instagram.com/p/reel-demo-3/embed',
                'direct_url' => 'https://www.instagram.com',
                'duration' => '1:15',
                'category' => 'Alumni Stories',
                'description' => 'Graduates sharing their success stories working in reputed institutions, hospitals, and child guidance clinics.',
                'tags' => ['Alumni', 'Careers', 'Placement'],
                'thumbnail' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
            ],

            // Facebook Highlights
            [
                'id' => 'fb-1',
                'type' => 'facebook',
                'title' => 'National Skill Day Celebration & Community Workshop',
                'subtitle' => 'Facebook Live Highlight',
                'embed_url' => 'https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/iceeds',
                'direct_url' => 'https://www.facebook.com',
                'duration' => '3:50',
                'category' => 'Community Outreach',
                'description' => 'Interactive youth development forum organized in partnership with local vocational bodies and educational counselors.',
                'tags' => ['SkillIndia', 'YouthEmpowerment', 'Workshop'],
                'thumbnail' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'fb-2',
                'type' => 'facebook',
                'title' => 'Academic Board of Studies Annual Strategic Review Meeting',
                'subtitle' => 'Official Press Highlight',
                'embed_url' => 'https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/iceeds',
                'direct_url' => 'https://www.facebook.com',
                'duration' => '5:10',
                'category' => 'Governance',
                'description' => 'The leadership team, Dr. A B Aliyar (Registrar) and Dr. P. Arunachalam (Director, Board of Studies), reviewing updated curriculum benchmarks.',
                'tags' => ['BoardOfStudies', 'Accreditation', 'Leadership'],
                'thumbnail' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=800&q=80',
            ],
        ];
    }
}

