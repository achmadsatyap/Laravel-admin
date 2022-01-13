<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_peserta','id_pelatihan','tglbooking',
    ];

    public function pelatihan(){
        return $this -> belongsTo(Pelatihan::class,'id_pelatihan');
    }

    public function peserta(){
        return $this -> belongsTo(Peserta::class,'id_peserta');
    }

}
