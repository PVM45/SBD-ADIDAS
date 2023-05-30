<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alamat;

class AddressController extends Controller
{
    public function ShowAddress()
{
    $alamat = Alamat::where('user_id', auth()->user()->id)->get();

    return view('frontend.profile.address', compact('alamat'));
}
    public function AddressProcess(Request $request)
    {
        $validatedData = $request->validate([
            // 'provinsi' => 'required' ,
            // 'kabupaten' => 'required',
            // 'kecamatan' => 'required',
            // 'kelurahan' => 'required',
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
