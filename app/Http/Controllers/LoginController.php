<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\DetailPenyimpanan;

class LoginController extends Controller
{
    public function show_login(){
        return view('login/LoginPage');
    }

    public function dashboard(){
    $duaHariLagi = Carbon::now()->addDays(2)->endOfDay();

    $urgentItems = DetailPenyimpanan::with('item')
        ->where('user_id', Auth::id())
        ->where('status', 'Layak Makan')
        ->whereDate('tanggal_kadaluarsa', '<=', $duaHariLagi)
        ->orderBy('tanggal_kadaluarsa', 'asc')
        ->get();

    $urgentItems->transform(function($data) {
        $kadaluarsa = Carbon::parse($data->tanggal_kadaluarsa);
        $hari_ini   = Carbon::now()->startOfDay();
        
        $data->sisa_hari = (int) $hari_ini->diffInDays($kadaluarsa, false);
        return $data;
    });

    return view('Dashboard/beranda', compact('urgentItems'));
    }

    public function login_validate(Request $request)
    {
        $request->validate([
            'usernamelgn' => 'required',
            'passwordlgn' => 'required'
        ]);

        $datalog = [
            'username' => $request->usernamelgn, 
            'password' => $request->passwordlgn,
        ];

        if (Auth::attempt($datalog)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Login Gagal, username atau password salah.');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}