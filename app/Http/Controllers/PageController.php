<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
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
     * Get verified Leadership & Mentors data.
     */
    public function getMentorsData(): array
    {
        return [
            [
                'name' => 'Dr. P. Arunachalam',
                'role' => 'Chairman, iCEEDS',
                'credentials' => 'M.A., M.Phil., Ph.D. (Emeritus Professor)',
                'attribution' => 'National Academic Co-ordinator, TEAM iCEEDS',
                'message' => 'Guiding iCEEDS with visionary academic leadership and an unwavering dedication to educational excellence. His extensive research background and decades of university leadership steer our Academic Board of Studies toward global benchmarks of quality and student achievement.',
                'initials' => 'PA',
                'image' => 'images/mentors/dr-p-arunachalam.jpeg',
            ],
            [
                'name' => 'Dr. A. B. Aliyar',
                'role' => 'Registrar, iCEEDS',
                'credentials' => 'M.A., M.Phil., Ph.D.',
                'attribution' => 'TEAM iCEEDS',
                'message' => 'Championing the philosophy that the pursuit of knowledge is a lifelong journey. With determination, hard work, and the right mindset, every learner can unlock their potential and achieve true greatness.',
                'initials' => 'AA',
                'image' => 'images/mentors/dr-a-b-aliyar.jpeg',
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
}
