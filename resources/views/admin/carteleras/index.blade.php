<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cartelera</title>
</head>
<style>
    body{
        background-color: black;
    }

</style>
<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="{{asset('melody/images/cine.svg')}}" width="300" height="100" alt="">
                    <strong>CARTELERA</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collaps">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    @can('bitacoras.index')
                    <a href="users" class="btn btn-success">Panel Admin</a>
                    @endcan
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row row-cols1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($peliculas as $pelicula)
                <div class="col">
                    <div class="card shadow-sm">
                                <img src="{{asset('image/'.$pelicula->image)}}" width="419" height="500">
                        <div class="card-body">
                            <h5 class="card-title">{{$pelicula->titulo}}</h5>   
                            <h6 class="card-title">Hora: {{$pelicula->horarios->hr_inicio}}-{{$pelicula->horarios->hr_fin}}</h6>                     
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('ventas.create')}}" class="btn btn-success">Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </main>
{{--    @foreach ($peliculas as $pelicula)
        <tr>
            <td>{{$pelicula->titulo}}</td>
            <td>{{$pelicula->descripcion}}</td>
            <td>{{$pelicula->horarios->hr_inicio}}:{{$pelicula->horarios->hr_fin}}</td>
            <td>{{$pelicula->cantidad_t}}</td>
            <td>{{$pelicula->precio}}</td>
            <img src="{{asset('image/'.$pelicula->image)}}" width="130" height="150">
            
        </tr>
    @endforeach--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>