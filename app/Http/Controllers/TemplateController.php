<?php

namespace App\Http\Controllers;
use App\Models\Template;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TemplateController extends Controller
{

   public function index(){

   // dokumen tanpa dolar = nama database
   $template = Template::all();
   return view('admin\template\tampiltemplate', compact('template'));
   // yang bertanda dolar harus sama dengan isi compact
   }

   public function inserttemplate(Request $request){


   $validasi = Validator::make($request->all(),[
      'namatemplate'=>'required',
      'template'=> 'required|mimes:docx',
   ],

   );
   if($validasi->fails()) {
   Alert::warning('Warning', 'Mohon isikan data dengan benar!');
   return redirect()->back();
   }
   else {

   $template = $request->file('template');

   $nama_template = $template->getClientOriginalName();

   $template->move('template', $template->getClientOriginalName());
   $template = new Template;
   $template->template = $nama_template;
   $template->namatemplate = $request->input('namatemplate');

   $template->save();


   return back()->with('toast_success', 'Data Berhasil Tersimpan');

   }
}

   public function updatetemplate(Request $request, $id){

    $validasi = Validator::make($request->all(),[

    'template'=> 'required|mimes:docx',
    ],

         );
         if($validasi->fails()) {
         Alert::warning('Warning', 'Mohon isikan data dengan benar!');
         return redirect()->back();
         }
         else {

    $template = Template::find($id);
    $template->update($request->all());
   if ($request->hasFile('template'))
   {
    $request->file('template')->move('template/', $request->file('template')->getClientOriginalName());
    $template->template = $request->file('template')->getClientOriginalName();
    $template->save();
   }
   return back()->with('toast_success','Data Berhasil Diupdate');
   }}

}
