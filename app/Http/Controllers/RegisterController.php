<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function show_register(){
        return view('register/RegisterPage'); 
    }

    public function register_validate(Request $request){
        
        $request->validate([
            'namereg' => 'required|max:255',
            'usernamereg' => 'required|unique:users,username|alpha_dash',
            'emailreg' => 'required|email|unique:users,email',
            'passwordreg' => 'required|min:8',
            'conpasswordreg' => 'required|same:passwordreg',
        ], [
            'usernamereg.unique' => 'Username ini sudah dipakai.',
            'emailreg.unique' => 'Email ini sudah terdaftar.',
            'conpasswordreg.same' => 'Konfirmasi password tidak cocok.'
        ]);

        $datareg = [
            'name' => $request->namereg,
            'username' => $request->usernamereg,
            'email' => $request->emailreg,
            'password' => Hash::make($request->passwordreg),
            'otp_code' => rand(100000, 999999),
            'otp_expires_at' => Carbon::now()->addMinutes(5)
        ];

        $user = User::create($datareg);

        try {
            Mail::to($user->email)->send(new OtpMail($user->otp_code));
        } catch (\Exception $e) {
            $user->delete();
            return back()->with('error', 'Gagal mengirim email OTP.');
        }


        $request->session()->put('registration_username', $request->usernamereg);
        
        $request->session()->save(); 

        return redirect()->route('otp.form')->with('success', 'Registrasi berhasil! Cek email Anda.');
    }


    public function show_otp_form()
    {
        if (!session('registration_username')) {
            return redirect()->route('register');
        }
        return view('Register/VerivOTP'); 
    }

    public function verify_otp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $username = session('registration_username');
        
        $user = User::where('username', $username)->first();

        if ($user && $user->otp_code == $request->otp && Carbon::now()->lessThanOrEqualTo($user->otp_expires_at)) {

            Auth::login($user);

            $user->otp_code = null;
            $user->otp_expires_at = null;
            $user->email_verified_at = Carbon::now();
            $user->save();

            $request->session()->forget('registration_username');
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Verifikasi Berhasil! Selamat Datang.');
        }

        return back()->with('error', 'Kode OTP salah atau sudah kadaluarsa!');
    }
}