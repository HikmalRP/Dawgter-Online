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
        $req->validate([
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
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
        $req->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $jadwal = JadwalPeriksa::where('id_dokter', Auth::id())->findOrFail($id);
        $jadwal->update([
            'hari' => $req->hari,
            'jam_mulai' => $req->jam_mulai,
            'jam_selesai' => $req->jam_selesai,
            'status' => $req->status,
        ]);

        return redirect('/dokter/jadwal_periksa')->with('success', 'Jadwal berhasil diperbarui.');
    }
}
