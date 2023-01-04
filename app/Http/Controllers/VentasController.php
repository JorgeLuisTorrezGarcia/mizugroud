<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Cliente;
use App\Http\Requests\StoreVentasRequest;
use App\Http\Requests\UpdateVentasRequest;
use App\Models\Bitacora;
use App\Models\Detalle_Venta;
use App\Models\Pelicula;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;



class VentasController extends Controller
{
    protected $bitacora, $detalle__ventas;
    public function __construct()
    {
        $this->middleware('can:ventas.index')->only('index');
        $this->middleware('can:ventas.create')->only('create','store');
        $this->middleware('can:ventas.edit')->only('edit','update');
        $this->middleware('can:ventas.destroy')->only('destroy');
        $this->bitacora = new Bitacora();
        $this->detalle__ventas = new Detalle_Venta();
    }

    public function index()
    {
        $ventas = Ventas::get();
        return view('admin.venta.index',compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::get();
        $peliculas = Pelicula::get();
        return view('admin.venta.create',compact('clientes','peliculas'));
    }


    public function store(StoreVentasRequest $request)
    {   
        if($request->cliente_id == null){
            $venta =Ventas::create($request->all()+[
                'cliente_id'=>'1',
                'user_id'=>Auth::user()->id,
                'fecha'=>Carbon::now('America/La_Paz'),
            ]);
        }else{
        $venta =Ventas::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'fecha'=>Carbon::now('America/La_Paz'),
        ]);
        }
        foreach ($request->pelicula_id as $key => $pelicula){
            $results[]=array("pelicula_id"=>$request->pelicula_id[$key],"cantidad"=>$request->cantidad[$key],
            "total"=>$request->total[$key],"precio"=>$request->precio[$key]);
        }
        //dd($results);
        $venta->detalle__ventas()->createMany($results);
        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->bitacora->create([
            'user_id'=>Auth::user()->id,
            'evento'=>'Se realizo una Venta',
            'fecha'=>Carbon::now('America/La_Paz'),
            'ip'=>$ip,
            'detalles'=>$detalles,
        ]);
        return redirect()->route('ventas.index');
    }


    public function show(Ventas $venta)
    {
        $subtotal=0;
        $detalle__ventas = $venta->detalle__ventas;
        foreach($detalle__ventas as $detalle__venta){
            $subtotal+=$detalle__venta->cantidad*$detalle__venta->precio;
        }
        return view('admin.venta.show',compact('venta','detalle__ventas','subtotal'));
    }

    
    public function edit(Ventas $venta)
    {
        $peliculas = Pelicula::get();
        return view('admin.venta.show',compact('venta'));
    }

    public function update(UpdateVentasRequest $request, Ventas $venta)
    {
       // $venta->update($request->all());
        //return redirect()->route('ventas.index');
    }


    public function destroy(Ventas $venta)
    {
        //$venta->delete();
        //return redirect()->route('ventas.index');
    }

    public function pdf(Ventas $venta)
    {
        $subtotal=0;
        $detalle__ventas = $venta->detalle__ventas;
        foreach($detalle__ventas as $detalle__venta){
            $subtotal+=$detalle__venta->cantidad*$detalle__venta->precio;
        }
        $pdf = PDF::loadView('admin.venta.pdf', compact('venta','subtotal','detalle__ventas'));
        return $pdf->download('Reporte_de_venta_'.$venta->id.'.pdf');
    }
}
