<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Pengajuan;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;



class AkunController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Menampilkan table
    public function tampiladmin(){
        // Users tanpa dolar = nama database
        $admin = User::all();

        if (Auth()->user()->role == 1){
         return view('admin\ManajemenUser\tampilAdmin', compact('admin'));
        }
        else{
        abort(403);
        }
    }
    public function tampildosen(){
        $dosen = User::all();
        $prodi = Prodi::all();
        $pengajuan = Pengajuan::all();

        if (Auth()->user()->role == 1){
        return view('admin\ManajemenUser\tampilDosen', compact('dosen', 'prodi', 'pengajuan'));
        }
        else{
        abort(403);
        }

    }
    public function tampilverifikator(){
        $verifikator = User::all();

         if (Auth()->user()->role == 1){
        return view('admin\ManajemenUser\tampilVerifikator', compact('verifikator'));
         }
         else{
         abort(403);
         }
    }
    public function tampilreviewer(){
        $reviewer = User::all();

          if (Auth()->user()->role == 1){
            return view('admin\ManajemenUser\tampilReviewer', compact('reviewer'));
          }
          else{
          abort(403);
          }
    }

    //FormTambah
    public function tambahadmin(){

         if (Auth()->user()->role == 1){
         return view('admin\ManajemenUser\tambahadmin');
         }
         else{
         abort(403);
         }

    }
    public function tambahdosen(){
        $prodi = Prodi::all();

           if (Auth()->user()->role == 1){
            return view('admin\ManajemenUser\tambahdosen', compact('prodi'));
           }
           else{
           abort(403);
           }

    }
    public function tambahverifikator(){

         if (Auth()->user()->role == 1){
          return view('admin\ManajemenUser\tambahverifikator');
         }
         else{
         abort(403);
         }

    }

    public function tambahreviewer(){

         if (Auth()->user()->role == 1){
        return view('admin\ManajemenUser\tambahreviewer');
         }
         else{
         abort(403);
         }
    }


    protected function insertakun(request $request)
        {
            $this->validate($request, [
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'role' => ['required', 'string', 'max:255'],
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                        // 'prodi_id' => ['required']
                ]
                );

                $akun = new user;
                $akun->name = $request->input('name');
                $akun->email = $request->input('email');
                $akun->role = $request->input('role');
                $akun->status = $request->input('status');
                $akun->prodi_id = $request->input('prodi_id');
                $akun->password = Hash::make($request->password);

                $akun->save();
                if ($akun->role == 0){
                    return redirect()->route('tampildosen')->with('toast_success', 'Data Berhasil Tersimpan');
                    }elseif ($akun->role == 1){
                        return redirect()->route('tampiladmin')->with('toast_success', 'Data Berhasil Tersimpan');
                    }elseif ($akun->role == 2){
                        return redirect()->route('tampilverifikator')->with('toast_success', 'Data Berhasil Tersimpan');
                    }elseif ($akun->role == 3){
                        return redirect()->route('tampilreviewer')->with('toast_success', 'Data Berhasil Tersimpan');
                    }
        }
        public function hapusakun($id){
                $data = User::find($id);
                $data->delete();
                // return redirect()->back();
                if ($data->role == 0){
                    return redirect()->route('tampildosen');
                    }elseif ($data->role == 1){
                        return redirect()->route('tampiladmin');
                    }elseif ($data->role == 2){
                        return redirect()->route('tampilverifikator');
                    }elseif ($data->role == 3){
                        return redirect()->route('tampilreviewer');
                    }
        }

        public function updateakun(Request $request, $id){
            $data = User::find($id);
            $data->update($request->all());
             if ($data->role == 0){
                    return redirect()->route('tampildosen')->with('toast_success','Data Berhasil Diupdate');
                    }elseif ($data->role == 1){
                        return redirect()->route('tampiladmin')->with('toast_success','Data Berhasil Diupdate');
                    }elseif ($data->role == 2){
                        return redirect()->route('tampilverifikator')->with('toast_success','Data Berhasil Diupdate');
                    }elseif ($data->role == 3){
                        return redirect()->route('tampilreviewer')->with('toast_success','Data Berhasil Diupdate');
                    }

        }

        public function ubahstatus($id){
            $data = User::find($id);
            $status_sekarang = $data->status;
            if($status_sekarang == 1){
                $data->where('id',$id)->update([
                    'status'=>0

                ]);
            }else{
                $data->where('id',$id)->update([
                    'status'=>1
                ]);
            }
            if ($status_sekarang == 0){

            }

            if ($data->role == 0){
                return redirect()->route('tampildosen');
                }
                elseif ($data->role == 1){
                return redirect()->route('tampiladmin');
                }
                elseif ($data->role == 2){
                return redirect()->route('tampilverifikator');
                }
                elseif ($data->role == 3){
                return redirect()->route('tampilreviewer');
                }

        }

            public function import_excel(Request $request)
                {
            $data = $request->file('file');
            $namafile = $data->getClientOriginalName();
            $data->move('DataDosen', $namafile);

            Excel::import(new DosenImport, \public_path('/DataDosen/'.$namafile));
            return back()->with('toast_success', 'Data Berhasil Diimpor');

        }

        public function ubahpassword(Request $request)
        {
              $this->validate($request, [

              'password' => ['required', 'string', 'min:8', 'confirmed'],
              'current_password' => ['required']
              ]);

            if (Hash::check($request->current_password, auth()->user()->password)){
                auth()->user()->update(['password' =>Hash::make($request->password)]);
                Alert::success('Sukses', 'Password Berhasil Diubah');
                return back();
            }

        throw ValidationException::withMessages([
        'current_password' => 'Password tidak sesuai dengan data password'

    ]);

        }
    }
