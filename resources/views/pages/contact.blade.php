@extends('layouts.app')

@section('title', 'Contact Us | iCEEDS Official Portal')
@section('meta_description', 'Get in touch with iCEEDS for inquiries regarding ISO-accredited certifications, institutional affiliation, or certificate validation.')

@section('content')

    <!-- PAGE HEADER / HERO -->
    <section class="relative py-16 sm:py-20 bg-slate-950 text-white overflow-hidden border-b border-slate-900">
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/70 via-slate-950 to-slate-900 opacity-90 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1 rounded-full mb-3">
                Official Communication Channels
            </span>
            <h1 class="text-4xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Get in Touch with iCEEDS
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Have questions about certifications, institutional affiliation, or skill development programs? Our team is ready to help.
            </p>
        </div>
    </section>

    <!-- MAIN CONTACT SPLIT SECTION -->
    <section class="py-16 sm:py-24 bg-portal-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Success Alert Banner -->
            @if(session('success'))
                <div class="mb-10 max-w-4xl mx-auto bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-2xl p-5 shadow-sm flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-base font-heading text-emerald-950">Inquiry Submitted Successfully</h4>
                        <p class="text-xs sm:text-sm text-emerald-800 mt-1 leading-relaxed">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- LEFT COLUMN: OFFICE LOCATIONS & DIRECT CHANNELS -->
                <div class="lg:col-span-5 space-y-8">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Official Reach</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">
                            Administrative Locations
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                            iCEEDS maintains active administrative and operational presence across South India to serve students, trainers, and educational partners.
                        </p>
                    </div>

                    <!-- Location Cards -->
                    <div class="space-y-4">
                        <!-- Corporate Office -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm hover:shadow-md transition">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-blue-700 font-mono">Corporate Office</span>
                                    <h3 class="text-base font-bold text-slate-900 font-heading">Greater Chennai, Tamil Nadu</h3>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                        iCEEDS, Plot No:90, 3rd Cross Street, Phase-2/Thirumalai Nagar Annexe, Perungudi, Greater Chennai, Tamil Nadu State — Pin: <strong>600096</strong>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Central Administrative Office -->
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm hover:shadow-md transition">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 font-mono">Central Administrative Office</span>
                                    <h3 class="text-base font-bold text-slate-900 font-heading">Malappuram, Kerala</h3>
                                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                                        Suit No: 15/413-15, Athanikkal, Calicut-Palaghat Highway, Valluvambram (PO), Malappuram, Kerala State — Pin: <strong>673642</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Direct Contact Channels & WhatsApp -->
                    <div class="bg-slate-950 text-white rounded-3xl p-6 sm:p-7 shadow-lg space-y-4">
                        <h3 class="text-base font-bold font-heading text-white">Direct Registry Inquiries</h3>
                        <div class="space-y-3 text-xs">
                            <a href="mailto:lettertoiceeds@gmail.com" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition">
                                <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                <span class="font-mono text-slate-200">lettertoiceeds@gmail.com</span>
                            </a>
                            <div class="space-y-2">
                                <a href="tel:+917510200095" class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 transition">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                        <span class="font-mono text-[11px] text-slate-200">+91 7510200095</span>
                                    </div>
                                    <span class="text-[10px] text-blue-300 font-semibold">Admin / WhatsApp</span>
                                </a>
                                <a href="tel:+917510200090" class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 transition">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                        <span class="font-mono text-[11px] text-slate-200">+91 7510200090</span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 font-medium">Technical Support</span>
                                </a>
                                <a href="tel:+919061202443" class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 transition">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                        <span class="font-mono text-[11px] text-slate-200">+91 9061202443</span>
                                    </div>
                                    <span class="text-[10px] text-amber-300 font-medium">Grievance Redressal</span>
                                </a>
                            </div>
                        </div>

                        <a href="https://wa.me/917510200095" target="_blank" rel="noopener noreferrer" class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 font-bold text-xs tracking-wide transition text-white">
                            <span>Open WhatsApp Conversation &rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- RIGHT COLUMN: MODERN CONTACT FORM -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-3xl p-7 sm:p-10 border border-slate-200/90 shadow-xl shadow-slate-200/50">
                        <div class="mb-8">
                            <span class="text-xs font-bold uppercase tracking-wider text-blue-700 bg-blue-50 border border-blue-200/80 px-3 py-1 rounded-full">Electronic Desk</span>
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950 font-heading tracking-tight mt-3">
                                Send an Official Inquiry
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                                Complete the form below. Inquiries are routed directly to the appropriate academic or administrative registrar.
                            </p>
                        </div>

                        <form action="{{ route('contact.submit') }}" method="POST" id="contactForm" class="space-y-5">
                            @csrf

                            <!-- Full Name -->
                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name') }}"
                                    placeholder="Enter your full name" 
                                    required
                                    class="w-full px-4 py-3 bg-slate-50 border @error('name') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm font-medium text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                                >
                                @error('name')
                                    <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email and Phone Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        id="email" 
                                        value="{{ old('email') }}"
                                        placeholder="name@example.com" 
                                        required
                                        class="w-full px-4 py-3 bg-slate-50 border @error('email') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm font-medium text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                                    >
                                    @error('email')
                                        <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                        Phone Number (Optional)
                                    </label>
                                    <input 
                                        type="text" 
                                        name="phone" 
                                        id="phone" 
                                        value="{{ old('phone') }}"
                                        placeholder="+91 00000 00000" 
                                        class="w-full px-4 py-3 bg-slate-50 border @error('phone') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm font-medium text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                                    >
                                    @error('phone')
                                        <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Inquiry Type / Subject Dropdown -->
                            <div>
                                <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Inquiry Classification <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    name="subject" 
                                    id="subject" 
                                    required
                                    class="w-full px-4 py-3 bg-slate-50 border @error('subject') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                                >
                                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select an inquiry topic...</option>
                                    <option value="Certification Inquiries" {{ old('subject') == 'Certification Inquiries' ? 'selected' : '' }}>Certification Inquiries</option>
                                    <option value="Course Enrollment" {{ old('subject') == 'Course Enrollment' ? 'selected' : '' }}>Course Enrollment (Short, Mid, Long-Term)</option>
                                    <option value="Institutional Affiliation" {{ old('subject') == 'Institutional Affiliation' ? 'selected' : '' }}>Institutional Affiliation & Training Center Partnership</option>
                                    <option value="Verification Support" {{ old('subject') == 'Verification Support' ? 'selected' : '' }}>Certificate Verification Support</option>
                                    <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Academic Inquiry</option>
                                </select>
                                @error('subject')
                                    <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Message Details <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="message" 
                                    id="message" 
                                    rows="5" 
                                    placeholder="Please describe your query or institutional request in detail..." 
                                    required
                                    class="w-full px-4 py-3 bg-slate-50 border @error('message') border-red-500 @else border-slate-200 @enderror rounded-xl text-sm font-medium text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition resize-none"
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button 
                                    type="submit" 
                                    id="submitBtn"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 bg-blue-700 hover:bg-blue-800 active:bg-blue-900 text-white font-bold text-sm rounded-xl shadow-lg shadow-blue-700/25 transition cursor-pointer"
                                >
                                    <span>Submit Inquiry to Registry</span>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                                <p class="text-[11px] text-slate-400 mt-2">
                                    Protected by SSL. Your contact information is used strictly for academic correspondence.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
