<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_katagori','namapelatihan','tglpelatihan','lokasipelatihan',
    ];

    public function katagori() {
        return $this -> belongsTo(Katagori::class,'id_katagori');
    }
}
