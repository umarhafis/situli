<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Menampilkan daftar semua portofolio.
     */
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('admin.portofolio', compact('portofolios'));
    }

    /**
     * Menampilkan form untuk membuat portofolio baru.
     */
    public function view() 
    {
        $portofolios = Portofolio::paginate(5);
        return view('user.portofolio', compact('portofolios'));
    }

    public function create()
    {
        return view('admin.portofolioCreate');
    }

    /**
     * Menyimpan portofolio baru ke dalam basis data.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket_perkerjaan' => 'required',
            'pejabat_pembuat_komitmen' => 'required',
            'harga_kontrak' => 'required',
            'lokasi' => 'required',
            'tahun' => 'required|digits:4|integer|min:1900|max:2500' . (date('Y')), // Perbaiki validasi tahun
        ]);

        try {
            $portofolio = Portofolio::create($request->all());

            // Logging aktivitas ditambah
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Portofolio Telah Ditambah : ' . $portofolio->nama_paket_perkerjaan,
            ]);

            return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('portofolios.index')->with('error', 'Terjadi kesalahan saat menambahkan portofolio.');
        }
    }

    /**
     * Menampilkan portofolio tertentu.
     */
    public function show(Portofolio $portofolio)
    {
        return view('user.portofolios', compact('portofolio'));
    }

    /**
     * Menampilkan form untuk mengedit portofolio tertentu.
     */
    public function edit(Portofolio $portofolio)
    {
        return view('admin.portofolioEdit', compact('portofolio'));
    }

    /**
     * Memperbarui portofolio yang sudah ada di basis data.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'nama_paket_perkerjaan' => 'required',
            'pejabat_pembuat_komitmen' => 'required',
            'harga_kontrak' => 'required',
            'lokasi' => 'required',
            'tahun' => 'required|digits:4|integer|min:1900|max:2500' . (date('Y')), // Perbaiki validasi tahun
        ]);

        try {
            $portofolio->update($request->all());

            // Logging aktivitas diupdate
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Portofolio Telah Diedit : ' . $portofolio->nama_paket_perkerjaan,
            ]);

            return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('portofolios.index')->with('error', 'Terjadi kesalahan saat memperbarui portofolio.');
        }
    }

    /**
     * Menghapus portofolio tertentu dari basis data.
     */
    public function destroy(Portofolio $portofolio)
    {
        try {
            $portofolio->delete();

            // Logging aktivitas dihapus
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Portofolio Telah Dihapus : ' . $portofolio->nama_paket_perkerjaan,
            ]);

            return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('portofolios.index')->with('error', 'Terjadi kesalahan saat menghapus portofolio.');
        }
    }
}
