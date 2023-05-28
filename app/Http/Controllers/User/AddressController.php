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
            'Alamat' => 'required|string',
        ]);

        $alamat = new Alamat;
        $alamat->user_id = auth()->user()->id;
        $alamat->alamat = $request->Alamat;
        $alamat->save();

        return redirect()->route('author.user.address');
    }

}
