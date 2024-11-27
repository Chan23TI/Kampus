<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
USE Illuminate\View\view;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $questionAnswer= QuestionAnswer::all();
        return view('questionAnswer.index', compact('questionAnswer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string', // question harus diisi
            'answer' => 'required|string', // answer harus diisi
        ]);

        // Menyimpan data yang telah divalidasi ke tabel 'pesan_sarans'
        $request->user()->questionAnswer()->create($validated);

        //Redirect kembali ke halaman form dan menampilkan pesan sukses
        return redirect()->route('questionAnswer.index')->with('success','Pesan saran berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionAnswer $questionAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionAnswer $questionAnswer)
    {
        $questionAnswer = QuestionAnswer::findOrFail($questionAnswer->id);
        return view( 'questionAnswer.edit', compact('questionAnswer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'question' => 'required|string', // question harus diisi
            'answer' => 'required|string', // answer harus diisi
        ]);

        $questionAnswer = QuestionAnswer::findOrFail($id);
        $questionAnswer ->update($validated);

        //Redirect kembali ke halaman form dan menampilkan pesan sukses
        return redirect()->route('questionAnswer.index')->with('success','Pesan saran berhasil dikirim!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionAnswer $questionAnswer)
    {
         // Otorisasi jika diperlukan
        //  $this->authorize('delete', $questionAnswer);

         // Hapus pesan saran
         $questionAnswer->delete();

         // Redirect setelah penghapusan
         return redirect()->route('questionAnswer.index')->with('success', 'Pesan saran berhasil dihapus!');
    }
}
