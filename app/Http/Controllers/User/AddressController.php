<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alamat;
use App\Models\kategori;
use App\Models\subkategori;

class AddressController extends Controller
{
    public function ShowAddress()
{
    $kategoris = kategori::all();

        $subkategoris = subkategori::all();
    $alamat = Alamat::where('user_id', auth()->user()->id)->get();
    $count=$alamat->count();
    return view('frontend.profile.address', compact('alamat','kategoris','subkategoris','count'));
}
    public function AddressProcess(Request $request)
    {
        $validatedData = $request->validate([

            'Alamat' => 'required',
            'kode_pos' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $alamat = new Alamat;
        $alamat->user_id = auth()->user()->id;
        $alamat->provinsi = $request->provinsi;
        $alamat->kabupaten = $request->kota;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kelurahan = $request->kelurahan;
        $alamat->alamat = $request->Alamat;
        $alamat->kode_pos = $request->kode_pos;
        $alamat->nomor_telepon = $request->nomor_telepon;
        $alamat->save();

        return redirect()->route('author.user.address');
    }

}
