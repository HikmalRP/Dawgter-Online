<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();
        $jadwal_periksas = JadwalPeriksa::where('id_dokter', $dokterId)->latest()->paginate(10);
        return view('dokter.jadwal_periksa.index', compact('jadwal_periksas'));
    }

    public function create()
    {
        return view('dokter.jadwal_periksa.create');
    }

    public function store(Request $req)
    {
        // Ubah input menjadi format H:i:s
        $req->merge([
            'jam_mulai' => $req->jam_mulai . ':00',
            'jam_selesai' => $req->jam_selesai . ':00',
        ]);

        $req->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i:s',
            'jam_selesai' => 'required|date_format:H:i:s',
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Auth::id(),
            'hari' => $req->hari,
            'jam_mulai' => $req->jam_mulai,
            'jam_selesai' => $req->jam_selesai,
            'status' => 'tidak aktif', // default status
        ]);

        return redirect('/dokter/jadwal_periksa')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal_periksa = JadwalPeriksa::where('id_dokter', Auth::id())->findOrFail($id);
        return view('dokter.jadwal_periksa.edit', compact('jadwal_periksa'));
    }

    public function update(Request $req, $id)
    {
        if ($req->filled('jam_mulai')) {
            $req->merge(['jam_mulai' => $req->jam_mulai . ':00']);
        }

        if ($req->filled('jam_selesai')) {
            $req->merge(['jam_selesai' => $req->jam_selesai . ':00']);
        }

        $req->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'nullable|date_format:H:i:s',
            'jam_selesai' => 'nullable|date_format:H:i:s',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $jadwal = JadwalPeriksa::where('id_dokter', Auth::id())->findOrFail($id);

        $jadwal->hari = $req->hari;
        $jadwal->status = $req->status;

        if ($req->filled('jam_mulai')) {
            $jadwal->jam_mulai = $req->jam_mulai;
        }

        if ($req->filled('jam_selesai')) {
            $jadwal->jam_selesai = $req->jam_selesai;
        }

        $jadwal->save();

        return redirect('/dokter/jadwal_periksa')->with('success', 'Jadwal berhasil diperbarui.');
    }
}
