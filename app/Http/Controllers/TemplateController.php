<?php

namespace App\Http\Controllers;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
   
   public function index(){

   // dokumen tanpa dolar = nama database
   $template = Template::all();
   return view('admin\template\tampiltemplate', compact('template'));
   // yang bertanda dolar harus sama dengan isi compact
   }

   public function inserttemplate(Request $request){
   
   $this->validate($request, [
    'namatemplate'=>'required',
    'template'=> 'required',
   ],

   );
   
   $template = $request->file('template');
  
   $nama_template = $template->getClientOriginalName();
 
   $template->move('template', $template->getClientOriginalName());
   $template = new Template;
   $template->template = $nama_template;
   $template->namatemplate = $request->input('namatemplate');
   
   $template->save();

   
   return back()->with('toast_success', 'Data Berhasil Tersimpan');

   }

   public function updatetemplate(Request $request, $id){
    $template = Template::find($id);
    $template->update($request->all());
   if ($request->hasFile('template'))
   {
    $request->file('template')->move('template/', $request->file('template')->getClientOriginalName());
    $template->template = $request->file('template')->getClientOriginalName();
    $template->save();
   }
   return back()->with('toast_success','Data Berhasil Diupdate');
   }

}
