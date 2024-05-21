<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class NomorMitraController extends Controller
{
    public function update(Request $request, $id)
    {
        $mitra = Mitra::findOrFail($id);
        $request->validate(['nomor' => 'required']);
        // Debug input value
        // dd($request->all());

        $mitra->update(['nomor' => $request->input('nomor')]);

        return redirect()->back()->with('success', 'Nomor mitra ditambahkan');
    }

}
