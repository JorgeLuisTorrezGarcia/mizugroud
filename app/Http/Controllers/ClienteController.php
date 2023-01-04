<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    protected $bitacora;
    public function __construct()
    {
        $this->middleware('can:clientes.index')->only('index');
        $this->middleware('can:clientes.create')->only('create','store');
        $this->middleware('can:clientes.edit')->only('edit','update');
        $this->middleware('can:clientes.destroy')->only('destroy');
        $this->bitacora=new Bitacora();
    }

    public function index()
    {
        $clientes = Cliente::get();
        return view('admin.cliente.index',compact('clientes'));
    }

    public function create()
    {
        return view('admin.cliente.create');
    }


    public function store(StoreClienteRequest $request)
    {
        Cliente::create($request->all());
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Agregar Cliente',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('clientes.index');
    }


    public function show(Cliente $cliente)
    {
        return view('admin.cliente.show',compact('cliente'));
    }

    
    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit',compact('cliente'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Editar Cliente',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('clientes.index');
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Eliminar Cliente',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('clientes.index')->with('info','El cliente se elimino');
    }
}
