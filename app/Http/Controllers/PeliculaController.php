<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Http\Requests\StorePeliculaRequest;
use App\Http\Requests\UpdatePeliculaRequest;
use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Horario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeliculaController extends Controller
{
    protected $bitacora;
    public function __construct()
    {
        $this->middleware('can:peliculas.index')->only('index');
        $this->middleware('can:peliculas.create')->only('create','store');
        $this->middleware('can:peliculas.edit')->only('edit','update');
        $this->middleware('can:peliculas.destroy')->only('destroy');
        $this->bitacora=new Bitacora();
    }

    public function index()
    {
        $peliculas = Pelicula::get();
        return view('admin.pelicula.index',compact('peliculas'));
    }

    public function create()
    {
        $categorias = Categoria::get();
        $horarios = Horario::get();
        return view('admin.pelicula.create',compact('categorias', 'horarios'));
    }


    public function store(StorePeliculaRequest $request)
    {
        if($request->hasFile('picture')){
            $file= $request->file('picture');
            $image_name= time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }

        $pelicula = Pelicula::create($request->all()+['image'=>$image_name,]);
        $pelicula->update(['code'=>$pelicula->id]);
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Agregar Pelicula',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('peliculas.index');
    }


    public function show(Pelicula $pelicula)
    {
        return view('admin.pelicula.show',compact('pelicula'));
    }

    
    public function edit(Pelicula $pelicula)
    {
        $categorias = Categoria::get();
        $horarios = Horario::get();
        return view('admin.pelicula.edit',compact('pelicula','categorias','horarios'));
    }

    public function update(UpdatePeliculaRequest $request, Pelicula $pelicula)
    {
        if($request->hasFile('picture')){
            $file= $request->file('picture');
            $image_name= time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }

        $pelicula->update($request->all()+['image'=>$image_name,]);
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Editar Pelicula',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('peliculas.index');
    }


    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Eliminar Pelicula',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('peliculas.index')->with('info','La pelicula se elimino');
    }
}
