
@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

       <h1 class="my-5">Editar usuario</h1>
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
            <label for="name">  Nombre: </label>
            <input class="edit-user" type="text" name="name" value="{{$user->name}}">
            <br/><br/>

            <label for="telefon">  Telefono: </label>
            <input class="edit-user" type="text" name="telefon" value="{{$user->telefon}}">
            <br/><br/>

            <label for="address">  Dirección: </label>
            <input class="edit-user" type="text" name="address" value="{{$user->address}}">
            <br/><br/>

            <label for="email">  Email: </label>
            <input class="edit-user" type="text" name="email" value="{{$user->email}}">
            <br/><br/>

            <label for="password">   Nueva contraseña: </label>
            <input class="edit-user" type="password" name="password">
            <br/><br/>



            <br/>
            <input class="btn btn-primaryregistrar" type="submit"  value="Guardar" onclick="if(!confirm('¿Estas segur/o que quieres modificar?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>
    </div>

@endsection

