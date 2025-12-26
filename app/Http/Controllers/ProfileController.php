<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show_profile(){
        $usernow = Auth::user();
        return view('Profile/ProfileView', compact('usernow'));
    }



    public function show_edit(){
        $usernow = Auth::user();
        return view('Profile/EditProfile', compact('usernow'));
    }


   public function edited(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $filename = Auth::user()->image_profile;
       
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = Auth::user()->username . '_profile.' . $photo->getClientOriginalExtension();
            $path = 'store_photo/' . $filename;


            Storage::disk('public')->put($path, file_get_contents($photo));
        }


        $dataedit = [
            'name' => $request->field_nama,
            'image_profile' => $filename,
        ];


        DB::table('users')->where('id', Auth::id())->update($dataedit);


        return redirect()->route('dashboard')->with('success', 'Profile berhasil diupdate.');
    }



    public function show_secure(){
        return view('Profile/EditPassword');
    }


    public function change_password(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ], [
            'new_password.min' => 'Password harus minimal 8 karakter.',
            'confirm_password.same' => 'Konfirmasi password tidak cocok.',
        ]);


        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();


        return redirect()->back()->with('success', 'Password berhasil diperbarui!');
    }

}
