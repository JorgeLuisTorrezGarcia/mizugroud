@extends('admin')
@section('cont')
    @if ( session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Editar Rol</h4>    
                {!! Form::model($role,['route'=>['roles.update',$role],'method'=>'PUT']) !!}
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
                <button type="submit" class="btn btn-primary mr-2">Actualizar Rol</button>
                <a href="{{route('roles.index')}}"class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection