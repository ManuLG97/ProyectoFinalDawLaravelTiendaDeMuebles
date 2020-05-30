@extends('layouts.app')

@section('content')

    <h1 class="titulograndemiperfil">Mi perfil</h1><br/>
    @csrf
    <div id="perfil">
        <form class="form-edit-user centrar" action="{{route('user.index')}}" method="POST">
            @csrf
            @method('PUT')
            <table class="table_info">
                <thead>
                @foreach($users as $user)
                    @if($user->id == $usuario)
                        <tr>
                            <td class="centrar_perfil"><strong>Name:  </strong>{{$user->name}}"
                                <br/><br/><strong>Telefóno:   </strong>{{$user->telefon}}"
                                <br/><br/><strong>Dirección:   </strong>{{$user->address}}"
                                <br/><br/><strong>Email:   </strong>{{$user->email}}"
                            </td>
                        </tr>
                    @endif
                @endforeach
                </thead>
            </table>
            <br/>  <br/>
            <a class="btn btn-primaryregistrar" href="{{route('user.edit',['user'=>Auth::user()])}}">Modificar perfil</a>
            <br/>
        </form>
    </div>

    <footer>
        <img src="/imagenes/iconos/fb.png" alt="icono facebook"  />
        <img src="/imagenes/iconos/insta.png" alt="icono facebook" />
        <img src="/imagenes/iconos/icono-youtube.png" alt="icono youtube "  />

    </footer>

@endsection