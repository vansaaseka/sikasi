<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //Tampil template
    public function index()
    {
        $template = Template::all();
        return view('admin\Template\tampiltemplate', compact('template'));
    }

  //tampiltambahtemplate
    public function create()
    {
        $category = Kategori::all();
        return view('admin\Template\tambahtemplate', compact('category'));
    }

   //post tambah template
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'namadraf' => 'required',
        //     'filedraf' => 'required|mimes:doc,docx,rtf',
        //     'deskripsi' => 'required',
        // ]);

        $draf = Template::create($request->all());
        if ($request->hasFile('filedraf')) {
            $request->file('filedraf')->move('filedrafkerjasama/', $request->file('filedraf')->getClientOriginalName());
            $draf->filedraf = $request->file('filedraf')->getClientOriginalName();
            $draf->save();
    
        }
        return redirect()->route('template')->with('success', 'Data Berhasil Ditambahkan');
        }
        
    


//Detail
    public function show(Template $template)
    {
    
    }

    //tampil edit template
    public function edit(Template $template)
    {   $category = Kategori::all();
        return view('admin\Template\edittemplate', compact('template','category'));
    }

   //post edit template
    public function update(Request $request, Template $template)
    {
        $this->validate($request, [
            'kategori_id' => 'required',
            'filedraf' => 'required|mimes:doc,docx,rtf',
            'deskripsi' => 'required',
        ]);

        $draf = Template::find($template->id);
        $draf->update($request->all());
        if ($request->hasFile('filedraf')) 
            {
                $request->file('filedraf')->move('filedrafkerjasama/', $request->file('filedraf')->getClientOriginalName());
                $draf->filedraf = $request->file('filedraf')->getClientOriginalName();
                $draf->save();
            }
        return redirect('template')->with('toast_success','Data Berhasil Diupdate');
        }
        
   
    // public function destroy(Template $template)
    // {
    //     // $template->delete();
    //     Template::destroy($template->id);
    //     return redirect('template')->with('toast_success','Data Berhasil Dihapus');
    // }

    public function hapustemplate($id){
        $template = Template::find($id);
        $template->delete();
        return redirect('template')->with('toast_success','Data Berhasil Dihapus');
        }
   
        public function unduhtemplate()
        {
            $template = Template::all();
            return view('dosen/unduhtemplate/unduh', compact('template'));
        }
}
