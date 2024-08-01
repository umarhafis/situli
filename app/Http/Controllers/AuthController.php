<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // Menampilkan halaman pendaftaran
    public function register()
    {
        return view('auth.register');
    }

    // Menyimpan data pendaftaran
    public function registerStore(Request $request)
    {
        // Validasi input pendaftaran
        $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_super_admin' => 'nullable|boolean'
        ]);

        // Membuat instance User baru
        $user = new User;
        $user->name = trim($request->name);
        $user->phone_number = trim($request->phone_number);
        $user->position = trim($request->position);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password); // Hashing password
        $user->remember_token = Str::random(40);
        $user->is_super_admin = $request->has('is_super_admin') ? true : false;

        // Menyimpan foto profil jika ada
        if ($request->hasFile('foto_profile')) {
            try {
                $file = $request->file('foto_profile');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/foto_profile', $filename);
                $user->foto_profile = Storage::url($path);

                // Logging informasi file
                Log::info('File Info: ', [
                    'MimeType' => $file->getMimeType(),
                    'Extension' => $file->getClientOriginalExtension(),
                    'Size' => $file->getSize(),
                ]);
            } catch (\Exception $e) {
                // Logging error jika gagal mengupload file
                Log::error('File upload error: ', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal upload foto profil');
            }
        }

        $user->save(); // Menyimpan user ke database

        // Logging aktivitas pendaftaran
        ActivityLog::create([
            'user_id' => $user->id, // Menggunakan ID pengguna yang baru dibuat
            'activity' => 'Pengguna Baru Bergabung : ' . $user->name,
        ]);

        return redirect()->route('login')->with('success', 'Akun Anda telah berhasil didaftarkan. Selamat bergabung!');
    }

    // Memperbarui password pengguna
    public function updatePassword(Request $request)
    {
        // Validasi input untuk memperbarui password
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User tidak ditemukan.']);
        }

        // Memeriksa apakah password saat ini cocok
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password saat ini tidak cocok.');
        }

        $user->password = Hash::make($request->new_password); // Hashing password baru
        $user->save(); // Menyimpan password baru

        // Logging aktivitas perubahan password
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'Password Telah Diganti',
        ]);

        return redirect()->back()->with('success', 'Password berhasil diganti.');
    }

    // Memverifikasi pendaftaran pengguna melalui token
    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->remember_token = Str::random(40); // Mengubah token setelah verifikasi
            $user->save();

            return redirect()->route('login')->with('success', 'Registration successfully verified.');
        } else {
            abort(404); // Menampilkan halaman 404 jika token tidak valid
        }
    }

    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Menampilkan halaman lupa password
    public function forgetpass()
    {
        return view('auth.forgotpass');
    }

    // Menangani proses login
    public function loginStore(Request $request)
    {
        // Validasi input login
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            return redirect()->route('admin.index')->with('error', 'Anda sudah login.');
        }

        // Cek jika pengguna belum terautentikasi dan mencoba akses admin
        if ($request->routeIs('admin')) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Coba untuk mengautentikasi pengguna
        if (Auth::attempt($data)) {
            $request->session()->regenerate(); // Regenerasi session

            // Mendapatkan pengguna yang baru saja login
            $user = Auth::user();

            // Logging aktivitas setelah login berhasil
            ActivityLog::create([
                'user_id' => $user->id,
                'activity' => 'User logged in',
            ]);

            // Menyimpan pesan selamat datang di sesi
            $request->session()->flash('welcome', 'Selamat Datang, ' . $user->name);

            // Redirect ke halaman admin atau halaman yang sesuai
            return redirect()->route('admin.index')->with('status', 'success');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->with('error', 'Email atau password salah.');
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        // Menyimpan log aktivitas saat logout
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'User logged out',
        ]);

        Auth::logout(); // Logout pengguna

        $request->session()->invalidate(); // Invalidasi sesi
        $request->session()->regenerateToken(); // Regenerasi token sesi

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout!');
    }

    // Memperbarui profil pengguna
    public function updateProfile(Request $request)
    {
        // Validasi input untuk memperbarui profil
        $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = User::find(Auth::id()); // Mendapatkan pengguna yang sedang login
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->position = $request->position;
            $user->phone_number = $request->phone_number;

            // Menyimpan foto profil jika ada
            if ($request->hasFile('foto_profile')) {
                try {
                    $file = $request->file('foto_profile');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/foto_profile', $filename);
                    $user->foto_profile = Storage::url($path);

                    // Logging informasi file
                    Log::info('File Info: ', [
                        'MimeType' => $file->getMimeType(),
                        'Extension' => $file->getClientOriginalExtension(),
                        'Size' => $file->getSize(),
                    ]);
                } catch (\Exception $e) {
                    // Logging error jika gagal mengupload file
                    Log::error('File upload error: ', ['error' => $e->getMessage()]);
                    return redirect()->back()->withErrors(['foto_profile' => 'Failed to upload profile picture']);
                }
            }

            $user->save(); // Menyimpan perubahan profil

            // Logging aktivitas perubahan profil
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Profile Telah Diperbaruhi',
            ]);

            Log::info('Profile updated:', ['foto_profile' => $user->foto_profile]);

            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
}
