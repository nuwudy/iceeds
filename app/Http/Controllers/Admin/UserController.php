<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of admin & staff users.
     */
    public function index(Request $request): View
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized. Only administrators can manage team users.');
        }

        $search = trim((string) $request->query('q', ''));
        $roleFilter = trim((string) $request->query('role', ''));
        $statusFilter = trim((string) $request->query('status', ''));

        $query = User::query()->latest('id');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (!empty($roleFilter)) {
            $query->where('role', $roleFilter);
        }

        if ($statusFilter === 'approved') {
            $query->where('is_approved', true);
        } elseif ($statusFilter === 'pending') {
            $query->where('is_approved', false);
        }

        $users = $query->paginate(20)->withQueryString();

        return view('admin.users.index', [
            'users' => $users,
            'search' => $search,
            'roleFilter' => $roleFilter,
            'statusFilter' => $statusFilter,
            'totalUsers' => User::count(),
            'approvedCount' => User::where('is_approved', true)->count(),
            'pendingCount' => User::where('is_approved', false)->count(),
        ]);
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        // Only existing administrators can create other users
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized. Only administrators can create users.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:admin,staff'],
            'is_approved' => ['nullable', 'boolean'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => strtolower($validated['email']),
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_approved' => $request->boolean('is_approved', true),
            'created_by' => Auth::id(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "User {$user->name} created successfully.",
                'user' => $user,
            ]);
        }

        return redirect()->route('admin.users.index')->with(
            'success',
            "User {$user->name} ({$user->email}) added successfully as {$user->role}."
        );
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user): RedirectResponse|JsonResponse
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized. Only administrators can modify user accounts.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:admin,staff'],
            'password' => ['nullable', 'string', 'min:8'],
            'is_approved' => ['nullable', 'boolean'],
        ]);

        $userData = [
            'name' => $validated['name'],
            'email' => strtolower($validated['email']),
            'role' => $validated['role'],
            'is_approved' => $request->boolean('is_approved', true),
        ];

        if (!empty($validated['password'])) {
            $userData['password'] = Hash::make($validated['password']);
        }

        // Prevent admin from removing their own admin role or disabling their own account
        if ($user->id === Auth::id()) {
            $userData['role'] = 'admin';
            $userData['is_approved'] = true;
        }

        $user->update($userData);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "User {$user->name} updated successfully.",
                'user' => $user,
            ]);
        }

        return redirect()->route('admin.users.index')->with(
            'success',
            "User {$user->name} updated successfully."
        );
    }

    /**
     * Toggle user approval status.
     */
    public function toggleApproval(Request $request, User $user): RedirectResponse|JsonResponse
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized.');
        }

        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot change the approval status of your own account.');
        }

        $user->is_approved = !$user->is_approved;
        $user->save();

        $statusText = $user->is_approved ? 'approved' : 'suspended/pending';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'is_approved' => $user->is_approved,
                'message' => "User {$user->name} is now {$statusText}.",
            ]);
        }

        return back()->with('success', "User {$user->name} is now {$statusText}.");
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(Request $request, User $user): RedirectResponse|JsonResponse
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized. Only administrators can delete users.');
        }

        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own administrative account.');
        }

        $name = $user->name;
        $user->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "User {$name} deleted successfully.",
            ]);
        }

        return redirect()->route('admin.users.index')->with(
            'success',
            "User account for {$name} deleted successfully."
        );
    }
}
