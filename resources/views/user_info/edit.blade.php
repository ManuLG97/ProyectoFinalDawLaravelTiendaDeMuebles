@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-6">User edit</h1>
        <form class="form-edit-user" action="{{route('user.update',$usuario->id)}}" method="POST">
            @csrf
            @method('PUT')
            <td><strong>Name:  </strong><input type="text" name="name" value="{{$usuario->name}}">
                <br/><br/><strong>Telefóno:   </strong><input type="number" name="telefon" value="{{$usuario->telefon}}">
                <br/><br/><strong>Dirección:   </strong><input type="text" name="address" value="{{$usuario->address}}">
                <br/><br/><strong>Email:   </strong><input type="text" name="email" value="{{$usuario->email}}">
                <br/><br/><strong>Contraseña: </strong><input type="password" name="password" value="{{$usuario->password}}">
            </td>
            <br/><br/>
            @foreach($user as $users)
                <datalist id="user_id">
                    <option value="{{$users->id}}">{{$users->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input class="save-user" type="submit" class="btn btn-primary" value="Guardar cambios" onclick="if(!confirm('¿Estas segur/o que quieres modificar?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection