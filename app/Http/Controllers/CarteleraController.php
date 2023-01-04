<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Bitacora;

class CarteleraController extends Controller
{
    protected $pelicula,$bitacora;
    public function __construct()
    {
        $this->bitacora = new Bitacora();
    }
    public function index()
    {
        $peliculas=Pelicula::all();
        return view('admin.carteleras.index',compact('peliculas'));
    }

}
