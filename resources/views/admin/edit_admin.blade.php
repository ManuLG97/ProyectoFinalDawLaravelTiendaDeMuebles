@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="titulogrande">Editar</h1>
        <form class="form-edit-user" id="perfileditar" action="{{route('user.update',$users->id)}}" method="POST">
            @csrf
            @method('PUT')
            <td><strong>Name:  </strong><input type="text" name="name" value="{{$users->name}}">
                <br/><br/><strong>Telefóno:   </strong><input type="number" name="telefon" value="{{$users->telefon}}">
                <br/><br/><strong>Dirección:   </strong><input type="text" name="address" value="{{$users->address}}">
                <br/><br/><strong>Email:   </strong><input type="text" name="email" value="{{$users->email}}">
                <br/><br/><strong>Contraseña: </strong><input type="password" name="password" value="{{$users->password}}">
            </td>
            <br/><br/>
            @foreach($user as $usuario)
                <datalist id="user_id">
                    <option value="{{$usuario->id}}">{{$usuario->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input  type="submit" class="botongris" value="Guardar cambios" onclick="if(!confirm('¿Estas segur/o que quieres modificar?')){return false;};">
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