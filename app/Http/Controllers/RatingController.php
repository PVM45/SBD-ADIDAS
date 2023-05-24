<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $produkId)
    {
        $produkId = $request->input('produk_id');
        // Validasi input
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $user = Auth::user();
        $rating = Rating::where('user_id', $user->id)
            ->where('produk_id', $produkId)
            ->first();

        // Simpan rating ke database
     {
    $rating = new Rating();
    $rating->rating = $validatedData['rating'];
    $rating->user_id = auth()->user()->id;
    $rating->produk_id = $produkId;
    $rating->save();
    // ...
        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Rating berhasil disimpan.');
}
}
}