@extends('layouts.app')

@section('title', 'About iCEEDS | Institutional Story, Governance & Vision')
@section('meta_description', 'Learn about iCEEDS, an autonomous body registered under the Government of India dedicated to excellence in skill development and accredited education.')

@section('content')

    <!-- PAGE HEADER / HERO -->
    <section class="relative py-16 sm:py-20 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/70 via-slate-950 to-slate-900 opacity-90 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-3">
                Self-Governing Educational Organization &bull; Indian Trusts Act, 1882
            </span>
            <h1 class="text-4xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                About iCEEDS
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Bridging the gap between ambition and achievement through world-class education and ISO-accredited skill development.
            </p>
        </div>
    </section>

    <!-- INSTITUTIONAL OVERVIEW & STORY -->
    <section class="py-16 sm:py-24 bg-white border-b border-slate-200/80">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Our Story & Legal Constitution</span>
                    <h2 class="text-3xl font-extrabold text-slate-950 font-heading tracking-tight">
                        Empowering Students with Industry-Relevant Skills
                    </h2>
                    <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                        <strong>iCEEDS (Innovation Council for Exquisite Education & Development of Skills)</strong> is a self-governing educational organization established under the <strong>Indian Trusts Act, 1882</strong>. As an independent skill development, training, and certification entity, the Trust designs and conducts vocational and professional courses to empower students with industry-relevant skills.
                    </p>
                    <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                        Guided and monitored by an expert <strong>Academic Board of Studies</strong>, iCEEDS ensures high standards in curriculum design and quality evaluation. Additionally, iCEEDS facilitates skill training and certification support aligned with the <strong>National Skill Development Corporation (NSDC)</strong> under the <strong>Ministry of Skill Development and Entrepreneurship, Govt. of India</strong>.
                    </p>
                    <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                        Operating with full ISO accreditation, iCEEDS maintains its Central Administrative Office in <strong>Chennai (Tamil Nadu)</strong>, Regional Administrative Office in <strong>Malappuram (Kerala)</strong>, and Operations Hub in <strong>Aluva, Ernakulam District (Kerala)</strong>, delivering transformative vocational training across South India and beyond.
                    </p>
                    <div class="pt-2 flex flex-wrap gap-4 text-xs font-semibold text-slate-700">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            <span>Indian Trusts Act, 1882</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            <span>Academic Board of Studies Monitored</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            <span>NSDC & Ministry of Skill Dev. Aligned</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                            <span>ISO Accredited Certification Body</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 to-blue-950 text-white rounded-3xl p-8 border border-slate-800 shadow-xl space-y-6">
                    <h3 class="text-xl font-bold font-heading text-white">Institutional Governance</h3>
                    <div class="space-y-4 text-xs">
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                            <span class="text-emerald-400 font-bold block uppercase text-[10px] tracking-wider mb-1">Legal Establishment</span>
                            <p class="text-slate-200 font-medium">Self-Governing Trust registered under the Indian Trusts Act, 1882</p>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                            <span class="text-blue-400 font-bold block uppercase text-[10px] tracking-wider mb-1">Academic Governance</span>
                            <p class="text-slate-200 font-medium">Expert Academic Board of Studies for curriculum & quality evaluation</p>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                            <span class="text-amber-400 font-bold block uppercase text-[10px] tracking-wider mb-1">National Alignment</span>
                            <p class="text-slate-200 font-medium">NSDC & Ministry of Skill Development and Entrepreneurship, Govt. of India</p>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                            <span class="text-purple-400 font-bold block uppercase text-[10px] tracking-wider mb-1">Administrative Presence</span>
                            <p class="text-slate-200 font-medium">Chennai (Central Office) &bull; Malappuram (Regional Office) &bull; Aluva</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INSTITUTIONAL ACCREDITATIONS & QUALITY CREDENTIALS (About Page Detail) -->
    <section class="py-16 sm:py-24 bg-slate-900 text-white border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-wider text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-3">
                    Accreditation Portfolio
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white font-heading tracking-tight">
                    Institutional Accreditations &amp; Quality Credentials
                </h2>
                <p class="mt-4 text-sm sm:text-base text-slate-300 leading-relaxed">
                    iCEEDS is committed to upholding international standards in skill development, vocational training, and educational services. Our operations, curriculum frameworks, and assessment systems align with globally recognized quality assurance bodies and national registrations.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- 1. International Frameworks -->
                <div class="bg-slate-950/80 rounded-3xl p-8 border border-slate-800 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center font-bold">01</span>
                        <div>
                            <h3 class="text-xl font-bold font-heading text-white">International Accreditations &amp; Quality Frameworks</h3>
                            <p class="text-xs text-slate-400">Global evaluation &amp; quality standards compliance</p>
                        </div>
                    </div>

                    <div class="space-y-4 text-xs text-slate-300">
                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                            <strong class="text-white text-sm block mb-1">ISO Quality Certification (9001:2015)</strong>
                            <p class="leading-relaxed">Certified under ISO Standards (9001:2015) for Quality Management Systems in Educational and Vocational Training.</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                            <strong class="text-white text-sm block mb-2">Global Accreditation Support &amp; Alignment</strong>
                            <p class="leading-relaxed mb-3">Institutional quality frameworks aligned and recognized under international accreditation councils and boards:</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                                <div class="p-2 rounded-xl bg-slate-900 border border-slate-800">
                                    <span class="text-emerald-400 font-bold block">EGAC</span>
                                    <span class="text-[11px] text-slate-400">Egyptian Accreditation Council</span>
                                </div>
                                <div class="p-2 rounded-xl bg-slate-900 border border-slate-800">
                                    <span class="text-emerald-400 font-bold block">EIAC</span>
                                    <span class="text-[11px] text-slate-400">Emirates International Accreditation Centre</span>
                                </div>
                                <div class="p-2 rounded-xl bg-slate-900 border border-slate-800">
                                    <span class="text-blue-400 font-bold block">QEAA</span>
                                    <span class="text-[11px] text-slate-400">Quality Education Assurance Accreditation</span>
                                </div>
                                <div class="p-2 rounded-xl bg-slate-900 border border-slate-800">
                                    <span class="text-blue-400 font-bold block">FICS</span>
                                    <span class="text-[11px] text-slate-400">Forum for Internationally Certified Scholars</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 rounded-2xl bg-white/5 border border-white/10">
                            <strong class="text-white text-sm block mb-1">US &amp; UK International Accreditation Agencies</strong>
                            <p class="leading-relaxed">International Credentials Recognition providing global mobility and evaluation alignment for iCEEDS course completers.</p>
                        </div>
                    </div>
                </div>

                <!-- 2. National Registrations -->
                <div class="bg-slate-950/80 rounded-3xl p-8 border border-slate-800 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold">02</span>
                        <div>
                            <h3 class="text-xl font-bold font-heading text-white">National Registrations &amp; Government Recognitions</h3>
                            <p class="text-xs text-slate-400">Statutory establishment under Government of India</p>
                        </div>
                    </div>

                    <div class="space-y-3.5 text-xs text-slate-300">
                        <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <strong class="text-white text-sm block mb-0.5">Registered Educational Trust</strong>
                            <p class="leading-relaxed">Established as a self-governing educational trust under the <strong>Indian Trusts Act, 1882</strong>.</p>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <strong class="text-white text-sm block mb-0.5">NSDC Certification Support</strong>
                            <p class="leading-relaxed">Facilitating skill training and certification support aligned with the <strong>National Skill Development Corporation (NSDC)</strong> under the <strong>Ministry of Skill Development and Entrepreneurship (MSDE)</strong>, Govt. of India.</p>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <strong class="text-white text-sm block mb-0.5">NITI Aayog Registered</strong>
                            <p class="leading-relaxed">Enrolled under the <strong>NGO Darpan initiative, NITI Aayog</strong>, Government of India.</p>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
                            <strong class="text-white text-sm block mb-0.5">MSME Recognized</strong>
                            <p class="leading-relaxed">Registered under the <strong>Ministry of Micro, Small &amp; Medium Enterprises (MSME)</strong>, Government of India.</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                            <div class="p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <strong class="text-emerald-400 block mb-0.5">Employment Exchanges</strong>
                                <p class="text-[11px] text-slate-400 leading-tight">Eligible to be registered as an additional skill qualification in Employment Exchanges across India.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-900 border border-slate-800">
                                <strong class="text-blue-400 block mb-0.5">IP Protection</strong>
                                <p class="text-[11px] text-slate-400 leading-tight">Curricula, certifications, and brand credentials protected under Copyright and Trademark regulations (Govt. of India).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOUR CORE PILLARS SECTION (2x2 Layout) -->
    <section class="py-16 sm:py-24 bg-portal-gradient border-b border-slate-200/70">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Foundational Principles</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">Our Four Core Pillars</h2>
                <p class="mt-3 text-sm text-slate-600">
                    The strategic pillars that anchor every curriculum, program, and credential authorized by iCEEDS.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($pillars as $pillar)
                    <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm hover:shadow-md transition">
                        <span class="font-mono text-xs font-bold px-3 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-200/60 inline-block mb-4">
                            Pillar {{ $pillar['number'] }}
                        </span>
                        <h3 class="text-xl font-bold text-slate-900 font-heading mb-3">{{ $pillar['title'] }}</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">{{ $pillar['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ACADEMIC DIRECTORATE & LEADERSHIP -->
    <section class="py-16 sm:py-24 bg-white border-b border-slate-200/80">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Institutional Governance</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">Leadership & Mentors</h2>
                <p class="mt-3 text-sm text-slate-600">
                    Guiding our academic standards, national accreditation, and student outcomes.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($mentors as $mentor)
                    <div class="bg-slate-50/70 rounded-3xl p-8 border border-slate-200/90 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 mb-4">
                                <div class="relative w-16 h-16 rounded-2xl overflow-hidden border border-slate-200 shadow-md shrink-0 bg-slate-100">
                                    @if(!empty($mentor['image']))
                                        <img src="{{ asset($mentor['image']) }}" alt="{{ $mentor['name'] }}" class="w-full h-full object-cover object-top">
                                    @else
                                        <div class="w-full h-full bg-slate-900 text-white font-heading font-black text-lg flex items-center justify-center">
                                            {{ $mentor['initials'] }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900 font-heading">{{ $mentor['name'] }}</h3>
                                    <p class="text-xs font-bold text-blue-700">{{ $mentor['role'] }}</p>
                                    <span class="font-mono text-[11px] text-slate-500 block">{{ $mentor['credentials'] }}</span>
                                </div>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic border-l-2 border-blue-600 pl-4 py-1">
                                &ldquo;{{ $mentor['message'] }}&rdquo;
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-200 text-xs text-slate-400">
                            Attributed to: <strong class="text-slate-700">{{ $mentor['attribution'] }}</strong>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ADMINISTRATIVE OFFICES STRIP -->
    <section class="py-14 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-wider block mb-2">Central Office</span>
                    <h4 class="font-bold text-white text-base font-heading">Chennai, Tamil Nadu</h4>
                    <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                        132/76 Mogappair Road, Thiruvalluvar, Chennai, Tamil Nadu — Pin: 600050
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                    <span class="text-xs font-bold text-blue-400 uppercase tracking-wider block mb-2">Regional Office</span>
                    <h4 class="font-bold text-white text-base font-heading">Malappuram, Kerala</h4>
                    <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                        AQAAB Arcade, Athanikkal, Valluvambram PO, Malappuram District, Kerala — Pin: 676517
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block mb-2">Contact & Inquiries</span>
                    <h4 class="font-bold text-white text-base font-heading">Direct Channels</h4>
                    <p class="text-xs text-slate-300 mt-1">Email: <a href="mailto:lettertoiceeds@gmail.com" class="text-blue-300 hover:underline">lettertoiceeds@gmail.com</a></p>
                    <p class="text-xs text-slate-300">Phones: <a href="tel:+918943997003" class="text-blue-300 hover:underline">+91 89439 97003</a> / <a href="tel:+919061202443" class="text-blue-300 hover:underline">+91 90612 02443</a></p>
                </div>
            </div>
        </div>
    </section>

@endsection
