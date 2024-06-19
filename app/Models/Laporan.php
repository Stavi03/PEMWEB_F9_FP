<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tagihan;
use App\Models\User;
use App\Models\sampah_tkmpls;


class Laporan extends Model
{
    use HasFactory;

protected $fillable = [
'tagihan_id',
    'tanggal',
];

protected $guarded = ['id'];

public function sampah_tkmpls()
{
    return $this->belongsTo(sampah_tkmpls::class);
}
}

