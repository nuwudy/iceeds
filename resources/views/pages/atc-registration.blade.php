@extends('layouts.app')

@section('title', 'ATC Registration Form | iCEEDS Authorized Training Centre')
@section('meta_description', 'Apply for official affiliation as an Authorized Training Centre (ATC) under iCEEDS - Innovation Council for Exquisite Education & Development of Skills.')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-100 via-slate-50 to-white py-8 sm:py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(session('submission_success'))
            <!-- SUCCESS CONFIRMATION RECEIPT CARD -->
            <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 overflow-hidden mb-10 transition-all duration-300">
                <div class="bg-gradient-to-r from-emerald-600 to-teal-700 px-6 sm:px-10 py-8 text-white relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
                        <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 16h2v2h-2zm0-6h2v4h-2z"/>
                        </svg>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center shrink-0 border border-white/30 shadow-inner">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-500/40 text-emerald-100 text-[11px] font-bold tracking-wider uppercase mb-1">
                                Application Submitted Successfully
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-white tracking-tight">
                                Registration Received
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-10 space-y-6">
                    <div class="bg-emerald-50/80 border border-emerald-200/90 rounded-2xl p-5 sm:p-6 text-slate-800">
                        <p class="text-sm sm:text-base leading-relaxed text-slate-700">
                            Thank you! Your institutional application for <strong>Authorized Training Centre (ATC)</strong> status has been recorded in the iCEEDS Academic Registry.
                        </p>
                        
                        <div class="mt-4 pt-4 border-t border-emerald-200/60 grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                            <div>
                                <span class="text-slate-500 uppercase tracking-wider text-[10px] font-bold block">Application Reference No</span>
                                <span class="font-mono font-bold text-base sm:text-lg text-emerald-800 bg-white px-3 py-1 rounded-lg border border-emerald-300 inline-block mt-0.5">
                                    {{ session('reference_no') }}
                                </span>
                            </div>
                            <div>
                                <span class="text-slate-500 uppercase tracking-wider text-[10px] font-bold block">Study Centre Name</span>
                                <span class="font-bold text-slate-900 block mt-1">
                                    {{ session('centre_name') }}
                                </span>
                            </div>
                            <div>
                                <span class="text-slate-500 uppercase tracking-wider text-[10px] font-bold block">Director / Manager</span>
                                <span class="font-semibold text-slate-800 block mt-0.5">
                                    {{ session('director_name') }}
                                </span>
                            </div>
                            <div>
                                <span class="text-slate-500 uppercase tracking-wider text-[10px] font-bold block">Official Email</span>
                                <span class="font-mono text-slate-800 block mt-0.5">
                                    {{ session('email') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-xs text-slate-500 leading-relaxed space-y-1">
                        <p>• Our Verification &amp; Affiliation Committee will examine your application and uploaded credentials.</p>
                        <p>• Our administrative office will contact you via email or phone regarding inspection, syllabus allotment, and ATC certificate dispatch.</p>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
                        <a href="{{ route('atc.create') }}" class="w-full sm:w-auto text-center px-6 py-2.5 rounded-xl text-xs font-bold bg-slate-900 hover:bg-slate-800 text-white transition shadow-sm">
                            Submit Another Application
                        </a>
                        <a href="{{ route('home') }}" class="w-full sm:w-auto text-center px-6 py-2.5 rounded-xl text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 transition">
                            Back to Homepage
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <!-- REGISTRATION CONTAINER -->
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200/80 overflow-hidden">
            
            <!-- OFFICIAL BRAND HEADER (Matches Google Form) -->
            <div class="border-b border-slate-200 bg-gradient-to-b from-white to-slate-50/70 p-6 sm:p-10 text-center relative">
                <!-- Top Accent Bar -->
                <div class="absolute top-0 inset-x-0 h-2 bg-gradient-to-r from-[#0197b2] via-sky-500 to-indigo-600"></div>

                <!-- Logo -->
                <div class="flex justify-center mb-5">
                    <div class="bg-white px-5 py-3 rounded-2xl shadow-sm border border-slate-200/80 inline-flex items-center justify-center">
                        <picture>
                            <source srcset="{{ asset('images/logo.webp') }}?v={{ file_exists(public_path('images/logo.webp')) ? filemtime(public_path('images/logo.webp')) : time() }}" type="image/webp">
                            <img src="{{ asset('images/logo.png') }}?v={{ file_exists(public_path('images/logo.png')) ? filemtime(public_path('images/logo.png')) : time() }}" alt="iCEEDS Logo" class="h-14 sm:h-16 w-auto object-contain">
                        </picture>
                    </div>
                </div>

                <!-- Title & Headings -->
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">
                    iCEEDS ATC Registration form
                </h1>
                
                <div class="mt-3 space-y-2 text-center max-w-3xl mx-auto">
                    <p class="text-xs sm:text-sm md:text-base font-bold text-[#0197b2]">
                        उत्तम शिक्षा और कौशल के विकास के लिए नवाचार परिषद
                    </p>
                    <div class="pt-1 text-[11px] sm:text-xs font-semibold text-slate-700 space-y-1 tracking-wide uppercase leading-relaxed">
                        <p class="font-bold text-slate-800">ISO 9001:2015 CERTIFIED FOR QUALITY MANAGEMENT SYSTEM</p>
                        <p class="text-slate-600">NSDC (SKILL INDIA) CERTIFICATION PARTNER ASSOCIATED WITH AUTHORISED TRAINING PARTNERS</p>
                        <p class="text-slate-600">AN AUTONOMOUS BODY REGISTERED AS A TRUST UNDER THE INDIAN TRUSTS ACT 1882</p>
                        <p class="font-bold text-slate-800 font-mono tracking-normal text-[11.5px] sm:text-xs">NGO DARPAN UNIQUE ID NO: KL/2023/0348375 (NITI AAYOG, GOVT. OF INDIA)</p>
                    </div>
                </div>

                <!-- Statutory Credentials Badges -->
                <div class="mt-4 flex flex-wrap justify-center items-center gap-2 text-[10px] sm:text-[11px] font-semibold text-slate-600">
                    <span class="px-2.5 py-1 rounded-full bg-slate-100 border border-slate-200">
                        Indian Trusts Act, 1882
                    </span>
                    <span class="px-2.5 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700">
                        NITI Aayog NGO Darpan: KL/2023/0348375
                    </span>
                    <span class="px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800">
                        ISO 9001:2015 QMS
                    </span>
                    <span class="px-2.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-800">
                        NSDC Skill India Partner
                    </span>
                </div>
            </div>

            <!-- FORM INSTRUCTIONS -->
            <div class="bg-blue-50/50 border-b border-blue-100 px-6 sm:px-10 py-3.5 flex items-center justify-between text-xs text-slate-600">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Authorized Training Centre (ATC) Affiliation Application</span>
                </div>
                <div class="text-red-500 font-semibold text-[11px]">
                    * Indicates required question
                </div>
            </div>

            <!-- APPLICATION FORM -->
            <form action="{{ route('atc.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-10 space-y-8" id="atcForm">
                @csrf

                @if ($errors->any())
                    <div class="rounded-2xl bg-red-50 p-4 border border-red-200 text-red-800 text-xs sm:text-sm">
                        <div class="flex items-center gap-2 font-bold mb-1.5">
                            <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            <span>Please correct the errors in the form before submitting:</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-red-700 pl-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- SECTION 1: STUDY CENTRE DETAILS -->
                <div class="space-y-6">
                    <div class="border-b border-slate-200 pb-2 flex items-center justify-between">
                        <h2 class="text-base sm:text-lg font-bold text-slate-900 font-heading flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-blue-600 text-white text-xs flex items-center justify-center font-bold">1</span>
                            <span>Study Centre Details</span>
                        </h2>
                        <span class="text-xs text-slate-400 font-medium">Institutional Profile</span>
                    </div>

                    <!-- 1. Name of Study Centre (CAPITAL LETTERS) * -->
                    <div>
                        <label for="centre_name" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Name of Study Centre (CAPITAL LETTERS) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="centre_name" 
                            id="centre_name" 
                            value="{{ old('centre_name') }}" 
                            required 
                            placeholder="YOUR STUDY CENTRE NAME IN CAPITAL LETTERS"
                            oninput="this.value = this.value.toUpperCase()"
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('centre_name') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm font-semibold uppercase tracking-wide transition shadow-2xs placeholder:normal-case placeholder:font-normal placeholder:text-slate-400"
                        >
                        @error('centre_name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 2. Year of Establishment * -->
                    <div>
                        <label for="year_of_establishment" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Year of Establishment <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="year_of_establishment" 
                            id="year_of_establishment" 
                            value="{{ old('year_of_establishment') }}" 
                            required 
                            placeholder="e.g. 2018 or DD/MM/YYYY"
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('year_of_establishment') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm transition shadow-2xs placeholder:text-slate-400"
                        >
                        @error('year_of_establishment')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 3. Address of Study Centre (including PIN Code) * -->
                    <div>
                        <label for="centre_address" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Address of Study Centre (including PIN Code) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="centre_address" 
                            id="centre_address" 
                            rows="3" 
                            required 
                            placeholder="Complete postal address of the Study Centre with building/street details, district, state, and 6-digit PIN code"
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('centre_address') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm transition shadow-2xs placeholder:text-slate-400"
                        >{{ old('centre_address') }}</textarea>
                        @error('centre_address')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 4. Your Course Name & Duration * -->
                    <div>
                        <label for="course_details" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Your Course Name &amp; Duration <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="course_details" 
                            id="course_details" 
                            rows="2" 
                            required 
                            placeholder="List courses you intend to conduct through iCEEDS along with their duration (e.g. Diploma in Counselling Psychology - 1 Year, Certificate in Child Education - 6 Months)"
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('course_details') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm transition shadow-2xs placeholder:text-slate-400"
                        >{{ old('course_details') }}</textarea>
                        @error('course_details')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- SECTION 2: DIRECTOR / MANAGER DETAILS -->
                <div class="space-y-6 pt-4">
                    <div class="border-b border-slate-200 pb-2 flex items-center justify-between">
                        <h2 class="text-base sm:text-lg font-bold text-slate-900 font-heading flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-blue-600 text-white text-xs flex items-center justify-center font-bold">2</span>
                            <span>Director / Manager Details</span>
                        </h2>
                        <span class="text-xs text-slate-400 font-medium">Head of Centre</span>
                    </div>

                    <!-- 5. Name of Director/Manager * -->
                    <div>
                        <label for="director_name" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Name of Director/Manager <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="director_name" 
                            id="director_name" 
                            value="{{ old('director_name') }}" 
                            required 
                            placeholder="Full name of the Centre Director or Manager"
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('director_name') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm font-medium transition shadow-2xs placeholder:text-slate-400"
                        >
                        @error('director_name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 6. Contact Number * & 7. Office Number -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="contact_number" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Contact Number <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="tel" 
                                name="contact_number" 
                                id="contact_number" 
                                value="{{ old('contact_number') }}" 
                                required 
                                placeholder="Primary mobile / WhatsApp number"
                                class="w-full px-4 py-3 rounded-xl border {{ $errors->has('contact_number') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm font-mono transition shadow-2xs placeholder:text-slate-400"
                            >
                            @error('contact_number')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="office_number" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Office Number <span class="text-slate-400 font-normal">(Optional)</span>
                            </label>
                            <input 
                                type="tel" 
                                name="office_number" 
                                id="office_number" 
                                value="{{ old('office_number') }}" 
                                placeholder="Landline or second contact"
                                class="w-full px-4 py-3 rounded-xl border {{ $errors->has('office_number') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm font-mono transition shadow-2xs placeholder:text-slate-400"
                            >
                            @error('office_number')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- 8. Official E-MAIL ID * -->
                    <div>
                        <label for="email" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Official E-MAIL ID <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}" 
                            required 
                            placeholder="official@yourcentre.com"
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('email') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm font-mono transition shadow-2xs placeholder:text-slate-400"
                        >
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 9. Address of Director/Manager (including PIN Code) * -->
                    <div>
                        <label for="director_address" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Address of Director/Manager (including PIN Code) <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="director_address" 
                            id="director_address" 
                            rows="3" 
                            required 
                            placeholder="Complete residential or official address of the Director/Manager including 6-digit PIN code"
                            class="w-full px-4 py-3 rounded-xl border {{ $errors->has('director_address') ? 'border-red-400 ring-2 ring-red-200' : 'border-slate-300' }} focus:border-blue-500 focus:ring-3 focus:ring-blue-100 text-sm transition shadow-2xs placeholder:text-slate-400"
                        >{{ old('director_address') }}</textarea>
                        @error('director_address')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- SECTION 3: PHOTOGRAPH / CREDENTIAL FILE UPLOAD -->
                <div class="space-y-4 pt-4">
                    <div class="border-b border-slate-200 pb-2 flex items-center justify-between">
                        <h2 class="text-base sm:text-lg font-bold text-slate-900 font-heading flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-blue-600 text-white text-xs flex items-center justify-center font-bold">3</span>
                            <span>Photograph &amp; Documents</span>
                        </h2>
                        <span class="text-xs text-slate-400 font-medium">Max 10 MB</span>
                    </div>

                    <!-- 10. Photograph of Director/Manager * -->
                    <div>
                        <label for="director_photo" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1">
                            Photograph of Director/Manager <span class="text-red-500">*</span>
                        </label>
                        <p class="text-xs text-slate-500 mb-3">Upload 1 supported file. Supported formats: JPG, PNG, WEBP, PDF (Max 10 MB).</p>

                        <div 
                            id="dropzone" 
                            class="relative border-2 border-dashed {{ $errors->has('director_photo') ? 'border-red-400 bg-red-50/40' : 'border-slate-300 bg-slate-50/60' }} hover:border-blue-500 hover:bg-blue-50/40 rounded-2xl p-6 text-center cursor-pointer transition"
                            onclick="document.getElementById('director_photo').click()"
                        >
                            <input 
                                type="file" 
                                name="director_photo" 
                                id="director_photo" 
                                accept=".jpg,.jpeg,.png,.webp,.pdf,image/*,application/pdf"
                                required 
                                class="hidden"
                                onchange="handleFileSelected(this)"
                            >

                            <div id="uploadPrompt" class="space-y-2">
                                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 mx-auto flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-700">
                                    <span class="text-blue-600 hover:underline">Click to upload</span> or drag and drop
                                </div>
                                <div class="text-[11px] text-slate-500">
                                    Passport photo or formal ID image of Director/Manager (Max: 10 MB)
                                </div>
                            </div>

                            <!-- Selected File Information Bar -->
                            <div id="fileInfo" class="hidden mt-2 p-3 bg-white rounded-xl border border-slate-200 flex items-center justify-between text-left">
                                <div class="flex items-center gap-3 overflow-hidden">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="truncate">
                                        <span id="fileName" class="text-xs font-bold text-slate-900 block truncate">filename.jpg</span>
                                        <span id="fileSize" class="text-[10px] text-slate-500 font-mono">0 KB</span>
                                    </div>
                                </div>
                                <button type="button" onclick="event.stopPropagation(); clearSelectedFile();" class="text-xs text-red-500 hover:text-red-700 font-semibold px-2 py-1">
                                    Change
                                </button>
                            </div>
                        </div>

                        @error('director_photo')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- SECTION 4: DECLARATION (Verbatim from Google Form) -->
                <div class="pt-4">
                    <div class="rounded-2xl bg-slate-900 text-white p-5 sm:p-7 shadow-sm border border-slate-800 space-y-3">
                        <div class="flex items-center gap-2 text-sky-400 font-bold uppercase tracking-wider text-xs">
                            <svg class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span>DECLARATION</span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-200 leading-relaxed">
                            I acknowledge visiting the website of ICEEDS and understanding the details of the NGO. By submitting this form, I hereby declare my commitment to abide by the rules &amp; regulations outlined.
                        </p>

                        <div class="pt-2">
                            <label class="flex items-start gap-3 cursor-pointer select-none">
                                <input 
                                    type="checkbox" 
                                    name="declaration" 
                                    id="declaration" 
                                    value="1" 
                                    required 
                                    {{ old('declaration') ? 'checked' : '' }}
                                    class="mt-1 w-4 h-4 rounded text-blue-600 focus:ring-blue-500 border-slate-600 bg-slate-800"
                                >
                                <span class="text-xs sm:text-sm font-semibold text-slate-100">
                                    I agree to the institutional declaration and affirm that all details submitted above are true and accurate. <span class="text-red-400">*</span>
                                </span>
                            </label>
                            @error('declaration')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- SUBMIT ACTIONS -->
                <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button 
                        type="submit" 
                        id="submitBtn"
                        class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-slate-900 to-blue-900 hover:from-blue-700 hover:to-blue-900 focus:ring-4 focus:ring-blue-200 transition shadow-md flex items-center justify-center gap-2 cursor-pointer"
                    >
                        <span>Submit Registration</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>

                    <button 
                        type="reset" 
                        onclick="clearSelectedFile();"
                        class="text-xs font-semibold text-slate-500 hover:text-slate-800 transition py-2"
                    >
                        Clear Form
                    </button>
                </div>
            </form>
        </div>

        <!-- SHARE / INFO FOOTNOTE -->
        <div class="mt-8 text-center text-xs text-slate-500 space-y-1">
            <p>iCEEDS Authorized Training Centre (ATC) Registration Portal</p>
            <p>Direct Shareable Form Link: <span class="font-mono font-semibold text-blue-600 select-all">{{ url('/atc-registration') }}</span></p>
        </div>
    </div>
</div>

<script>
    function handleFileSelected(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const sizeInMb = (file.size / (1024 * 1024)).toFixed(2);

            if (file.size > 10 * 1024 * 1024) {
                alert('File size exceeds 10 MB limit. Please select a smaller file.');
                clearSelectedFile();
                return;
            }

            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = sizeInMb + ' MB';
            document.getElementById('uploadPrompt').classList.add('hidden');
            document.getElementById('fileInfo').classList.remove('hidden');
        }
    }

    function clearSelectedFile() {
        const input = document.getElementById('director_photo');
        if (input) input.value = '';
        document.getElementById('uploadPrompt').classList.remove('hidden');
        document.getElementById('fileInfo').classList.add('hidden');
    }

    // Drag and Drop support
    const dropzone = document.getElementById('dropzone');
    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropzone.classList.add('border-blue-500', 'bg-blue-50/50');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropzone.classList.remove('border-blue-500', 'bg-blue-50/50');
        }, false);
    });

    dropzone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length) {
            const fileInput = document.getElementById('director_photo');
            fileInput.files = files;
            handleFileSelected(fileInput);
        }
    }, false);

    // Form submit loading state
    document.getElementById('atcForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-wait');
        btn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Submitting Application...
        `;
    });
</script>
@endsection
