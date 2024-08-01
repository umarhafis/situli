<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Menampilkan daftar semua entitas Dokumentasi.
     */
    public function index() 
    {
        $dokumentasi = Dokumentasi::all();
        return view('admin.dokumentasi', compact('dokumentasi'));
    }

    /**
     * Menampilkan daftar dokumentasi untuk pengguna.
     */
    public function view()
    {
        $dokumentasi = Dokumentasi::paginate(9);
        return view('user.dokumentasi', compact('dokumentasi'));
    }

    /**
     * Menampilkan formulir untuk membuat entitas Dokumentasi baru.
     */
    public function create()
    {
        return view('admin.dokumentasiCreate');
    }

    /**
     * Menyimpan entitas Dokumentasi baru ke dalam basis data setelah melakukan validasi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        try {
            $foto = $request->hasFile('foto') ? $request->file('foto')->store('photos', 'public') : null;

            $dokumentasi = Dokumentasi::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'foto' => $foto,
            ]);
    
            // Logging aktivitas ditambah
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Dokumentasi Telah Ditambah : ' . $dokumentasi->deskripsi,
            ]);

            return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('dokumentasi.index')->with('error', 'Terjadi kesalahan saat menambahkan dokumentasi.');
        }
    }

    /**
     * Menampilkan entitas Dokumentasi tertentu.
     */
    public function show($id)
    {
        try {
            $dokumentasi = Dokumentasi::findOrFail($id);
            return view('admin.dokumentasiShow', compact('dokumentasi'));
        } catch (\Exception $e) {
            return redirect()->route('dokumentasi.index')->with('error', 'Dokumentasi tidak ditemukan.');
        }
    }

    /**
     * Menampilkan formulir untuk mengedit entitas Dokumentasi yang ada.
     */
    public function edit($id)
    {
        try {
            $dokumentasi = Dokumentasi::findOrFail($id);
            return view('admin.dokumentasiEdit', compact('dokumentasi'));
        } catch (\Exception $e) {
            return redirect()->route('dokumentasi.index')->with('error', 'Dokumentasi tidak ditemukan.');
        }
    }

    /**
     * Memperbarui entitas Dokumentasi yang ada di basis data setelah melakukan validasi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        try {
            $dokumentasi = Dokumentasi::findOrFail($id);

            if ($request->hasFile('foto')) {
                // Menghapus foto lama
                if ($dokumentasi->foto) {
                    Storage::disk('public')->delete($dokumentasi->foto);
                }
                // Menyimpan foto baru
                $foto = $request->file('foto')->store('photos', 'public');
                $dokumentasi->foto = $foto;
            }

            $dokumentasi->judul = $request->judul ?? $dokumentasi->judul;
            $dokumentasi->deskripsi = $request->deskripsi ?? $dokumentasi->deskripsi;
            $dokumentasi->save();

            // Logging aktivitas diupdate
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Dokumentasi Telah Diedit : ' . $dokumentasi->deskripsi,
            ]);

            return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('dokumentasi.index')->with('error', 'Terjadi kesalahan saat memperbarui dokumentasi.');
        }
    }

    /**
     * Menghapus entitas Dokumentasi yang ada dari basis data.
     */
    public function destroy($id)
    {
        try {
            $dokumentasi = Dokumentasi::findOrFail($id);
            
            // Menghapus foto dari storage
            if ($dokumentasi->foto) {
                Storage::disk('public')->delete($dokumentasi->foto);
            }

            $dokumentasi->delete();

            // Logging aktivitas dihapus
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Dokumentasi Telah Dihapus : ' . $dokumentasi->deskripsi,
            ]);

            return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('dokumentasi.index')->with('error', 'Terjadi kesalahan saat menghapus dokumentasi.');
        }
    }
}
