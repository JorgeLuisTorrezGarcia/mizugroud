<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora';

    protected $fillable =[
        'user_id','evento','fecha','ip','detalles',
    ];

}
