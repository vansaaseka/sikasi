<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //tampil edit profile

    public function editprofile(){
        $prodi = Prodi::all();
        return view('dosen\Profile\editprofile' , compact('prodi'));
    }   

    public function insertprofile(Request $request){

        // $profile = variabel (bebas)
        // $user = Auth::user($request->all());

         //mengambil data file yang diupload
         $photo = $request->file('photo');

         //mengambil nama file
         $namaphoto = $photo->getClientOriginalName();
 
         //memindahkan file ke folder ke tujuan
         $photo->move('photodosen/', $photo->getClientOriginalName());

        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->nomorhp = $request['nomorhp'];
        $user->prodi_id = $request->input('prodi_id');
        $user->photo = $namaphoto;
        $user->alamat = $request->input('alamat');

        
        $user->save();
        
        // // $profile = Profile::create($request->all());
        // // $profile->user_id = Auth::user()->id;
        // // if ($request->hasFile('photo')) {
        // //     $request->file('photo')->move('photodosen/', $request->file('photo')->getClientOriginalName());
        // //     $profile->photo = $request->file('photo')->getClientOriginalName();
        // //     $profile->save();
        // // }
        // // $profile->prodi_id = $request['prodi_id'];
        // // $profile->alamat = $request['alamat'];
        // // $profile->save();

        // //mengambil data file yang diupload
        // $photo = $request->file('photo');

        // //mengambil nama file
        // $namaphoto = $photo->getClientOriginalName();

        // //memindahkan file ke folder ke tujuan
        // $photo->move('photodosen/', $photo->getClientOriginalName());

        // $profile = new Profile;
        // $profile->user_id = Auth::user()->id;
        // $profile->prodi_id = $request->input('prodi_id');
        // $profile->photo = $namaphoto;
        // $profile->alamat = $request->input('alamat');

        // //simpan ke database
        // $profile->save();

        return back()->with('message','Profile Updated');
        }

}
