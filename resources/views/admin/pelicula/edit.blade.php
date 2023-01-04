@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Editar Pelicula</h4>             
                {!! Form::model($pelicula,['route'=>['peliculas.update',$pelicula],'method'=>'PUT','files'=>true]) !!}
                <div class="form-group">
                    <label for="titulo">TITULO</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{$pelicula->titulo}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">DESCRIPCION</label>
                    <input type="text" name="descripcion" id="descripcion" 
                    value="{{$pelicula->descripcion}}"
                    class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="idioma">IDIOMA</label>
                    <input type="text" name="idioma" id="idioma" class="form-control" value="{{$pelicula->idioma}}" >
                </div>
                <div class="form-group">
                    <label for="cantidad_t">CANTIDAD</label>
                    <input type="number" name="cantidad_t" id="cantidad_t" class="form-control"  value="{{$pelicula->cantidad_t}}">
                </div>

                <div class="form-group">
                    <label for="precio">PRECIO :BS</label>
                    <input type="number" name="precio" id="precio" class="form-control" 
                    value="{{$pelicula->precio}}" >
                </div>
                <div class ="form-group">
                    <label for="categoria_id">CATEGORIA</label>
                    <select class="form-control" name="categoria_id" id="categoria_id">         
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}"
                        @if($categoria->id == $pelicula->categoria_id)
                        selected
                        @endif
                        >{{$categoria->nombre}}</option>
                    @endforeach
                    </select> 
                </div>
                <div class ="form-group">
                    <label for="horario_id">HORARIO</label>
                    <select class="form-control" name="horario_id" id="horario_id">       
                    @foreach ($horarios as $horario)
                    <option value="{{$horario->id}}"
                        @if($horario->id == $pelicula->horario_id)
                        selected
                        @endif>
                        {{$horario->hr_inicio}}:
                        {{$horario->hr_fin}}</option>
                    @endforeach
                    </select>   
                </div>
            {{--- <div class="custom-file mb-8">
                    <input type="file" class="custom-file-input"name="image" id="image" lang="es">
                    <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                </div>---}}

                <div class="card-body">
                    <h4 class="card-title d-flex">Imagen de la pelicula
                        <small class="mi-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light"
                            target="_blank"></a>
                        </small>
                    </h4>
                    <input type="file" name="picture" id="picture" class="dropify"/>

                </div>
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="{{route('peliculas.index')}}"class="btn btn-light">Cancelar</a>

                {!! Form::close() !!}
            </div>
        </div>
@endsection
@section('scripts')
<script src="{{asset('melody/js/dropify.js')}}"></script>
@endsection