<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display the primary hub for Department of Philosophy & Theology.
     */
    public function index(): View
    {
        return view('pages.departments.index', [
            'heroImage' => asset('images/departments/philosophy-theology-hero.webp'),
            'philosophyImage' => asset('images/departments/department-of-philosophy.webp'),
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
        ]);
    }

    /**
     * Display the Department of Philosophy (Psychology & Sociology).
     */
    public function philosophy(Request $request): View
    {
        $activeSection = $request->query('tab', 'all');

        return view('pages.departments.philosophy', [
            'activeSection' => $activeSection,
            'heroImage' => asset('images/departments/department-of-philosophy.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Display the Department of Theology (Islamic, Christian, and Hindutva Chambers).
     */
    public function theology(Request $request): View
    {
        $chamber = $request->query('chamber', 'all');

        return view('pages.departments.theology', [
            'chamber' => $chamber,
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
            'boardOfStudies' => $this->getTheologyBoardOfStudies(),
        ]);
    }

    /**
     * Direct alias for Psychology division.
     */
    public function psychology(): View
    {
        return view('pages.departments.philosophy', [
            'activeSection' => 'psychology',
            'heroImage' => asset('images/departments/department-of-philosophy.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Direct alias for Sociology division.
     */
    public function sociology(): View
    {
        return view('pages.departments.philosophy', [
            'activeSection' => 'sociology',
            'heroImage' => asset('images/departments/department-of-philosophy.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Direct alias for Chamber of Islamic Studies.
     */
    public function islamicStudies(): View
    {
        return view('pages.departments.theology', [
            'chamber' => 'islamic',
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
            'boardOfStudies' => $this->getTheologyBoardOfStudies(),
        ]);
    }

    /**
     * Direct alias for Chamber of Christian Studies.
     */
    public function christianStudies(): View
    {
        return view('pages.departments.theology', [
            'chamber' => 'christian',
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
            'boardOfStudies' => $this->getTheologyBoardOfStudies(),
        ]);
    }

    /**
     * Direct alias for Chamber of Hindutva Studies.
     */
    public function hindutvaStudies(): View
    {
        return view('pages.departments.theology', [
            'chamber' => 'hindutva',
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
            'boardOfStudies' => $this->getTheologyBoardOfStudies(),
        ]);
    }

    /**
     * Get the modular Board of Studies member profiles for the three theological chambers.
     */
    protected function getTheologyBoardOfStudies(): array
    {
        return [
            'hindutva' => [
                [
                    'name' => 'Dr. Raghavan Namboodiri',
                    'role' => 'Chairperson, Board of Studies',
                    'credentials' => 'Ph.D. in Sanskrit Literature & Advaita Vedanta',
                    'affiliation' => 'Former Dean of Indic Philosophy & Manuscriptology',
                    'initials' => 'RN',
                    'photo' => null,
                ],
                [
                    'name' => 'Prof. (Dr.) Meenakshi Sundaram',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'D.Litt. in Vedic Hermeneutics & Shad-Darshanas',
                    'affiliation' => 'Senior Research Fellow in Indic Epistemology',
                    'initials' => 'MS',
                    'photo' => null,
                ],
                [
                    'name' => 'Dr. Anand V. Joshi',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'Ph.D. in Samkhya-Yoga & Classical Logic',
                    'affiliation' => 'Visiting Professor in Dharmic Ethics & Cosmology',
                    'initials' => 'AJ',
                    'photo' => null,
                ],
                [
                    'name' => 'Dr. Kalyani Sharma',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'Ph.D. in Upanishadic Metaphysics & Textual Analysis',
                    'affiliation' => 'Indic Epigraphy & Cultural Heritage Specialist',
                    'initials' => 'KS',
                    'photo' => null,
                ],
            ],
            'islamic' => [
                [
                    'name' => 'Prof. (Dr.) Aslam Farooqi',
                    'role' => 'Chairperson, Board of Studies',
                    'credentials' => 'Ph.D. in Usul al-Fiqh & Comparative Jurisprudence',
                    'affiliation' => 'Emeritus Professor of Islamic Jurisprudence & Kalam',
                    'initials' => 'AF',
                    'photo' => null,
                ],
                [
                    'name' => 'Dr. Zainab Binte Mansoor',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'Ph.D. in Classical Kalam & Semitic Hermeneutics',
                    'affiliation' => 'Senior Fellow in Comparative Theological Studies',
                    'initials' => 'ZM',
                    'photo' => null,
                ],
                [
                    'name' => 'Maulana (Dr.) Tariq Mahmood',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'Ph.D. in Quranic Sciences & Tafsir Methodologies',
                    'affiliation' => 'Researcher in Islamic Intellectual History & Ethics',
                    'initials' => 'TM',
                    'photo' => null,
                ],
                [
                    'name' => 'Dr. Hamidullah Qureshi',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'Ph.D. in Medieval Islamic Philosophy (Falsafa)',
                    'affiliation' => 'Specialist in Avicennian Logic & Epistemology',
                    'initials' => 'HQ',
                    'photo' => null,
                ],
            ],
            'christian' => [
                [
                    'name' => 'Rev. Dr. Samuel K. Thomas',
                    'role' => 'Chairperson, Board of Studies',
                    'credentials' => 'Doctor of Theology (Th.D.) in Biblical Hermeneutics',
                    'affiliation' => 'Former Professor of Early Church History & Exegesis',
                    'initials' => 'ST',
                    'photo' => null,
                ],
                [
                    'name' => 'Dr. Mary Elizabeth Varghese',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'Ph.D. in Christian Moral Theology & Bioethics',
                    'affiliation' => 'Member of International Interfaith Council',
                    'initials' => 'MV',
                    'photo' => null,
                ],
                [
                    'name' => 'Fr. (Dr.) Joseph Cherian',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'S.T.D. in Patristic Theology & Ancient Semitic Languages',
                    'affiliation' => 'Specialist in Eastern & Oriental Christian Traditions',
                    'initials' => 'JC',
                    'photo' => null,
                ],
                [
                    'name' => 'Dr. Peter Alexander',
                    'role' => 'Member, Board of Studies',
                    'credentials' => 'Ph.D. in Systematic Theology & Ecumenism',
                    'affiliation' => 'Researcher in Contemporary Social Ethics & Ministry',
                    'initials' => 'PA',
                    'photo' => null,
                ],
            ],
        ];
    }
}
