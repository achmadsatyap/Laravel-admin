<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table  = "pesertas";
    protected $fillable = [
        'namapeserta', 'email', 'jeniskelamin', 'alamat'
    ];

    public function booking(){
        return $this -> hasMany(Booking::class);
    }

}
