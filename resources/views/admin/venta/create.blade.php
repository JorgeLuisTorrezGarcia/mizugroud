@extends('admin')
@section('cont')
        <div>
            <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">

            <div class="card-body">
                <h4 class="card-title">Registrar Ventas</h4>             
                {!! Form::open(['route'=>'ventas.store','method'=>'POST']) !!}
                @can('bitacoras.index')
                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select class="form-control" name="cliente_id" id="cliente_id" autofocus> 
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                @endcan
                <div class="form-group">
                    <label for="pelicula_id">Pelicula</label>
                    <select class="form-control" name="pelicula_id" id="pelicula_id" > 
                        <option value="" disabled selected>Seleccione una pelicula</option>
                        @foreach($peliculas as $pelicula)
                            <option value="{{$pelicula->id}}_{{$pelicula->cantidad_t}}_{{$pelicula->precio}}">{{$pelicula->titulo}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad_t">Tickets</label>
                    <input type="number" name="cantidad_t" id="cantidad_t" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" disabled>
                </div>


                <div class="form-group">
                    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Pelicula</button>
                </div>


                <div class="form-group" >
                    <h4 class="card-title">Detalles de Venta</h4>
                    <div class="table-responsive col-md-12">
                        <table id="detalles" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Eliminar</th>
                                    <th>Pelicula</th>
                                    <th>Precio(BOB)</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        <p aling="right">TOTAL:</p>
                                    </th>
                                    <th>
                                        <p align="right"> <span id="total">BOB 0.00</span> </p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4">
                                        <p align="right">TOTAL PAGAR</p>
                                    </th>
                                    <th>
                                        <p align="right"> <span  id="total_pagar_html">BOB 0.00</span>
                                            <input type="hidden" name="total" id="total_pagar"></p>

                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                    <button type="submit" id="guardar" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('ventas.index')}}"class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}
                
            </div>
        </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $("#agregar").click(function(){
            agregar();
        })
    })
    var cont=1;
    total =0;
    subtotal=[];
    $("#guardar").hide();
    $("#pelicula_id").change(mostrarValores);

    function mostrarValores(){
        datosPelicula=document.getElementById('pelicula_id').value.split('_');
        $("#precio").val(datosPelicula[2]);
        $("#cantidad_t").val(datosPelicula[1]);
    }

    function agregar() {
        datosPelicula=document.getElementById('pelicula_id').value.split('_');
        
        pelicula_id = datosPelicula[0];
        pelicula = $("#pelicula_id option:selected").text();
        cantidad = $("#cantidad").val();
        precio = $("#precio").val();
        cantidad_t =$("#cantidad_t").val();
        if(pelicula_id !="" && cantidad != "" && cantidad > 0 && precio != "" ){
            if(parseInt(cantidad_t) >= parseInt(cantidad)){
                subtotal[cont] = (cantidad*precio);
                total = total +subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' +cont + '); "><iclass="fa fa-time"></i></button></td><td> <input type="hidden" id="pelicula_id[]" name="pelicula_id[]" value="' +pelicula_id + '">' + pelicula +'</td><td><input type="hidden" id="precio[]" name="precio[]" value="' +precio +'"> <input class="form-control"type="number" id="precio[]" value="' +precio + '" disabled></td><td><input type="hidden" name="cantidad[]" value="' +cantidad + '"><input class="form-control" type="number"value="' + cantidad + '" disabled></td><td align="right">s/' + subtotal[cont] + ' </td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type:'error',
                    text:'La cantidad supera la cantidad de tickets.',
                })
            }
        }else {
            Swal.fire({
                type:'error',
                text:'Rellene todos los campos del detalle',
            })
        }
    }

    function limpiar(){
        $("#cantidad").val("");
        $("#precio").val("");
    }

    function totales(){
        $("#total").html("BOB" + total.toFixed(2));
        $("#total_pagar_html").html("BOB" + total.toFixed(2));
        $("#total_pagar").val(total.toFixed(2));
    }

    function evaluar(){
        if(total > 0){
            $("#guardar").show();
        }else {
            $("#guardar").hide();
        }
    }

    function eliminar(index){
        total=total-subtotal[index];
        total_pagar_html=total;
        $("#total").html("BOB" + total);
        $("#total_pagar_html").html("BOB" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila"+ index).remove();
        evaluar();
    }
</script>
@endsection