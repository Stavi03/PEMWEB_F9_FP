<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\sampah_tkmpls;


class sampah_tkmpls extends Model
{
    use HasFactory;

    protected $table = 'sampah_tkmpls';
    protected $fillable = [
        'user_id', 'bulan', 'Berat', 'Hasil'
    ];
    protected $guarded = [];

    public function User(){
        return $this->hasOne(User::class);
    }
}
