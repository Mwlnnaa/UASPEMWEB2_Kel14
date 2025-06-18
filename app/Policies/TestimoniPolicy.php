<?php

namespace App\Policies;

use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TestimoniPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->role === 'super_admin') {
            return true;
        }
        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function view(User $user, Testimoni $testimoni): bool
    {
        return $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Testimoni $testimoni): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Testimoni $testimoni): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Testimoni $testimoni): bool
    {
        return false;
    }

    public function forceDelete(User $user, Testimoni $testimoni): bool
    {
        return false;
    }
}