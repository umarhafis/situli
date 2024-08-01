<?php

namespace App\Http\Controllers;

use App\Models\Dikerjakan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DikerjakanController extends Controller
{
    /**
     * Menampilkan daftar semua entitas Dikerjakan.
     */
    public function index()
    {
        $dikerjakan = Dikerjakan::all();
        return view('admin.dikerjakan', compact('dikerjakan'));
    }

    /**
     * Menampilkan formulir untuk membuat entitas Dikerjakan baru.
     */
    public function create()
    {
        return view('admin.dikerjakanCreate');
    }

    /**
     * Menyimpan entitas Dikerjakan baru ke dalam basis data setelah melakukan validasi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket_perkerjaan' => 'required',
            'pejabat_pembuat_komitmen' => 'required',
            'harga_kontrak' => 'required',
            'lokasi' => 'required',
            'tahun' => 'required|digits:4|integer|min:1900|max:2500' . date('Y'),
        ]);

        try {
            // Membuat entitas Dikerjakan baru
            $dikerjakan = Dikerjakan::create($request->all());

            // Logging aktivitas ditambah
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Dikerjakan Telah Ditambah : ' . $dikerjakan->nama_paket_perkerjaan,
            ]);

            return redirect()->route('dikerjakan.index')->with('success', 'Dikerjakan berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('dikerjakan.index')->with('error', 'Terjadi kesalahan saat menambahkan Dikerjakan.');
        }
    }

    /**
     * Menampilkan entitas Dikerjakan tertentu.
     * Catatan: Method ini mengabaikan parameter $dikerjakan yang diterima.
     */
    public function show(Dikerjakan $dikerjakan)
    {
        $dikerjakan = Dikerjakan::paginate(5);
        return view('user.dikerjakan', compact('dikerjakan'));
    }

    /**
     * Menampilkan formulir untuk mengedit entitas Dikerjakan yang ada.
     */
    public function edit(Dikerjakan $dikerjakan)
    {
        return view('admin.dikerjakanEdit', compact('dikerjakan'));
    }

    /**
     * Memperbarui entitas Dikerjakan yang ada di basis data setelah melakukan validasi.
     */
    public function update(Request $request, Dikerjakan $dikerjakan)
    {
        $request->validate([
            'nama_paket_perkerjaan' => 'required',
            'pejabat_pembuat_komitmen' => 'required',
            'harga_kontrak' => 'required',
            'lokasi' => 'required',
            'tahun' => 'required|digits:4|integer|min:1900|max:2500' . date('Y'),
        ]);

        try {
            $dikerjakan->update($request->all());

            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Dikerjakan Telah Diedit : ' . $dikerjakan->nama_paket_perkerjaan,
            ]);

            return redirect()->route('dikerjakan.index')->with('success', 'Dikerjakan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('dikerjakan.index')->with('error', 'Terjadi kesalahan saat memperbarui Dikerjakan.');
        }
    }

    /**
     * Menghapus entitas Dikerjakan yang ada dari basis data.
     */
    public function destroy(Dikerjakan $dikerjakan)
    {
        try {
            $dikerjakan->delete();

            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Dikerjakan Telah Dihapus : ' . $dikerjakan->nama_paket_perkerjaan,
            ]);

            return redirect()->route('dikerjakan.index')->with('success', 'Dikerjakan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('dikerjakan.index')->with('error', 'Terjadi kesalahan saat menghapus Dikerjakan.');
        }
    }
}
