<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
    protected $bitacora;

    public function __construct()
    {
        $this->middleware('can:horarios.index')->only('index');
        $this->middleware('can:horarios.create')->only('create','store');
        $this->middleware('can:horarios.edit')->only('edit','update');
        $this->middleware('can:horarios.destroy')->only('destroy');
        $this->bitacora = new Bitacora();
    }
    public function index()
    {
        $horarios = Horario::get();
        return view('admin.horario.index',compact('horarios'));
    }

    public function create()
    {
        return view('admin.horario.create');
    }


    public function store(StoreHorarioRequest $request)
    {

        Horario::create($request->all());
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Agregar Horario',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('horarios.index');
    }


    public function show(Horario $horario)
    {
        return view('admin.horario.show',compact('horario'));
    }

    
    public function edit(Horario $horario)
    {
        return view('admin.horario.edit',compact('horario'));
    }

    public function update(UpdateHorarioRequest $request, Horario $horario)
    {
        $horario->update($request->all());
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Editar Horario',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('horarios.index');
    }


    public function destroy(Horario $horario)
    {
        $horario->delete();
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Eliminar Horario',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('horarios.index')->with('info','El horario se elimino');
    }
}
