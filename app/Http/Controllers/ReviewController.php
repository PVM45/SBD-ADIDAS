<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use App\Models\produk;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $produkId)
{
    $produkId = $request->input('produk_id');

    // Validasi input komentar
    $validatedData = $request->validate([
        'komentar' => 'required|string',
    ]);

    // Validasi input rating
    $validatedDataRating = $request->validate([
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $user = Auth::user();

    // Simpan komentar ke database
    $komentar = new Komentar();
    $komentar->komentar = $validatedData['komentar'];
    $komentar->user_id = auth()->user()->id;
    $komentar->produk_id = $produkId;
    $komentar->save();

    // Simpan rating ke database
    $rating = new Rating();
    $rating->rating = $validatedDataRating['rating'];
    $rating->user_id = auth()->user()->id;
    $rating->produk_id = $produkId;
    $rating->save();

    // Ambil semua komentar terkait dari database
    $komentarTerakhir = Komentar::where('produk_id', $produkId)
        ->orderBy('created_at', 'desc')
        ->get();

    // Redirect atau tampilkan pesan sukses dan komentar terkait
    return redirect()->back()->with('success', 'Komentar dan Rating berhasil disimpan.')
        ->with('komentarTerakhir', $komentarTerakhir);
}

}
