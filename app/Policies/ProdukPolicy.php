<?php

namespace App\Policies;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProdukPolicy
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

    public function view(User $user, Produk $produk): bool
    {
        return $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Produk $produk): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Produk $produk): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Produk $produk): bool
    {
        return false;
    }

    public function forceDelete(User $user, Produk $produk): bool
    {
        return false;
    }
}