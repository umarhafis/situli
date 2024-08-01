<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\User;
use App\Models\Portofolio;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Menangani logika untuk mengunduh file dan meningkatkan jumlah unduhan.
     */
    public function download()
    {
        // Mengambil atau membuat entitas Download pertama
        $download = Download::firstOrCreate([]);
        // Meningkatkan jumlah unduhan
        $download->increment('count');
        $download->save();

        // Logika untuk mengunduh file
        $filePath = public_path('portfolio/PortofolioTujuhEnamSarana.xlsx');
        return response()->download($filePath);
    }

    /**
     * Mendapatkan jumlah unduhan dan menampilkannya di view admin.
     */

}
