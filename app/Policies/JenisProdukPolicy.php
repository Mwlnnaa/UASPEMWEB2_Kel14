<?php

namespace App\Policies;

use App\Models\JenisProduk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JenisProdukPolicy
{
    // Super Admin selalu diizinkan
    public function before(User $user, string $ability): bool|null
    {
        if ($user->role === 'super_admin') {
            return true;
        }
        return null; // Lanjutkan ke policy method lainnya jika bukan super_admin
    }

    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function view(User $user, JenisProduk $jenisProduk): bool
    {
        return $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, JenisProduk $jenisProduk): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, JenisProduk $jenisProduk): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, JenisProduk $jenisProduk): bool
    {
        return false; // Tidak ada soft delete, jadi default false
    }

    public function forceDelete(User $user, JenisProduk $jenisProduk): bool
    {
        return false; // Tidak ada soft delete, jadi default false
    }
}