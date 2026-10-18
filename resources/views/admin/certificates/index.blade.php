@extends('admin.layouts.app')

@section('title', 'Certificate Registry')

@section('content')

    <!-- Top Action & Search Bar -->
    <div class="mb-8 space-y-4">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-2xl font-black text-white font-heading tracking-tight">Certificate Registry</h1>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-blue-500/20 text-blue-300 border border-blue-500/30">
                        {{ number_format($totalCount) }} Total
                    </span>
                </div>
                <p class="text-xs text-slate-400 mt-1">
                    Manage, register, and update verifiable qualification credentials on the official central database.
                </p>
            </div>

            <!-- New Certificate Trigger Button -->
            <button 
                type="button" 
                onclick="openAddModal()" 
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs tracking-wide shadow-lg shadow-blue-600/30 transition cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Register New Certificate</span>
            </button>
        </div>

        <!-- Filter & Search Controls -->
        <form method="GET" action="{{ route('admin.certificates.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 bg-slate-900/90 p-4 rounded-2xl border border-slate-800 shadow-md">
            <!-- Search Input -->
            <div class="md:col-span-7 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <input 
                    type="text" 
                    name="q" 
                    value="{{ $search }}" 
                    placeholder="Search candidate name, serial code (e.g. SYNS/MTTC/MLP26/770), course..." 
                    class="w-full pl-10 pr-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 text-xs font-medium focus:outline-none focus:border-blue-500 transition"
                >
            </div>

            <!-- Course Filter Dropdown -->
            <div class="md:col-span-3">
                <select 
                    name="course" 
                    class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-blue-500 transition"
                >
                    <option value="">All Courses & Programs</option>
                    @foreach($courses as $c)
                        <option value="{{ $c }}" {{ $selectedCourse === $c ? 'selected' : '' }}>
                            {{ $c }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Buttons -->
            <div class="md:col-span-2 flex items-center gap-2">
                <button type="submit" class="w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs transition cursor-pointer">
                    Filter
                </button>
                @if($search || $selectedCourse)
                    <a href="{{ route('admin.certificates.index') }}" class="p-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white transition" title="Clear Filters">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Certificates Data Table -->
    <div class="bg-slate-900/90 rounded-3xl border border-slate-800 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-950/60 border-b border-slate-800 text-[11px] uppercase tracking-wider text-slate-400">
                        <th class="py-4 px-6 font-semibold">Serial Code</th>
                        <th class="py-4 px-6 font-semibold">Student Name</th>
                        <th class="py-4 px-6 font-semibold">Course / Program</th>
                        <th class="py-4 px-6 font-semibold">Issue Date</th>
                        <th class="py-4 px-6 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($certificates as $cert)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="py-4 px-6 font-mono">
                                <span class="px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-bold inline-block">
                                    {{ $cert->certificate_code }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-bold text-white block">{{ $cert->student_name }}</span>
                                @if($cert->first_name && $cert->last_name)
                                    <span class="text-[10px] text-slate-400 font-medium">
                                        {{ $cert->first_name }} &bull; {{ $cert->last_name }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-slate-300 max-w-xs leading-snug">
                                {{ $cert->course }}
                            </td>
                            <td class="py-4 px-6 font-mono text-slate-400">
                                {{ $cert->issue_date ? $cert->issue_date->format('M d, Y') : 'N/A' }}
                            </td>
                            <td class="py-4 px-6 text-right shrink-0">
                                <div class="inline-flex items-center gap-1.5">
                                    <!-- Public Verify Link -->
                                    <a 
                                        href="{{ route('verify', ['code' => $cert->certificate_code]) }}" 
                                        target="_blank" 
                                        class="p-2 rounded-lg bg-slate-800 text-blue-400 hover:text-white hover:bg-blue-600 transition" 
                                        title="Verify Certificate on Public Portal"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>

                                    <!-- Edit Trigger Button -->
                                    <button 
                                        type="button" 
                                        onclick="openEditModal(@js($cert))" 
                                        class="p-2 rounded-lg bg-slate-800 text-amber-400 hover:text-white hover:bg-amber-600 transition cursor-pointer" 
                                        title="Edit Certificate"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>

                                    <!-- Delete Trigger Button -->
                                    <button 
                                        type="button" 
                                        onclick="openDeleteModal(@js($cert->id), @js($cert->certificate_code), @js($cert->student_name))" 
                                        class="p-2 rounded-lg bg-slate-800 text-red-400 hover:text-white hover:bg-red-600 transition cursor-pointer" 
                                        title="Delete Certificate"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-500">
                                No certificate records matched your query.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($certificates->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                {{ $certificates->links() }}
            </div>
        @endif
    </div>

    <!-- ADD CERTIFICATE MODAL -->
    <div id="addModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 sm:p-8 max-w-lg w-full shadow-2xl relative">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-bold text-white font-heading">Register New Certificate</h3>
                <button type="button" onclick="closeAddModal()" class="text-slate-400 hover:text-white text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('admin.certificates.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Student Full Name *</label>
                    <input type="text" name="student_name" placeholder="e.g. HALEEMATH SAHADIYA" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-bold uppercase focus:outline-none focus:border-blue-500" required>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">First Name (Optional)</label>
                        <input type="text" name="first_name" placeholder="e.g. HALEEMATH" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs uppercase focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Last Name / Initials</label>
                        <input type="text" name="last_name" placeholder="e.g. AJ" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs uppercase focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Course / Program *</label>
                    <input type="text" name="course" list="courseSuggestions" placeholder="e.g. ICEEDS DIPLOMA IN MONTESSORI TEACHERS TRAINING COURSE" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs uppercase font-medium focus:outline-none focus:border-blue-500" required>
                    <datalist id="courseSuggestions">
                        @foreach($courses as $c)
                            <option value="{{ $c }}"></option>
                        @endforeach
                    </datalist>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Certificate Serial Code *</label>
                        <input type="text" name="certificate_code" placeholder="e.g. SYNS/MTTC/MLP26/770" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white font-mono text-xs font-bold uppercase focus:outline-none focus:border-emerald-500" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Date of Issuance *</label>
                        <input type="date" name="issue_date" value="{{ date('Y-m-d') }}" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white font-mono text-xs focus:outline-none focus:border-blue-500" required>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-800">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs shadow-lg shadow-blue-600/30 transition cursor-pointer">
                        Save to Database
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT CERTIFICATE MODAL -->
    <div id="editModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 sm:p-8 max-w-lg w-full shadow-2xl relative">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-bold text-white font-heading">Edit Certificate</h3>
                <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-white text-xl font-bold">&times;</button>
            </div>

            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Student Full Name *</label>
                    <input type="text" id="edit_student_name" name="student_name" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-bold uppercase focus:outline-none focus:border-blue-500" required>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">First Name</label>
                        <input type="text" id="edit_first_name" name="first_name" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs uppercase focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Last Name</label>
                        <input type="text" id="edit_last_name" name="last_name" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs uppercase focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Course / Program *</label>
                    <input type="text" id="edit_course" name="course" list="courseSuggestions" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs uppercase font-medium focus:outline-none focus:border-blue-500" required>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Certificate Serial Code *</label>
                        <input type="text" id="edit_certificate_code" name="certificate_code" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white font-mono text-xs font-bold uppercase focus:outline-none focus:border-emerald-500" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Date of Issuance *</label>
                        <input type="date" id="edit_issue_date" name="issue_date" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white font-mono text-xs focus:outline-none focus:border-blue-500" required>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-800">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-500 text-white font-bold text-xs shadow-lg transition cursor-pointer">
                        Update Certificate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE CONFIRMATION MODAL -->
    <div id="deleteModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 sm:p-7 max-w-sm w-full shadow-2xl text-center space-y-4">
            <div class="w-12 h-12 rounded-2xl bg-red-500/10 text-red-400 border border-red-500/20 mx-auto flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            </div>
            <div>
                <h4 class="text-base font-bold text-white font-heading">Delete Certificate Record?</h4>
                <p class="text-xs text-slate-400 mt-1">
                    Are you sure you want to delete <strong id="delete_code" class="text-emerald-400 font-mono"></strong> for <span id="delete_name" class="text-white"></span>? This action is permanent.
                </p>
            </div>
            <form id="deleteForm" method="POST" class="flex items-center justify-center gap-3 pt-2">
                @csrf
                @method('DELETE')
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs shadow-lg transition cursor-pointer">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    function openEditModal(cert) {
        document.getElementById('editForm').action = '/admin/certificates/' + cert.id;
        document.getElementById('edit_student_name').value = cert.student_name || '';
        document.getElementById('edit_first_name').value = cert.first_name || '';
        document.getElementById('edit_last_name').value = cert.last_name || '';
        document.getElementById('edit_course').value = cert.course || '';
        document.getElementById('edit_certificate_code').value = cert.certificate_code || '';
        document.getElementById('edit_issue_date').value = cert.issue_date ? cert.issue_date.substring(0, 10) : '';
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(id, code, name) {
        document.getElementById('deleteForm').action = '/admin/certificates/' + id;
        document.getElementById('delete_code').textContent = code;
        document.getElementById('delete_name').textContent = name;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Auto-open modal if URL query has action=new
    if (new URLSearchParams(window.location.search).get('action') === 'new') {
        openAddModal();
    }
</script>
@endpush
