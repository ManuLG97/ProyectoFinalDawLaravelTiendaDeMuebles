@extends('layouts.app_admin')

@section('content')

    <h1 class="titulogrande">Mi perfil</h1><br/>
    @csrf
    <div id="perfil">
        <form class="form-edit-user centrar" action="{{route('user.index')}}" method="POST">
            @csrf
            @method('PUT')
            <table class="table_info">
                <thead>
                @foreach($user as $property)
                    @if($property->id == $usuario)
                        <tr>
                            <td class="centrar_perfil"><strong>Name:  </strong>{{$property->name}}"
                                <br/><br/><strong>Telefóno:   </strong>{{$property->telefon}}"
                                <br/><br/><strong>Dirección:   </strong>{{$property->address}}"
                                <br/><br/><strong>Email:   </strong>{{$property->email}}"
                            </td>
                        </tr>
                    @endif
                @endforeach
                </thead>
            </table>
            <br/>  <br/>
            <a class="botonverde" href="{{route('user.edit',$property->id)}}">Modificar perfil</a>
            <br/>
        </form>
    </div>

    <footer>
        <img src="/imagenes/iconos/fb.png" alt="icono facebook"  />
        <img src="/imagenes/iconos/insta.png" alt="icono facebook" />
        <img src="/imagenes/iconos/icono-youtube.png" alt="icono youtube "  />

    </footer>

@endsection