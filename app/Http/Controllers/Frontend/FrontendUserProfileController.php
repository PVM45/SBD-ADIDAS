<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class FrontendUserProfileController extends Controller
{

    public function userdashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function login(){
        return view('auth.login');
    }

    public function login_proses (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            return redirect('login')->with('failed','email atau password salah');
        }
    }
    
    public function userlogout()
    {
        Auth::logout();
        $notification = [
            'message' => 'Logout Successfull',
            'alert-type' => 'success',
        ];
        return redirect()->route('login')->with($notification);
    }

    public function userprofile()
    {
        $user = Auth::user();
        return view('frontend.profile.index', compact('user'));
    }

    public function register(){
        return view('auth.register');
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
            'password.required' => 'The password must contain atleast 6 character and Uppercase and lowercase and number.',
            // 'price.required' => 'The product price field is required.',
            // 'price.numeric' => 'The product price must be numeric.',
        ];
    }


}

