<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dikerjakan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'dikerjakan';
    protected $fillable = [
        'nama_paket_perkerjaan',
        'pejabat_pembuat_komitmen',
        'harga_kontrak',
        'lokasi',
        'tahun',
    ];

}
