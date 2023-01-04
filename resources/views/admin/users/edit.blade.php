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
                <h4 class="card-title">Asignar Rol</h4> 
                    <p class="h5">NOMBRE</p>
                    <p class="form-control">{{$user->name}}</p>   
                <h2 class="h5">Listado de Roles</h2>         
                {!! Form::model($user,['route'=>['users.update',$user],'method'=>'PUT']) !!}
                    @foreach ($roles as $role)
                        <div>>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                    @endforeach
                <button type="submit" class="btn btn-primary mr-2">Asignar Rol</button>
                <a href="{{route('users.index')}}"class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection