<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        //$obats = Obat::latest()->get();
        $obats = Obat::latest()->paginate(10);

        return view('admin.obat.index', compact('obats'));
    }
    public function create()
    {
        return view('admin.obat.create');
    }
    public function store(Request $req)
    {
        $req->validate([
            'nama_obat' => ['required', 'string', 'max:255'],
            'kemasan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
        ]);

        Obat::create($req->all());
        toastr()->success('Obat berhasil ditambahkan');
        return redirect('/admin/obat');
    }
    public function edit($id)
    {
        $obat = Obat::find($id);

        return view('admin.obat.edit', compact('obat'));
    }
    public function update(Request $req, $id)
    {
        $req->validate([
            'nama_obat' => ['required', 'string', 'max:255'],
            'kemasan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
        ]);

        Obat::find($id)->update($req->all());
        toastr()->success('Obat berhasil diperbarui');
        return redirect('/admin/obat');
    }
    public function destroy($id)
    {
        Obat::find($id)->delete();
        toastr()->success('Obat berhasil dihapus');
        return redirect('/admin/obat');
    }
}
