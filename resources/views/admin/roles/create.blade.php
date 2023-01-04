@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Registrar Rol</h4>             
                {!! Form::open(['route'=>'roles.store','method'=>'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'NOMBRE') !!}
                        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese el nombre del rol']) !!}
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <h2 class="h3">Lista de permisos</h2>
                    @foreach ($permissions as $permission)
                        <div>
                            <label>
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                                {{$permission->description}}
                            </label>
                        </div>
                        
                    @endforeach
                <button type="submit" class="btn btn-primary mr-2">Crear Rol</button>
                <a href="{{route('roles.index')}}"class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection