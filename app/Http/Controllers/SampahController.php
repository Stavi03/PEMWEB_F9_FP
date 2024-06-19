<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

// import model
use App\Models\User;
use App\Models\sampah_tkmpls;

class SampahController extends Controller
{
    public function index()
{
    $users = User::pluck('nama', 'id'); // Mengambil daftar nama pengguna beserta ID mereka

    return view('admin.input', compact('users'))->with([
        "title" => "input"
    ]);
}

public function store(Request $request)
{
    // dd($request->all());
    // Validasi data yang dikirim dari form
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'bulan' => 'required',
        'Berat' => 'required',
        'Hasil' => 'required',
    ]);

    // Simpan data ke dalam database menggunakan model sampah_tkmpls
    $sampah_tkmpls = new sampah_tkmpls;
    $sampah_tkmpls->user_id = $request->input('user_id');
    $sampah_tkmpls->bulan = $request->input('bulan');
    $sampah_tkmpls->Berat = $request->input('Berat');
    $sampah_tkmpls->Hasil = $request->input('Hasil');
    $sampah_tkmpls->save();
    // Redirect kembali dengan pesan sukses jika berhasil disimpan
    return redirect()->route('/admin')->with('success', 'Data sampah_tkmpls berhasil disimpan.');
}

}
