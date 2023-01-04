const { parseInt } = require("lodash");

$(document).ready(function(){
    $("#agregar").click(function(){
        agregar();
    });
});

var cont=0;
total= 0;
subtotal=[];

$("#guardar").hide();

function agregar(){
    pelicula_id = $("#pelicula_id").val();
    pelicula = $("#pelicula_id option:selected").text();
    cantidad = $("#cantidad").val();
    precio = $("#precio").val();

    if(pelicula_id !="" && cantidad != "" && cantidad > 0 && precio != "" ){
        subtotal[cont] =cantidad*precio;
        total =total+subtotal[cont];
        var fila ='<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' +cont + '); "><i class="fa fa-time"></i></button></td><td> <input type="hidden" id="pelicula_id[]" value="' +pelicula_id + '">' + pelicula +'</td><td><input type="hidden" id="precio[]" name="precio[]" value="' +precio +'"> <input  class="form-control" type="number" id="precio[]" value="' +precio + '" disabled></td><td><input type="hidden" name="cantidad[]" value="' +cantidad + '"><input class="form-control" type="number" value="' + cantidad + '" disabled></td><td align="right">s/' + subtotal[cont] + ' </td></tr>';

        cont++;
        limpiar();
        totales;
        evaluar();
        $("#detalles").append(fila);
    }   else {
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
    if(total>0){
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
    pelicula_id = $("#pelicula_id").val();
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
    }   else {
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
    if(total>0){
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

