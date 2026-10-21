<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestimonialAndBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ---------------------------------------------------------------------
        // 1. SEED TESTIMONIALS
        // ---------------------------------------------------------------------
        $testimonials = [
            [
                'name' => 'Anoop Krishnan',
                'role_or_course' => 'Alumnus, Diploma in Professional Counselling Psychology',
                'rating' => 5,
                'content' => 'The modular curriculum monitored by the Academic Board of Studies gave me the clinical competence and theoretical depth needed for community mental health counselling. The online serial code verification makes sharing credentials with healthcare recruiters completely seamless and transparent.',
                'is_approved' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Fatima Zahra',
                'role_or_course' => 'Researcher, Chamber of Islamic Studies',
                'rating' => 5,
                'content' => 'The Chamber of Islamic Studies at iCEEDS provides a rare scholarly balance—honoring classical Usul al-Fiqh while applying rigorous hermeneutical analysis. The interfaith academic environment fosters deep intellectual respect and high academic standards.',
                'is_approved' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Fr. Mathew V. George',
                'role_or_course' => 'Scholar, Chamber of Christian Studies',
                'rating' => 5,
                'content' => 'Superb academic discipline and reverent textual study in Patristic theology and Biblical exegesis. iCEEDS stands out for its integrity, objective scholarship, and lawful governance under the Indian Trusts Act, 1882.',
                'is_approved' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Dr. Suresh Kumar Nair',
                'role_or_course' => 'Director, Authorized Training Centre (ATC), Malappuram',
                'rating' => 5,
                'content' => 'Partnering with iCEEDS as an Authorized Training Centre has been transformative for our students. Access to over 4,000+ course syllabi benchmarked against national skill standards allows us to address real market demands across Northern Kerala with unquestioned credibility.',
                'is_approved' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Divya Ramesh',
                'role_or_course' => 'Candidate, Chamber of Hindutva Studies (Advaita Vedanta)',
                'rating' => 5,
                'content' => 'The depth of scholarship in the Six Classical Darshanas and Upanishadic epistemology is unmatched. The institutional transparency and faculty mentorship have provided clarity and academic rigor to my research in Indic philosophies.',
                'is_approved' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Mohammed Bilal K.',
                'role_or_course' => 'Graduate, Allied Healthcare & Emergency Care',
                'rating' => 4,
                'content' => 'High quality practical training modules and well-structured examinations. The physical certificate came with security features and verified police clearance documentation that gave my employer instant confidence.',
                'is_approved' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Pooja V. Menon',
                'role_or_course' => 'Student, Applied Sociology & Community Development',
                'rating' => 5,
                'content' => 'The Department of Philosophy provides an engaging perspective on social structures and community transformation. The curriculum is both academically robust and practically relevant for NGOs and developmental sectors.',
                'is_approved' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'K. R. Harikrishnan',
                'role_or_course' => 'Candidate, Technical Vocational Certification',
                'rating' => 3,
                'content' => 'Good theoretical material and helpful ATC instructors. Would love to see even more video lectures in the future.',
                'is_approved' => false, // Under 4 stars: pending admin approval!
                'is_featured' => false,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(
                ['name' => $t['name'], 'role_or_course' => $t['role_or_course']],
                $t
            );
        }

        // ---------------------------------------------------------------------
        // 2. SEED BLOGS (In the context of iCEEDS)
        // ---------------------------------------------------------------------
        $blogs = [
            [
                'title' => 'The Role of Autonomous Educational Trusts in Bridging India\'s Skill Gap',
                'slug' => 'autonomous-educational-trusts-bridging-india-skill-gap',
                'category' => 'Institutional Governance',
                'author_name' => 'iCEEDS Academic Directorate',
                'author_role' => 'Board of Studies',
                'reading_time' => '6 min read',
                'featured_image' => 'images/departments/philosophy-theology-hero.webp',
                'excerpt' => 'An in-depth analysis of how self-governing educational trusts established under the Indian Trusts Act, 1882 foster rapid skill adaptation, vocational excellence, and employment readiness aligned with national qualification frameworks.',
                'content' => '### The Imperative of Skill Democratization in Modern India

India stands at a pivotal demographic threshold. With over 65% of the population under 35 years of age, the nation\'s economic trajectory depends directly on the quality, adaptability, and speed of vocational education. Traditional statutory degree frameworks—while essential for fundamental academic research—often encounter lengthy bureaucratic revision cycles that delay curriculum upgrades to match rapid industrial transitions.

### The Constitutional & Legal Architecture of Educational Trusts

Under the **Indian Trusts Act, 1882**, self-governing educational trusts are vested with the legal mandate to design, conduct, assess, and confer specialized certifications in personal, professional, and vocational development. As recognized by courts and statutory authorities across the country, non-statutory vocational credentials hold independent professional validity across private, industrial, and non-governmental employment sectors.

> "Alongside University and NSDC-affiliated offerings, iCEEDS awards proprietary certifications in skill and professional development under established constitutional frameworks. While these credentials are independent of UGC or AICTE statutory degrees, they represent rigorous, verified competency benchmarks."

### Benchmarking with the National Skills Qualifications Framework (NSQF)

iCEEDS addresses this mandate by designing over 4,000+ course syllabi monitored by an independent **Academic Board of Studies**. By closely benchmarking occupational learning outcomes against the parameters of the **National Skill Development Corporation (NSDC)** under the Ministry of Skill Development & Entrepreneurship (MSDE), learners are equipped with real-world competencies:

1. **Practical Workshop Mastery:** Emphasizing tangible equipment, clinical, or technological practice over rote memorization.
2. **Modular Certification:** Allowing candidates to stack qualifications and advance their careers progressively.
3. **Transparent Public Registry:** Providing prospective employers with instant cryptographic certificate validation 24/7.

Through this balanced synergy of autonomous agility and rigorous academic governance, iCEEDS continues to serve as an engine of workforce empowerment and community self-reliance.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Integrating Classical Wisdom with Cognitive Sciences: Inside the Department of Philosophy & Theology',
                'slug' => 'integrating-classical-wisdom-with-cognitive-sciences',
                'category' => 'Academic Research',
                'author_name' => 'Faculty of Human Sciences & Divinity',
                'author_role' => 'Academic Directorate',
                'reading_time' => '7 min read',
                'featured_image' => 'images/departments/department-of-philosophy.webp',
                'excerpt' => 'Exploring how iCEEDS uniquely connects the empirical methodologies of Psychology and Sociology with the profound philosophical inquiry of autonomous theological chambers.',
                'content' => '### Beyond the Fragmented Academy

Modern academia frequently segregates empirical scientific enquiry from sacred philosophical traditions. Cognitive psychology studies neurological mechanisms and behavioral responses, while theology and classical philosophy are relegated to historical departments. At iCEEDS, the **Department of Philosophy & Theology** was conceptualized to overcome this false dichotomy.

### Dual Intellectual Pillars: Philosophy, Psychology & Sociology

The **Department of Philosophy** houses two vibrant academic divisions:
- **Division of Psychology:** Focuses on cognitive science, counselling psychology, mental hygiene, and human developmental dynamics. By teaching evidence-based therapeutic counselling alongside foundational ethics, candidates emerge as compassionate, competent practitioners.
- **Division of Sociology:** Explores community transformation, social stratification, family structures, and civic networks, providing empirical grounding to social interventions.

### Autonomous Theological Chambers: A Trifecta of Interfaith Scholarship

Complementing the human sciences is the **Department of Theology**, structured across three autonomous research chambers:
1. **Chamber of Hindutva Studies:** Centers on the Six Astika Darshanas (Nyaya, Vaisheshika, Samkhya, Yoga, Mimamsa, and Vedanta), Vedic hermeneutics, and Indic civilizational heritage.
2. **Chamber of Islamic Studies:** Investigates Usul al-Fiqh (jurisprudence), classical Kalam (theology), Quranic hermeneutics (Tafsir), and the golden age contributions of Islamic philosophy (Falsafa).
3. **Chamber of Christian Studies:** Conducts scholarly research in Biblical exegesis, Patristic literature, early Church history, and ecumenical interfaith engagement.

### Governed by Specialized Boards of Studies

Each chamber operates under the guidance of a distinguished 4-member **Board of Studies** comprising emeritus professors, doctorate researchers, and textual scholars. This institutional architecture ensures that faith traditions are studied with academic reverence, textual fidelity, and mutual solidarity.',
                'status' => 'published',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Digital Credential Integrity: How Cryptographic Registries and QR Verification Combat Fraud',
                'slug' => 'digital-credential-integrity-cryptographic-registries-qr-verification',
                'category' => 'Technology & Verification',
                'author_name' => 'Verification & Examination Registry',
                'author_role' => 'Controller of Examinations',
                'reading_time' => '5 min read',
                'featured_image' => 'images/departments/chamber-christian-studies.webp',
                'excerpt' => 'Why 24/7 instant online verification, tamper-evident cryptographic serials, and official police clearance reports are the gold standard for institutional transparency in vocational education.',
                'content' => '### The Crisis of Unverified Credentials in India

In an increasingly competitive job market, fraudulent certificates, duplicate diplomas, and unverified training credentials pose severe liabilities to employers and genuine candidates alike. Educational institutions must adopt transparent, tamper-evident digital architectures that eliminate ambiguity.

### The iCEEDS Three-Tier Verification Engine

To ensure complete credibility for its over 10,000+ awarded credentials, iCEEDS implements an enterprise-grade digital verification system:

1. **Cryptographic Serial Indexing:** Every issued certificate features a permanent unique alphanumeric identification code registered in a centralized, secure database.
2. **Instant QR Code Validation:** Printed certificate documents feature encrypted QR codes that allow recruiters, embassies, or universities to scan and verify the original student name, course title, and completion date in seconds.
3. **Public Online Registry:** A dedicated verification portal at `iceeds.com/verify` enables direct queries without requiring login barriers, delivering immediate proof of authenticity.

### Institutional Legitimacy & Official Police Clearance

Institutional authenticity requires comprehensive public accountability. In response to malicious inquiries, the **Office of the Deputy Superintendent of Police (DySP), Malappuram** conducted a comprehensive field enquiry pursuant to a petition forwarded from the **Hon\'ble Chief Minister\'s Office (CMO), Kerala**.

Following extensive inspection of all trust deeds, board resolutions, and academic records, the police authorities officially certified the lawful governance, valid registrations, and legitimate educational operations of iCEEDS (File Reference No. 43/CMO/SDOM/2026). This official document is openly accessible directly on the portal for all prospective students and partnering institutions.',
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Vocational Empowerment & Grassroots Employability: The Mission of 4,000+ Syllabi',
                'slug' => 'vocational-empowerment-grassroots-employability-4000-syllabi',
                'category' => 'Vocational Education',
                'author_name' => 'Skill Development Council',
                'author_role' => 'ATC Affiliation Wing',
                'reading_time' => '6 min read',
                'featured_image' => 'images/departments/chamber-islamic-studies.webp',
                'excerpt' => 'How customized vocational curriculums and Authorized Training Centers empower rural youth, women, and adult learners with market-driven, employable skillsets.',
                'content' => '### Aligning with the Skill India Vision

Under the inspirational banner of *Kaushal Bharat, Kushal Bharat*, the government has called for an all-encompassing national skilling ecosystem. To make this vision a reality on the ground, educational bodies must move beyond generic one-size-fits-all diplomas and provide hyper-specialized vocational training tailored to regional economic demands.

### Why a Catalog of Over 4,000+ Syllabi Matters

iCEEDS maintains an extensive repository of more than **4,000+ approved course syllabi** spanning diverse domains:
- **Healthcare & Allied Medical Sciences:** Community nursing assistance, medical lab technology, physiotherapy support, and emergency care.
- **Mental Health & Counselling:** Family counselling, child psychology, addiction rehabilitation assistance, and educational mentoring.
- **Technical & Industrial Trades:** Electrical maintenance, automotive mechanics, solar installation, and digital electronics.
- **Computer Applications & Commerce:** Office automation, financial accounting (Tally/GST), digital media, and IT support.
- **Traditional & Alternative Wellness:** Yoga therapy, naturopathy, traditional wellness management, and lifestyle health.

### The Role of Authorized Training Centres (ATCs)

These courses are delivered locally through a growing nationwide network of **Authorized Training Centres (ATCs)**. By providing local centers with comprehensive curriculum syllabi, standardized examination blueprints, and legitimate trust credentials, iCEEDS enables community entrepreneurs to run high-standard vocational academies that directly place students into local employment.',
                'status' => 'published',
                'published_at' => now()->subDay(),
            ],
        ];

        foreach ($blogs as $b) {
            BlogPost::updateOrCreate(
                ['slug' => $b['slug']],
                $b
            );
        }
    }
}
