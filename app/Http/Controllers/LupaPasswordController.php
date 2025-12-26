<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\OtpMail;
use Carbon\Carbon;

class LupaPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('Reset Password/InputEmail');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'Email tersebut tidak terdaftar di sistem kami.'
        ]);

        $user = User::where('email', $request->email)->first();

        $user->otp_code = rand(100000, 999999);
        $user->otp_expires_at = Carbon::now()->addMinutes(5);
        $user->save();

        try {
            Mail::to($user->email)->send(new OtpMail($user->otp_code));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email. Coba lagi nanti.');
        }

        $request->session()->put('reset_email', $user->email);

        return redirect()->route('password.otp')->with('success', 'Kode OTP telah dikirim ke email Anda.');
    }

    public function showOtpForm()
    {
        if (!session('reset_email')) {
            return redirect()->route('password.request');
        }
        return view('Reset Password/VerivLupaPassword');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        if ($user && $user->otp_code == $request->otp && Carbon::now()->lessThanOrEqualTo($user->otp_expires_at)) {

            $request->session()->put('otp_verified', true);
            
            
            return redirect()->route('password.reset')->with('success', 'OTP Benar! Silakan buat password baru.');
        }

    }

    public function showResetForm()
    {
        if (!session('reset_email') || !session('otp_verified')) {
            return redirect()->route('password.request');
        }

        return view('Reset Password/BaruPassword');
    }

    public function resetPassword(Request $request)
    {
        if (!session('reset_email') || !session('otp_verified')) {
            return redirect()->route('login')->with('error', 'Sesi habis, ulangi proses.');
        }

        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ], [
            'confirm_password.same' => 'Konfirmasi password tidak cocok.'
        ]);

        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        $user->password = Hash::make($request->password);
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();


        $request->session()->forget(['reset_email', 'otp_verified']);

        return redirect()->route('login')->with('success', 'Password berhasil diubah! Silakan login.');
    }
}