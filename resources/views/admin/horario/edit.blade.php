@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Editar Horario</h4>             
                {!! Form::model($horario,['route'=>['horarios.update',$horario],'method'=>'PUT']) !!}
                <div class="form-group">
                    <label for="hr_inicio">HORA DE INICIO</label>
                    <input type="text" name="hr_inicio" id="hr_inicio" value="{{$horario->hr_inicio}}"class="form-control">
                </div>

                <div class="form-group">
                    <label for="hr_fin">HORA DE FIN</label>
                    <input type="text" name="hr_fin" id="hr_fin" value="{{$horario->hr_fin}}"class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="{{route('horarios.index')}}"class="btn btn-light">Cancelar</a>

                {!! Form::close() !!}
            </div>
        </div>
@endsection