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
                'title' => 'Skill Development Programs',
                'description' => 'Short-term courses for quick skill enhancement, mid-term programs for in-depth learning, and long-term courses for comprehensive education across diverse academic and industrial disciplines.',
                'badge' => 'Core Academic',
                'icon' => 'academic-cap',
            ],
            [
                'number' => '02',
                'title' => 'Accredited Certifications',
                'description' => 'Globally recognized ISO-accredited certifications valued and respected by employers, multinational organizations, and academic institutions worldwide.',
                'badge' => 'ISO Accredited',
                'icon' => 'badge-check',
            ],
            [
                'number' => '03',
                'title' => 'Career Services',
                'description' => 'Dedicated professional support including personalized resume building, interview preparation, job placement assistance, and ongoing career development resources.',
                'badge' => 'Employability',
                'icon' => 'briefcase',
            ],
            [
                'number' => '04',
                'title' => 'Customized Corporate Training',
                'description' => 'Tailored B2B workforce training solutions partnering with organizations to address specific business needs, boost productivity, and elevate competitive advantage.',
                'badge' => 'B2B Corporate',
                'icon' => 'office-building',
            ],
            [
                'number' => '05',
                'title' => 'E-Learning Platform',
                'description' => 'State-of-the-art, flexible, accessible, and interactive online courses allowing students to learn at their own pace from anywhere across the globe.',
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
                'title' => 'Mentorship Programs',
                'description' => 'Direct one-on-one connection with seasoned mentors who provide guidance, real-world experience, and strategic direction for educational and career navigation.',
                'badge' => 'Personalized',
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
                'title' => 'Community Engagement',
                'description' => 'Impactful outreach programs, volunteer initiatives, and collaborative partnerships with local organizations fostering social responsibility and ethical leadership.',
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
                'message' => 'Guiding iCEEDS with visionary academic leadership and an unwavering dedication to educational excellence. His extensive research background and decades of university leadership steer our institution toward global benchmarks of quality and student achievement.',
                'initials' => 'PA',
            ],
            [
                'name' => 'Dr. A. B. Aliyar',
                'role' => 'Registrar, iCEEDS',
                'credentials' => 'M.A., M.Phil., Ph.D.',
                'attribution' => 'TEAM iCEEDS',
                'message' => 'Championing the philosophy that the pursuit of knowledge is a lifelong journey. With determination, hard work, and the right mindset, every learner can unlock their potential and achieve true greatness.',
                'initials' => 'AA',
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
                'title' => 'Accredited Expertise',
                'description' => 'Globally recognized ISO-accredited education and training programs that strictly adhere to international benchmarks and enhance employer credibility.',
                'icon' => 'shield-check',
            ],
            [
                'title' => 'Comprehensive Courses',
                'description' => 'Structured short-term, mid-term, and long-term programs harmonizing foundational theory with practical, job-ready competencies across diverse disciplines.',
                'icon' => 'book-open',
            ],
            [
                'title' => 'Skilled Instructors',
                'description' => 'Distinguished faculty and seasoned industry practitioners offering personalized mentorship, real-world case studies, and an engaging learning environment.',
                'icon' => 'academic-cap',
            ],
            [
                'title' => 'Career Advancement',
                'description' => 'Dedicated career coaching, globally respected credentials, corporate networking events, and post-graduation employability support.',
                'icon' => 'trending-up',
            ],
            [
                'title' => 'Positive Impact',
                'description' => 'Empowering graduates with leadership and problem-solving skills to drive innovation and create a lasting, positive ripple effect in their communities.',
                'icon' => 'sparkles',
            ],
            [
                'title' => 'Global Exposure',
                'description' => 'Curated access to international methodologies, cutting-edge industry trends, and collaborative interactions within an international peer cohort.',
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
                'title' => 'Balanced Curriculum',
                'description' => 'Delivering short-term skill enhancement, mid-term specialized training, and long-term educational programs that balance theoretical foundations with practical execution.',
            ],
            [
                'number' => '02',
                'title' => 'Industry-Veteran Faculty',
                'description' => 'Experienced instructors and subject matter authorities who bring real-world industry practices and global exposure directly into the learning experience.',
            ],
            [
                'number' => '03',
                'title' => 'End-to-End Career Support',
                'description' => 'Comprehensive student guidance featuring personalized mentorship, resume building, interview coaching, placement assistance, and an active alumni network.',
            ],
            [
                'number' => '04',
                'title' => 'Social Responsibility & Innovation',
                'description' => 'Instilling ethical leadership, community responsibility, and the innovative mindset required to solve complex modern challenges.',
            ],
        ];
    }
}
