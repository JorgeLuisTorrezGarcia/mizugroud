<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $fillable =[
        'cliente_id',
        'user_id',
        'fecha',
        'total',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function detalle__ventas(){
        return $this->hasMany(Detalle_Venta::class,'venta_id');
    }
}
