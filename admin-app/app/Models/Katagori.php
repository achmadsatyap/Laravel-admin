<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Katagori extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','namakatagori',
    ];
    
    public function pelatihan(){
        return $this -> hasMany(pelatihan::class);
    }

}
