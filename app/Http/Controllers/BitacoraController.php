<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;




class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:bitacoras.index')->only('index');
    }
    public function index()
    {
        $bitacoras = Bitacora::all();
        $users = User::all();
        return view('admin.bitacoras.index',compact('bitacoras','users'));
    }

}
