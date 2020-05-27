
@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

       <h1 class="my-6">Editar usuario</h1>
        <div class="perfildos">

        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form class="form-edit-user" action="{{route('admin.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            Nombre
            <br/>
            <input class="edit-user" type="text" name="name" value="{{$user->name}}">
            <br/><br/>
            Telefono
            <br/>
            <input class="edit-user" type="text" name="telefon" value="{{$user->telefon}}">
            <br/><br/>
            Dirección
            <br/>
            <input class="edit-user" type="text" name="address" value="{{$user->address}}">
            <br/><br/>
            Email
            <br/>
            <input class="edit-user" type="text" name="email" value="{{$user->email}}">
            <br/><br/>
            Contraseña
            <br/>
            <input class="edit-user" type="password" name="password" value="{{$user->password}}">
            <br/><br/>



            <br/>
            <input class="save-user" type="submit" class="btn btn-primary" value="Guardar cambios" onclick="if(!confirm('¿Estas segur/o que quieres modificar?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>
    </div>

@endsection

