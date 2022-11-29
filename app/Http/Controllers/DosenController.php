<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function view_dosen()
    {
        $dosen = Dosen::all();
        return view('backend.dosen.view_dosen', compact('dosen'));
    }
    public function edit_dosen($id)
    {
        $editData = Dosen::Find($id);
        return view('backend.dosen.edit_dosen', compact('editData'));
    }
    public function update_dosen(Request $request, $id)
    {
        $data = Dosen::Find($id);
        $data->nip = $request->nip;
        $data->namaDsn = $request->namaDsn;
        $data->alamatDsn = $request->alamatDsn;

        $data->save();
        return redirect()->route('dosen.view')->with('info', 'Update User Berhasil');
    }
}
