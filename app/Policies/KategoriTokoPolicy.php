<?php

namespace App\Policies;

use App\Models\KategoriToko;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KategoriTokoPolicy
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

    public function view(User $user, KategoriToko $kategoriToko): bool
    {
        return $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, KategoriToko $kategoriToko): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, KategoriToko $kategoriToko): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, KategoriToko $kategoriToko): bool
    {
        return false;
    }

    public function forceDelete(User $user, KategoriToko $kategoriToko): bool
    {
        return false;
    }
}