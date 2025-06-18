<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    // Super Admin selalu diizinkan untuk mengelola user, kecuali dirinya sendiri
    public function before(User $user, string $ability): bool|null
    {
        if ($user->role === 'super_admin') {
            return true;
        }
        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->role === 'super_admin';
    }

    public function view(User $user, User $model): bool
    {
        return $user->role === 'super_admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'super_admin';
    }

    public function update(User $user, User $model): bool
    {
        // Super Admin bisa update user lain
        // Jika ingin Super Admin tidak bisa mengubah dirinya sendiri, tambahkan:
        // return $user->role === 'super_admin' && $user->id !== $model->id;
        return $user->role === 'super_admin';
    }

    public function delete(User $user, User $model): bool
    {
        // Super Admin bisa delete user lain, tapi tidak bisa menghapus dirinya sendiri
        return $user->role === 'super_admin' && $user->id !== $model->id;
    }

    public function restore(User $user, User $model): bool
    {
        return false;
    }

    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}