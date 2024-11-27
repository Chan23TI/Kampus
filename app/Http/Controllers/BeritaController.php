<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
   

    public function index()
    {
        $berita = Berita::all(); // all -> sama seperti SELECT * FROM BERITA
        return view('berita.index', compact('berita')); //compact ->
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi_berita;

        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('images', 'public'); //akan di store ke path /public/images
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum) //menangkap objek yang mau kita edit
    {
        $berita = $beritum;
        return view('berita.edit', compact('berita')); //menampilkan form berita
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        $berita = $beritum;
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi_berita;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::delete('public/' . $berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('images', 'public');
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum) // objek berita di route jadi {beritum}, solusinya dengan inisialisasi $berita = $beritum; parameter method jg jadi $beritum
    {
        $berita = $beritum;
        if ($berita->gambar) {
            Storage::delete(paths: 'public/' . $berita->gambar);
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
