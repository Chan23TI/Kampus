<?php

namespace App\Http\Controllers;

use App\Models\PesanSaran;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class PesanSaranController extends Controller
{
     //Method utk menampilkan halaman form input pesan dan saran
    public function index(): View
    {
        $pesanSaran= PesanSaran::all();
        return view('pesansaran.index', compact('pesanSaran')); //Menampilkan view form input pesan dan saran
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    //Method untuk menyimpan data yang diinput ke database
    public function store(Request $request): RedirectResponse
    {
        //Validasi data yang diinput oleh pengguna
        $validated = $request->validate([
            'nama' => 'required|string|max:255', // Nama harus diisi
            'email' => 'required|email|max:255', //Email harus diisi dan valid
            'pesan' => 'required|string', //Pesan harus diisi
        ]);


        // Menyimpan data yang telah divalidasi ke tabel 'pesan_sarans'
        $request->user()->pesanSaran()->create($validated);

        //Redirect kembali ke halaman form dan menampilkan pesan sukses
        return redirect()->route('pesan_saran.index')->with('success','Pesan saran berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PesanSaran $pesanSaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesanSaran $pesanSaran)
    {
        $pesanSaran = PesanSaran::findOrFail($pesanSaran->id);
        return view( 'pesansaran.edit', compact('pesanSaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {   //Validasi input yg diberikan pengguna
        $validated = $request->validate([
            'nama' => 'required|string|max:255', // Nama harus diisi
            'email' => 'required|email|max:255', //Email harus diisi dan valid
            'pesan' => 'required|string', //Pesan harus diisi
        ]);

        //Cari data PesanSaran berdasarkan ID dan Update
        $pesanSaran = PesanSaran::findOrFail($id);
        $pesanSaran ->update($validated);

        //Rediret ke halaman index dengan pesan sukses
        return redirect()->route('pesan_saran.index')->with('success','Pesan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesanSaran $pesanSaran) : RedirectResponse
    {
         // Otorisasi jika diperlukan
        //  $this->authorize('delete', $pesanSaran);

         // Hapus pesan saran
         $pesanSaran->delete();

         // Redirect setelah penghapusan
         return redirect()->route('pesan_saran.index')->with('success', 'Pesan saran berhasil dihapus!');
    }
}
