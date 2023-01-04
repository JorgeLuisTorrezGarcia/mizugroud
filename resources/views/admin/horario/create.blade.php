@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Registrar Horarios</h4>             
                {!! Form::open(['route'=>'horarios.store','method'=>'POST']) !!}
                <div class="form-group">
                    <label for="hr_inicio">Hora de inicio</label>
                    <input type="time" name="hr_inicio" id="hr_inicio" class="form-control" >
                </div>
                
                <div class="form-group">
                    <label for="hr_fin">Hora de fin</label>
                    <input type="time" name="hr_fin" id="hr_fin" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{route('horarios.index')}}"class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection