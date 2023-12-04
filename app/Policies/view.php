<?php

namespace App\Policies;

use App\Models\User;

class view
{
    /**
     * Create a new policy instance.
     */
    public function adminDosen(User $user){
        return $user->hasAnyRole(['Admin', 'Dosen']);
    }

    public function adminMahasiswa(User $user) {
        return $user->hasAnyRole(['Admin', 'Mahasiswa']);
    }
}
