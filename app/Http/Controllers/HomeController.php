<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\User;
use App\Models\Portofolio;
use App\Models\ActivityLog;
use App\Models\Dikerjakan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
             // Mengambil entitas Download pertama
             $download = Download::first();
             // Mengambil jumlah total pengguna
             $userCount = User::count();
     
             $portofolio = Portofolio::count();

             $dikerjakan = Dikerjakan::count();
     
             // Mengambil aktivitas user terbaru
             $activityLogs = ActivityLog::with('user')->latest()->get();
     
             $today = \Carbon\Carbon::today();
             $weekStart = \Carbon\Carbon::now()->startOfWeek();
             $monthStart = \Carbon\Carbon::now()->startOfMonth();
         
             // Mengambil aktivitas berdasarkan periode
             $activitiesToday = ActivityLog::whereDate('created_at', $today)->get();
             $activitiesThisWeek = ActivityLog::whereBetween('created_at', [$weekStart, $today])->get();
             $activitiesThisMonth = ActivityLog::whereBetween('created_at', [$monthStart, $today])->get();
     
         
             // Mengirimkan jumlah unduhan dan jumlah pengguna ke view admin
             return view('admin.index', [
                 'count' => $download ? $download->count : 0,
                 'userCount' => $userCount,
                 'portofolio' => $portofolio,
                 'dikerjakanCount' => $dikerjakan,
                 'activityLogs' => $activityLogs,
                 'activitiesToday' => $activitiesToday,
                 'activitiesThisWeek' => $activitiesThisWeek,
                 'activitiesThisMonth' => $activitiesThisMonth,
             ]);
    }

    public function adminManagement()
    {
        // Periksa apakah pengguna yang sedang login adalah Super Admin
        if (Auth::check() && Auth::user()->is_super_admin) {
            // Logika untuk menampilkan halaman manajemen pengguna
            $users = User::all(); // Ambil semua pengguna untuk ditampilkan
            return view('admin.adminManagement', ['users' => $users]);
        }

        // Jika bukan Super Admin, alihkan ke halaman utama atau halaman dengan pesan error
        return redirect('/admin')->with('error', 'Akses halaman tidak diizinkan.');
    }

    public function editPassword(Request $request, $userId)
{
    // Hanya Super Admin yang dapat mengedit password
    if (Auth::user()->is_super_admin === false) {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
    }

    // Temukan pengguna berdasarkan ID
    $user = User::find($userId);

    if (!$user) {
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    }

    // Validasi input
    $request->validate([
        'new_password' => 'required|min:8',
        'confirm_password' => 'required|same:new_password',
    ]);

    // Perbarui password pengguna
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Password ' . $user->name . ' berhasil diperbarui.');

}

    public function deleteUser(Request $request, $userId)
    {
        $userToDelete = User::find($userId);
    
        if (!$userToDelete) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
    
        // Periksa apakah pengguna yang sedang login adalah Super Admin
        if (Auth::user()->is_super_admin === false) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }
    
        // Periksa apakah pengguna yang akan dihapus adalah Super Admin
        if ($userToDelete->is_super_admin) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus Super Admin.');
        }
    
        // Hapus pengguna
        $userToDelete->delete();
    
        return redirect()->back()->with('success', 'Anda Berhasil Menghapus Akun User');
    }    

    public function makeSuperAdmin(Request $request, $userId)
    {
        // Validasi input
        $request->validate([
            'userId' => 'required|integer|exists:users,id',
        ]);
    
        // Cari pengguna berdasarkan ID
        $user = User::find($userId);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
    
        // Pastikan hanya ada satu Super Admin
        $existingSuperAdmin = User::where('is_super_admin', true)->first();
        if ($existingSuperAdmin && $existingSuperAdmin->id !== $user->id) {
            return redirect()->back()->with('error', 'Hanya bisa ada satu Super Admin.');
        }
    
        // Set pengguna menjadi Super Admin
        $user->is_super_admin = true;
        $user->save();
    
        return redirect()->back()->with('success', 'Pengguna berhasil diubah menjadi Super Admin.');
    }
    
    
    public function revokeSuperAdmin(Request $request, $userId)
{
    $user = User::find($userId);

    if (!$user) {
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    }

    // Cek jika ada Super Admin lain yang tersedia
    $existingSuperAdminCount = User::where('is_super_admin', true)->count();
    if ($existingSuperAdminCount <= 1 && $existingSuperAdminCount > 0) {
        return redirect()->back()->with('error', 'Tidak bisa mencabut status Super Admin karena tidak ada Super Admin lain.');
    }

    $user->is_super_admin = false;
    $user->save();

    return redirect()->back()->with('success', 'Status Super Admin pengguna berhasil dicabut.');
}

    

    public function profile()
    {
        return view('admin.profile');
    }
    public function password()
    {
        return view('admin.gantiPass');
    }
}
