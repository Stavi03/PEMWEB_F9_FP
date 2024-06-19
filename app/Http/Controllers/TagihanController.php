<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTagihanRequest;
use App\Http\Requests\UpdateTagihanRequest;
use Illuminate\Support\Facades\Session;


//import model
use App\Models\sampah_tkmpls;
use App\Models\User;


class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pengguna dengan relasi sampah_tkmpls
        $users = User::with('sampah_tkmpls')->get();

        // Menambahkan pencarian nama user sebelum pengurutan
        if ($search = request('search')) {
            $users = $users->filter(function ($user) use ($search) {
                return str_contains(strtolower($user->nama), strtolower($search));
            });
        }

        // Menambahkan filter bulan dengan optimasi menggunakan whereHas
        if ($bulan = request('bulan')) {
            $users = $users->filter(function ($user) use ($bulan) {
                return $user->sampah_tkmpls->where('bulan', $bulan)->count() > 0;
            });
        }

        // Ambil data sampah_tkmpls berdasarkan filter bulan
        $sampah_tkmpls = sampah_tkmpls::when($bulan, function ($query, $bulan) {
                return $query->where('bulan', $bulan);
            })
            ->get();

        // Kumpulkan data berdasarkan bulan dan hitung total hasil
        $data = $sampah_tkmpls->groupBy('bulan')
            ->map(function ($items) {
                return [
                    'bulan' => $items->first()->bulan,
                    'Hasil' => $items->sum('Hasil')
                ];
            })
            ->values()
            ->toArray();

        // Buat array untuk label (bulan) dan nilai (hasil)
        $labels = array_column($data, 'bulan');
        $values = array_column($data, 'Hasil');

        // Kirim data ke view
        return view('admin.tagihan', [
            "title" => "pengelola",
            'laporanPerBulan' => $data,
            'users' => $users,
            'labels' => json_encode($labels),
            'values' => json_encode($values)
        ]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tagihan $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
//
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();
        return redirect('/admin/tagihan');
    }
}
