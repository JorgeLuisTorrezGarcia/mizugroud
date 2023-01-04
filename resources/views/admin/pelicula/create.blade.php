@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Registro de Peliculas</h4>             
                {!! Form::open(['route'=>'peliculas.store','method'=>'POST','files'=>true]) !!}
                <div class="form-group">
                    <label for="titulo">TITULO</label>
                    <input type="text" name="titulo" id="titulo" class="form-control"  placeholder="Titulo">
                </div>
                <div class="form-group">
                    <label for="descripcion">DESCRIPCION</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control"  placeholder="Descripcion">
                </div>
                <div class="form-group">
                    <label for="idioma">IDIOMA</label>
                    <input type="text" name="idioma" id="idioma" class="form-control"  placeholder="Idioma">
                </div>
                <div class="form-group">
                    <label for="cantidad_t">CANTIDAD DE TICKETS</label>
                    <input type="number" name="cantidad_t" id="cantidad_t" class="form-control"  placeholder="Cantidad">
                </div>

                <div class="form-group">
                    <label for="precio">PRECIO :BS</label>
                    <input type="number" name="precio" id="precio" class="form-control"  placeholder="Precio">
                </div>
                <div class ="form-group">
                    <label for="categoria_id">CATEGORIA</label>
                    <select class="form-control" name="categoria_id" id="categoria_id">         
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                    </select> 
                </div>
                <div class ="form-group">
                    <label for="horario_id">HORARIO</label>
                    <select class="form-control" name="horario_id" id="horario_id">       
                    @foreach ($horarios as $horario)
                    <option value="{{$horario->id}}">{{$horario->hr_inicio}}-{{$horario->hr_fin}}</option>
                    @endforeach
                    </select>   
                </div>
                <div class="card-body">
                    <h4 class="card-title d-flex">Imagen de la pelicula
                        <small class="mi-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light"
                            target="_blank"></a>
                        </small>
                    </h4>
                    <input type="file" name="picture" id="picture" class="dropify"/>

                </div>
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('peliculas.index')}}"class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection
@section('scripts')
<script src="{{asset('melody/js/dropify.js')}}"></script>
@endsection