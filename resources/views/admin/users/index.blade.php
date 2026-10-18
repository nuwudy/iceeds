@extends('admin.layouts.app')

@section('title', 'User & Staff Management')

@section('content')

    <!-- Top Action & Search Bar -->
    <div class="mb-8 space-y-4">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-2xl font-black text-white font-heading tracking-tight">User & Staff Management</h1>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-purple-500/20 text-purple-300 border border-purple-500/30">
                        {{ $totalUsers }} Total
                    </span>
                    @if($pendingCount > 0)
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30 animate-pulse">
                            {{ $pendingCount }} Pending Approval
                        </span>
                    @endif
                </div>
                <p class="text-xs text-slate-400 mt-1">
                    Manage system administrators and authorized staff who have permission to register certificates and manage institutional media.
                </p>
            </div>

            <!-- New User Trigger Button -->
            <button 
                type="button" 
                onclick="openAddUserModal()" 
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-bold text-xs tracking-wide shadow-lg shadow-purple-600/30 transition cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <span>Add User / Staff</span>
            </button>
        </div>

        <!-- Filter & Search Controls -->
        <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 bg-slate-900/90 p-4 rounded-2xl border border-slate-800 shadow-md">
            <div class="md:col-span-6 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <input 
                    type="text" 
                    name="q" 
                    value="{{ $search }}" 
                    placeholder="Search user name or email..." 
                    class="w-full pl-10 pr-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white placeholder-slate-500 text-xs font-medium focus:outline-none focus:border-purple-500 transition"
                >
            </div>

            <div class="md:col-span-2">
                <select 
                    name="role" 
                    class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500 transition"
                >
                    <option value="">All Roles</option>
                    <option value="admin" {{ $roleFilter === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="staff" {{ $roleFilter === 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <select 
                    name="status" 
                    class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500 transition"
                >
                    <option value="">All Statuses</option>
                    <option value="approved" {{ $statusFilter === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="pending" {{ $statusFilter === 'pending' ? 'selected' : '' }}>Pending Approval</option>
                </select>
            </div>

            <div class="md:col-span-2 flex items-center gap-2">
                <button type="submit" class="w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs transition cursor-pointer">
                    Filter
                </button>
                @if($search || $roleFilter || $statusFilter)
                    <a href="{{ route('admin.users.index') }}" class="p-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white transition" title="Clear Filters">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <div class="bg-slate-900/90 rounded-3xl border border-slate-800 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-950/60 border-b border-slate-800 text-[11px] uppercase tracking-wider text-slate-400">
                        <th class="py-4 px-6 font-semibold">User / Staff Member</th>
                        <th class="py-4 px-6 font-semibold">Role</th>
                        <th class="py-4 px-6 font-semibold">Approval Status</th>
                        <th class="py-4 px-6 font-semibold">Registered On</th>
                        <th class="py-4 px-6 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-slate-800 text-white font-heading font-black text-xs flex items-center justify-center shrink-0 border border-slate-700">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <span class="font-bold text-white block">{{ $user->name }}</span>
                                        <span class="text-[11px] font-mono text-slate-400 block">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                @if($user->isAdmin())
                                    <span class="px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-300 border border-emerald-500/20 font-bold uppercase tracking-wider text-[10px] font-mono">
                                        Administrator
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-lg bg-blue-500/10 text-blue-300 border border-blue-500/20 font-bold uppercase tracking-wider text-[10px] font-mono">
                                        Staff / Validator
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2">
                                    @if($user->is_approved)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-bold text-[11px]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                            Approved
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-amber-500/10 text-amber-400 border border-amber-500/20 font-bold text-[11px]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                            Pending Approval
                                        </span>
                                    @endif

                                    @if($user->id !== Auth::id())
                                        <form action="{{ route('admin.users.toggle-approval', $user) }}" method="POST" class="inline">
                                            @csrf
                                            <button 
                                                type="submit" 
                                                class="px-2 py-0.5 rounded text-[10px] font-bold border transition cursor-pointer {{ $user->is_approved ? 'bg-slate-800 text-slate-400 hover:text-red-400 border-slate-700' : 'bg-emerald-600 hover:bg-emerald-500 text-white border-emerald-500' }}"
                                            >
                                                {{ $user->is_approved ? 'Suspend' : 'Approve' }}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6 text-slate-400 font-mono text-[11px]">
                                {{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}
                            </td>
                            <td class="py-4 px-6 text-right shrink-0">
                                <div class="inline-flex items-center gap-1.5">
                                    <button 
                                        type="button" 
                                        onclick="openEditUserModal(@js($user))" 
                                        class="p-2 rounded-lg bg-slate-800 text-amber-400 hover:text-white hover:bg-amber-600 transition cursor-pointer" 
                                        title="Edit User"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>

                                    @if($user->id !== Auth::id())
                                        <button 
                                            type="button" 
                                            onclick="openDeleteUserModal(@js($user->id), @js($user->name))" 
                                            class="p-2 rounded-lg bg-slate-800 text-red-400 hover:text-white hover:bg-red-600 transition cursor-pointer" 
                                            title="Delete User"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-500">
                                No users matched your search criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    <!-- ADD USER MODAL -->
    <div id="addUserModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 sm:p-8 max-w-md w-full shadow-2xl relative">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-bold text-white font-heading">Add User / Staff</h3>
                <button type="button" onclick="closeAddUserModal()" class="text-slate-400 hover:text-white text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Full Name *</label>
                    <input type="text" name="name" placeholder="e.g. John Doe" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Email Address *</label>
                    <input type="email" name="email" placeholder="staff@iceeds.com" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Password (Min. 8 characters) *</label>
                    <input type="password" name="password" placeholder="••••••••" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-mono focus:outline-none focus:border-purple-500" required>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Role *</label>
                        <select name="role" class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500" required>
                            <option value="staff">Staff / Validator</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Approval *</label>
                        <select name="is_approved" class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500">
                            <option value="1">Approved (Active)</option>
                            <option value="0">Pending Approval</option>
                        </select>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-800">
                    <button type="button" onclick="closeAddUserModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-bold text-xs shadow-lg shadow-purple-600/30 transition cursor-pointer">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT USER MODAL -->
    <div id="editUserModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 sm:p-8 max-w-md w-full shadow-2xl relative">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-bold text-white font-heading">Edit User Account</h3>
                <button type="button" onclick="closeEditUserModal()" class="text-slate-400 hover:text-white text-xl font-bold">&times;</button>
            </div>

            <form id="editUserForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Full Name *</label>
                    <input type="text" id="edit_user_name" name="name" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Email Address *</label>
                    <input type="email" id="edit_user_email" name="email" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">New Password (Leave empty to keep current)</label>
                    <input type="password" name="password" placeholder="••••••••" class="w-full px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-mono focus:outline-none focus:border-purple-500">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Role *</label>
                        <select id="edit_user_role" name="role" class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500" required>
                            <option value="staff">Staff / Validator</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Approval *</label>
                        <select id="edit_user_approved" name="is_approved" class="w-full px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-xs font-medium focus:outline-none focus:border-purple-500">
                            <option value="1">Approved</option>
                            <option value="0">Pending / Suspended</option>
                        </select>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-800">
                    <button type="button" onclick="closeEditUserModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-500 text-white font-bold text-xs shadow-lg transition cursor-pointer">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE USER MODAL -->
    <div id="deleteUserModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 sm:p-7 max-w-sm w-full shadow-2xl text-center space-y-4">
            <div class="w-12 h-12 rounded-2xl bg-red-500/10 text-red-400 border border-red-500/20 mx-auto flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            </div>
            <div>
                <h4 class="text-base font-bold text-white font-heading">Delete User Account?</h4>
                <p class="text-xs text-slate-400 mt-1">
                    Are you sure you want to permanently delete the account for <strong id="delete_user_name" class="text-white"></strong>?
                </p>
            </div>
            <form id="deleteUserForm" method="POST" class="flex items-center justify-center gap-3 pt-2">
                @csrf
                @method('DELETE')
                <button type="button" onclick="closeDeleteUserModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-400 hover:text-white transition">
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
    function openAddUserModal() {
        document.getElementById('addUserModal').classList.remove('hidden');
    }

    function closeAddUserModal() {
        document.getElementById('addUserModal').classList.add('hidden');
    }

    function openEditUserModal(user) {
        document.getElementById('editUserForm').action = '/admin/users/' + user.id;
        document.getElementById('edit_user_name').value = user.name || '';
        document.getElementById('edit_user_email').value = user.email || '';
        document.getElementById('edit_user_role').value = user.role || 'staff';
        document.getElementById('edit_user_approved').value = user.is_approved ? '1' : '0';
        document.getElementById('editUserModal').classList.remove('hidden');
    }

    function closeEditUserModal() {
        document.getElementById('editUserModal').classList.add('hidden');
    }

    function openDeleteUserModal(id, name) {
        document.getElementById('deleteUserForm').action = '/admin/users/' + id;
        document.getElementById('delete_user_name').textContent = name;
        document.getElementById('deleteUserModal').classList.remove('hidden');
    }

    function closeDeleteUserModal() {
        document.getElementById('deleteUserModal').classList.add('hidden');
    }
</script>
@endpush
