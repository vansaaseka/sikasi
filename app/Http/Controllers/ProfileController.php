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

         if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $namaphoto = $photo->getClientOriginalName();
            $photo->move('photodosen/') ;
        

        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->nomorhp = $request['nomorhp'];
        $user->prodi_id = $request->input('prodi_id');
        $user->photo = $namaphoto;
        $user->alamat = $request->input('alamat');

        
        $user->save();
         }
       
        return back()->with('message','Profile Updated');
        }

}
