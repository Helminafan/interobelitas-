<?php

namespace App\Http\Controllers\backend;
use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function barangView()
    {
        // $allDataUser = User::all();
        $data['allDataBarang'] = Barang::all();
        return view('backend.barang.view_barang', $data);
    }
}
