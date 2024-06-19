<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import model
use App\Models\User;
use App\Models\sampah_tkmpls;

class SampahController extends Controller
{
    public function index()
{
    $users = User::pluck('nama', 'id');
    $sampah = Sampah::with('user')->get();

    return view('admin.input', compact('users, sampah'))->with([
        "title" => "input"
    ]);
}

public function store(Request $request)
{
    $validatedData = $request->all();

    sampah_tkmpls::create($validatedData);

    // Redirect kembali dengan pesan sukses jika berhasil disimpan
    return redirect()->route('admin.index')->with('success', 'Data sampah_tkmpls berhasil disimpan.');
}

}
