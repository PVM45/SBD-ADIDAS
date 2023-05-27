<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\User;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $produkId)
    {
        $produkId = $request->input('produk_id');
        // Validasi input
        $validatedData = $request->validate([
            'komentar' => 'required|string',
        ]);
        
        $user = Auth::user();
        $komentar = Komentar::where('user_id', $user->id)
            ->where('produk_id', $produkId)
            ->first();

        // Simpan komentar ke database
        $komentar = new Komentar();
        $komentar->komentar = $validatedData['komentar'];
        $komentar->user_id = auth()->user()->id;
        $komentar->produk_id = $produkId;
        $komentar->save();

        // Ambil semua komentar terkait dari database
    $komentarTerakhir = Komentar::where('produk_id', $produkId)
    ->orderBy('created_at', 'desc')
    ->get();

        // Redirect atau tampilkan pesan sukses dan komentar terkait
    return redirect()->back()->with('success', 'Komentar berhasil disimpan.')
    ->with('komentarTerakhir', $komentarTerakhir);
}

    }

