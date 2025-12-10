<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserManagementController extends BaseApiController
{
    // GET /api/admin/users
    public function index(Request $request)
    {
        $query = User::query()->select('id', 'name', 'email', 'role', 'status', 'created_at');

        if ($search = $request->get('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($role = $request->get('role')) {
            $query->where('role', $role);
        }

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(15);

        return $this->success($users);
    }

    // PATCH /api/admin/users/{user}/role
    public function updateRole(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => ['required', Rule::in(['user', 'expert', 'admin'])],
        ]);

        // Không cho tự hạ quyền chính mình (cho chắc)
        if ($request->user()->id === $user->id && $data['role'] !== 'admin') {
            return $this->error('You cannot change your own role.', 422);
        }

        // Không cho xóa admin cuối cùng
        if ($user->role === 'admin' && $data['role'] !== 'admin') {
            $adminCount = User::where('role', 'admin')->count();
            if ($adminCount <= 1) {
                return $this->error('At least one admin must remain in the system.', 422);
            }
        }

        $user->role = $data['role'];
        $user->save();

        return $this->success($user, 'User role updated.');
    }

    // PATCH /api/admin/users/{user}/status
    public function updateStatus(Request $request, User $user)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['active', 'blocked'])],
        ]);

        // Không cho tự block chính mình
        if ($request->user()->id === $user->id && $data['status'] === 'blocked') {
            return $this->error('You cannot block yourself.', 422);
        }

        $user->status = $data['status'];
        $user->save();

        return $this->success($user, 'User status updated.');
    }
}
