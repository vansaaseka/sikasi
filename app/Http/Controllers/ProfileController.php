<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //tampil edit profile

        public function profileDosen(){

            $prodi = Prodi::all();
            $profil = User::all();
            // $profil = User::where('id', Auth::user()->id)->first();
            return view('dosen\Profile\editprofile' , compact('prodi' , 'profil'));
        }
        public function profileVerifikator(){

        $prodi = Prodi::all();
        $profil = User::all();
        // $profil = User::where('id', Auth::user()->id)->first();
        return view('verifikator\Profile\editprofile' , compact('prodi' , 'profil'));
        }
         public function profileReviewer(){

         $prodi = Prodi::all();
         $profil = User::all();
         // $profil = User::where('id', Auth::user()->id)->first();
         return view('reviewer\Profile\editprofile' , compact('prodi' , 'profil'));
         }
          public function profileAdmin(){

          $prodi = Prodi::all();
          $profil = User::all();
          // $profil = User::where('id', Auth::user()->id)->first();
          return view('admin\Profile\editprofile' , compact('prodi' , 'profil'));
          }
  
  
    public function insertprofile(Request $request)
    {
        // $user = User::where('id', Auth::user()->id);
        $userid = Auth::user()->id;
        $user = User::findOrfail($userid);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nomorhp' => 'required',
            // 'prodi_id' => 'required',
            'alamat' => 'required',
        ]);
        if (isset($request->photo)) {
            $extention = $request->photo->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/profile/". $file_name;
            $request->photo->storeAs('public/profile', $file_name);
        } else {
            $file_name = null;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nomorhp = $request->nomorhp;
        // $user->prodi_id = $request->prodi_id;
        $user->alamat = $request->alamat;
        $user->photo = $txt;
        $user->save();
       
      
        return back()->with('toast_success', 'Data Berhasil Tersimpan');



    }

}
