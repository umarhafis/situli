<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'email',
        'position',
        'phone_number',
        'password',
        'foto_profile',
        'is_super_admin', // Pastikan kolom ini ada
    ];

    // Atribut yang harus disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atribut yang harus di-cast
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_super_admin' => 'boolean', // Pastikan ini adalah boolean
    ];

    // Metode untuk memeriksa apakah pengguna adalah Super Admin
    public function isSuperAdmin()
    {
        return $this->is_super_admin;
    }
}