<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class KelolaPoliController extends Controller
{
    public function index()
    {
        $polis = Poli::latest()->paginate(10);

        return view('admin.mengelola_poli.index', compact('polis'));
    }
    public function create()
    {
        return view('admin.mengelola_poli.create');
    }
    public function store(Request $req)
    {
        $req->validate([
            'nama_poli' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);

        Poli::create($req->all());

        toastr()->success('Poli berhasil ditambahkan');
        return redirect('/admin/mengelola_poli');
    }
    public function edit($id)
    {
        $poli = Poli::find($id);

        return view('admin.mengelola_poli.edit', compact('poli'));
    }
    public function update(Request $req, $id)
    {
        $req->validate([
            'nama_poli' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);

        Poli::find($id)->update($req->all());

        toastr()->success('Poli berhasil diperbarui');
        return redirect('/admin/mengelola_poli');
    }
    public function destroy($id)
    {
        Poli::find($id)->delete();
        toastr()->success('Poli berhasil dihapus');
        return redirect('/admin/mengelola_poli');
    }
}
