<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Menampilkan semua kontak di halaman admin.
     */
    public function index()
    {
        $kontak = Kontak::all();
        return view('admin.kontak', compact('kontak'));
    }

    /**
     * Menampilkan semua kontak di halaman user.
     */
    public function contact()
    {
        $kontak = Kontak::all();
        return view('user.contact', compact('kontak'));
    }

    /**
     * Menampilkan form untuk mengedit kontak tertentu.
     *
     * @param int $id ID kontak yang akan diedit
     */
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontakEdit', compact('kontak'));
    }

    /**
     * Memperbarui data kontak yang sudah ada.
     *
     * @param Request $request Permintaan HTTP yang berisi data yang divalidasi
     * @param int $id ID kontak yang akan diperbarui
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'nomor' => 'required',
            'email' => 'required|email|max:255|unique:kontak,email,' . $id,
        ]);

        $kontak = Kontak::findOrFail($id);
        $kontak->alamat = $request->alamat;
        $kontak->nomor = $request->nomor;
        $kontak->email = $request->email;
        $kontak->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'Kontak Telah Diedit',
        ]);

        return redirect()->route('kontaks.index')
                         ->with('success', 'Kontak berhasil diperbarui');
    }
}
