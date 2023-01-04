<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    protected $bitacora;

    public function __construct()
    {
        $this->middleware('can:categorias.index')->only('index');
        $this->middleware('can:categorias.create')->only('create','store');
        $this->middleware('can:categorias.edit')->only('edit','update');
        $this->middleware('can:categorias.destroy')->only('destroy');
        $this->bitacora=new Bitacora();
    }
    public function index()
    {
        
        $categorias = Categoria::get();
        return view('admin.categoria.index',compact('categorias'));
    }

    public function create()
    {
        return view('admin.categoria.create');
    }


    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->all());
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Agregar Categoria',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('categorias.index');
    }


    public function show(Categoria $categoria)
    {
        return view('admin.categoria.show',compact('categoria'));
    }

    
    public function edit(Categoria $categoria)
    {
        return view('admin.categoria.edit',compact('categoria'));
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        
        $categoria->update($request->all());
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Editar Categoria',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('categorias.index');
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Eliminar Categoria',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('categorias.index')->with('info','La categoria se elimino');
    }
}
