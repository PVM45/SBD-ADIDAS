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
    //dipakai atau tidak
    public function register(){
            return view('auth.register');
        }


    public function userdashboard() {

        $kategoris = kategori::all();

        $subkategoris = subkategori::all();

        return view('layouts.author.dashboard', compact('kategoris','subkategoris'));
    }


    public function login(){
        return view('auth.login');
    }


    public function userprofile()
    {
        return view('frontend.profile.index');
    }


    public function userpasswordupdate(Request $request)
    {
        $current_password = $request->input('current_password');
        $new_password = $request->input('password');

        $user = User::findOrFail(Auth::user()->id);
        if(Hash::check($current_password,$user->password)){
            $user->password = Hash::make($new_password);
            $user->update([
                'password' => $user->password,
            ]);

            Auth::logout();

            $notification = [
                'message' => 'Password Updated Successfully!!!',
                'alert-type' => 'success'
            ];
        }else{
            $notification = [
                'message' => 'Please provide valid password',
                'alert-type' => 'error'
            ];
            return redirect()->route('author.user.change.password')->with($notification);}
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
    $user = Auth::user();
    return view('frontend.profile.changepassword', compact('user'));






}





    public function register_proses(Request $request){
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

        // $login = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // if(Auth::attempt($data)){
        //     return redirect()->route('products');
        // }else{
        //     return redirect('login')->with('failed','email atau password salah');
        // }

   

}



   public function messages()
    {
        return [
            'password.required' => 'The password must contain at least 6 character and Uppercase and lowercase and number.',

            // 'price.required' => 'The product price field is required.',
            // 'price.numeric' => 'The product price must be numeric.',
        ];
    }
    // public function login_proses (Request $request){
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $data = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];

    //     if(Auth::attempt($data)){
    //         return redirect()->route('home');
    //     }else{
    //         return redirect('login')->with('failed','email atau password salah');
    //     }
    // }
    // public function userlogout()
    // {
    //     Auth::logout();
    //     $notification = [
    //         'message' => 'Logout Successful',

    //         'alert-type' => 'success',
    //     ];
    //     return redirect()->route('login')->with($notification);
    // }
}




