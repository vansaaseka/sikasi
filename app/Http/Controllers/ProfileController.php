<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Prodi;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //tampil edit profile

    public function editprofile(){

        $prodi = Prodi::all();
        $profil = User::all();
        // $profil = User::where('id', Auth::user()->id)->first();
        return view('dosen\Profile\editprofile' , compact('prodi' , 'profil'));
    }

    // public function insertprofile(Request $request)


    //      if($request->hasFile('photo')){
    //         $photo = $request->file('photo');
    //         $namaphoto = $photo->getClientOriginalName();
    //         $photo->move('photodosen/') ;

    //     $user =Auth::user();
    //     $user->name = $request['name'];
    //     $user->email = $request['email'];
    //     $user->nomorhp = $request['nomorhp'];
    //     $user->prodi_id = $request->input('prodi_id');
    //     $user->photo = $namaphoto;
    //     $user->alamat = $request->input('alamat');


    //     $user->save();
    //      }

    //     return back()->with('message','Profile Updated');
    //     }



    // public function insertprofile(Request $request){
    // $user = User::where('id', Auth()->user()->id);
    // if($request->file('photo') == "") {
    // $user->update([
    // 'name' => $request->input('name'),
    // 'email' => $request->input('email'),
    // 'nomorhp' => $request->input('nomorhp'),
    // 'prodi_id' => $request->input('prodi_id'),
    // 'alamat'=> $request->input('alamat')


    // ]);
    // } else {

    //hapus old image
    // Storage::disk('local')->delete('public/photoprofil/'.$user->photo);

    //upload new image
    // $photo = $request->file('photo');
    // $photo->storeAs('public/photoprofil', $photo->hashName());
    // $request->photo->move(public_path('photoprofil'), $photo);
        //  dd($photo);


    // $user->update([
    // 'photo' => $photo->hashName(),
    // 'name' => $request->input('name'),
    // 'email' => $request->input('email'),
    // 'nomorhp' => $request->input('nomorhp'),
    // 'prodi_id' => $request->input('prodi_id'),
    // 'alamat'=> $request->input('alamat')


    // ]);

    // }
    // return back()->with('toast_success', 'Data Berhasil Tersimpan');

    // }

    public function insertprofile(Request $request)
    {
        // $user = User::where('id', Auth::user()->id);
        $userid = Auth::user()->id;
        $user = User::findOrfail($userid);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nomorhp' => 'required',
            'prodi_id' => 'required',
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
        $user->prodi_id = $request->prodi_id;
        $user->alamat = $request->alamat;
        $user->photo = $txt;
        $user->save();

        return back()->with('toast_success', 'Data Berhasil Tersimpan');



    }

}



