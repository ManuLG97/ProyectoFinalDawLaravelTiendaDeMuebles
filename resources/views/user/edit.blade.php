@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="titulogrande">Editar</h1>
        <form class="form-edit-user" action="{{route('user.update',$users->id)}}" method="POST">
            @csrf
            @method('PUT')
            <td><label for="name">  Nombre: </label>
                <input type="text" name="name" value="{{$users->name}}">
                <br/>

                <label for="telefon">  Telefono: </label>
                <input  type="text" name="telefon" value="{{$users->telefon}}">
                <br/>

                <label for="address">  Dirección: </label>
                <input type="text" name="address" value="{{$users->address}}">
                <br/>

                <label for="email">  Email: </label>
                <input  type="text" name="email" value="{{$users->email}}">
                <br/>

                <label for="password">  Nueva contraseña: </label>
                <input  type="password" name="password">
                <br/>

            </td>
            <br/><br/>
            @foreach($user as $usuario)
                <datalist id="user_id">
                    <option value="{{$usuario->id}}">{{$usuario->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input  type="submit" class="btn btn-primaryregistrar" value="Guardar cambios" onclick="if(!confirm('¿Estas segur/o que quieres modificar?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>


    <footer>
        <img src="/imagenes/iconos/fb.png" alt="icono facebook"  />
        <img src="/imagenes/iconos/insta.png" alt="icono facebook" />
        <img src="/imagenes/iconos/icono-youtube.png" alt="icono youtube "  />

    </footer>


@endsection