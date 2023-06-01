<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\kategori;
use App\Models\subkategori;

class FrontendUserProfileController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }


    public function userdashboard()
    {

        $kategoris = kategori::all();

        $subkategoris = subkategori::all();

        return view('layouts.author.dashboard', compact('kategoris', 'subkategoris'));
    }


    public function login()
    {
        return view('auth.login');
    }


    public function userprofile()
    {

        $kategoris = kategori::all();

        $subkategoris = subkategori::all();
        return view('frontend.profile.index', compact('kategoris','subkategoris'));
    }


    public function userpasswordupdate(Request $request)
    {

        $current_password = $request->input('current_password');
        $new_password = $request->input('password');

        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($current_password, $user->password)) {
            $user->password = Hash::make($new_password);
            $user->update([
                'password' => $user->password,
            ]);

            Auth::logout();

            $notification = [
                'message' => 'Password Updated Successfully!!!',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Please provide valid password',
                'alert-type' => 'error'
            ];
            return redirect()->route('author.user.change.password')->with($notification);
        }
    }

    public function userprofileupdate(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
    ]);
    //dd($user, $request->all());
    $data = User::findOrFail(Auth::user()->id);
    $data->name = $request->name;
    $data->email = $request->email;
    $data->nomor_telepon = $request->phone_number;
    $data->save();

    $notification = [
        'message' => 'Profile Updated Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('author.user.profile')->with($notification);

}

public function userpasswordchange()
{
    $kategoris=kategori::all();
    $subkategoris=subkategori::all();
    $user = Auth::user();
    return view('frontend.profile.changepassword', compact('user','kategoris','subkategoris'));






}



        return redirect()->route('author.user.profile')->with($notification);
    }

    public function userpasswordchange()
    {
        $kategoris = kategori::all();

        $subkategoris = subkategori::all();
        $user = Auth::user();
        return view('frontend.profile.changepassword', compact('user','kategoris', 'subkategoris'));
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'telp' => 'required|regex:/^[0-9]+$/',
            'alamat' => 'required',
        ]);

        $data = [
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->telp,
            'alamat' => $request->alamat,
        ];

        User::create($data);

        return redirect()->route('login');
    }

    public function messages()
    {
        return [
            'password.required' => 'The password must contain at least 6 character and Uppercase and lowercase and number.',
        ];
    }
}
