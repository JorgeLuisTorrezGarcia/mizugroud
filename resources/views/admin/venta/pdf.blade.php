<!DOCTYPE html>
<html>
<head>
  <style>
    p {
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    body{

      font-family: cursive;
    }
    #main-container{
      margin: 150px auto;
      width: 600px;
    }
    table{
      width: 100%;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      text-align: center;
      border-collapse: collapse;
    }
    th,td{
      padding: 20px;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    thead{
      background-color: #246355;
      color : white;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    tr:nth-child(even){
      background-color: #ddd;
    }
    h2,h3{
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
  </style>
</head>
<body >
  <img src="{{asset('melody/images/cine.svg')}}" width="400" height="150" alt="" class="">
  <h2>FACTURA</h2>
  <h3>Nro. Factura: {{$venta->id}}</h3>
  <h3>Nombre : {{$venta->user->name}}</h3>
  <div>
  <table>
    <thead>
      <tr>
        <th>PELICULA</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
        <th>SUBTOTAL</th>
      </tr>
    </thead>
      
        <tbody>
          @foreach($detalle__ventas as $detalle__venta)        
          <tr>
            <td>{{$detalle__venta->pelicula->titulo}}</td>
            <td>{{$detalle__venta->precio}} BOB.</td>
            <td>{{$detalle__venta->cantidad}}</td>
            <td align="center">{{$detalle__venta->cantidad * $detalle__venta->precio}} BOB.</td>
          </tr>      
          @endforeach
        </tbody>
        <tr>
          <th colspan="3">
              <p align="right">TOTAL: </p>
          </th>
          <th>
              <p> {{number_format($venta->total,2)}}</p>
          </th>
        </tr>
      
  </table>
</div>
</body>
</html>