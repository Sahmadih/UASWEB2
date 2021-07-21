<?php

namespace App\Http\Controllers;

use App\Makul;
use App\Mahasiswa;
use App\Nilai;
use Illuminate\Http\Request;
Use Alert;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = nilai::with(['mahasiswa', 'makul'])->get();        
        return view('nilai.index', compact('nilai'));
    }
    public function create()
    {
        $makul = makul::all();
        $mahasiswa = mahasiswa::all();
        return view('nilai.create', compact('makul', 'mahasiswa'));
    } 
    public function store(Request $request)
    {
        nilai::create($request->all());
        alert()->success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('nilai');
    }

    public function edit(Request $request, $id)
    {
        $makul = makul::all();
        $mahasiswa = mahasiswa::all();
        $nilai = nilai::find($id);
        return view('nilai.edit', compact('nilai', 'makul', 'mahasiswa'));
    }
    public function update(Request $request, $id)
    {
        $nilai = nilai::find($id);
        $nilai->update($request->all());
        toast('Data Berhasil Diedit', 'success');
        return redirect()->route('nilai');
               
    }
    public function destroy(Request $request, $id)
    {
        $nilai = nilai::find($id);
        $nilai->delete();
        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('nilai'); 
    }
}