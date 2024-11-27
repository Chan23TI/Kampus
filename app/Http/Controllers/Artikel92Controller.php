<?php

namespace App\Http\Controllers;

use App\Models\artikel_92;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class Artikel92Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel_92::all(); // all -> sama seperti SELECT * FROM BERITA
        return view('artikel92.index', compact('artikel')); //compact ->
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel92.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate( [
            'tanggal_92' => 'required|date',
            'judul_92' => 'required|string|max:255',
            'kategori_92' => 'required|string|max:255',
            'status_92' => 'required|string|max:255',
            'artikel_92' => 'required|string|max:255',
            'gambar_92' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $artikel_92 = new Artikel_92();
        $artikel_92->tanggal_92 = $request->tanggal_92;
        $artikel_92->judul_92 = $request->judul_92;
        $artikel_92->kategori_92 = $request->kategori_92;
        $artikel_92->status_92 = $request->status_92;
        $artikel_92->artikel_92 = $request->artikel_92;

        if ( $request->hasFile('gambar_92')) {
            $artikel_92 ->gambar_92 = $request ->file ('gambar_92')->store('images','public'); //akan di store ke path /public/images
        }

        $artikel_92->save();
        return redirect()->route('artikel92.index')->with('success','Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(artikel_92 $artikel_92)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artikel_92 $artikel_92)
    {   $artikel = $artikel_92;
        return view('artikel92.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,artikel_92 $artikel_92)
    {   $artikel= $artikel_92;
        $request->validate( [
            'tanggal_92' => 'required|date',
            'judul_92' => 'required|string|max:255',
            'kategori_92' => 'required|string|max:255',
            'status_92' => 'required|string|max:255',
            'artikel_92' => 'required|string|max:255',
            'gambar_92' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $artikel->tanggal_92 = $request->tanggal_92;
        $artikel->judul_92 = $request->judul_92;
        $artikel->kategori_92 = $request->kategori_92;
        $artikel->status_92 = $request->status_92;
        $artikel->artikel_92 = $request->artikel_92;

        if ( $request->hasFile('gambar_92')) {
            if($artikel ->gambar){
                Storage::delete('public/' . $artikel_92->gambar);
            }
            $artikel->gambar = $request->file('gambar_92')->store('images','public');
        }
        $artikel->save();
        return redirect()->route('artikel92.index')->with('success','Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artikel_92 $artikel_92, int $id)
    {
        $artikel_92 = Artikel_92::findOrFail($id);
        if ($artikel_92->gambar_92) {
            Storage::delete(paths: 'public/' . $artikel_92->gambar_92);
        }

        $artikel_92->delete();
        return redirect()->route ('artikel92.index')->with('success','Artikel berhasil dihapus!');
    }
}
