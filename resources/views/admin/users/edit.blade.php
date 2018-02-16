@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Datos personales</h3>
            </div>
            <div class="box-body">
                @if ($errors->any())
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}
                    
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{old('email',$user->email)}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        <span class="help-block">Dejar en blanco para no cambiar la contraseña</span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Repite la Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar usuario</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Roles</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('admin.users.rol.update', $user) }}" method="POST">
                    {{ csrf_field()}} {{ method_field('PUT')}}
                    @foreach ($roles as $rol)
                        <div class="checkbox">
                            <label>
                                <input name="roles[]" type="checkbox" value="{{ $rol->name }}" 
                                {{ $user->roles->contains($rol->id)? 'checked' : '' }}>
                                {{ $rol->name }} <br>
                                <samll class="text-muted">{{ $rol->permissions->pluck('name')->implode(', ') }}</samll>
                            </label>
                        </div>
                        
                    @endforeach
                    <button class="btn btn-primary btn-block">Actualizar roles</button>
                </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Permisos</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
                    {{ csrf_field()}} {{ method_field('PUT')}}
                    @foreach ($permissions as $id => $name)
                        <div class="checkbox">
                            <label>
                                <input name="permissions[]" type="checkbox" value="{{ $name }}" 
                                {{ $user->permissions->contains($id)? 'checked' : '' }}>
                                {{ $name }}
                            </label>
                        </div>
                        
                    @endforeach
                    <button class="btn btn-primary btn-block">Actualizar permisos</button>
                </form>
            </div>

            
        </div>
    </div>
</div>
@endsection