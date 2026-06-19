<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('Admin.edit_profile', compact(['user']));
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();
        return back()->with('success','Profile Updated');
    }

    public function change_password(){
        return view('Admin.change_password');
    }

    public function update_password(Request $request){
        $user = Auth::user();
        $check = Hash::check($request->old_password, $user->password);
        if($check){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return back()->with('success', 'Berhasil ubah password');
        }else{
            return back()->with('failed', 'Password salah');
        }
    }
}
