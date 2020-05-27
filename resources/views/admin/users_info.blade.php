
@extends('layouts.app_admin')

@section('content')
    <a class="col-lg-12">

        <h1 class="my-4">Usuarios información</h1>
        <div class="perfil">
        @if($message=\Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

        <a href="{{route('admin.users')}}"></a>
        @csrf
        <table class="table_info" >
            <thead>

            <?php
            $admin=\App\User::all();
            ?>
            @foreach($admin as $user)

                <tr>
                    <td> <br/> <p><strong>Nombre:  </strong>{{$user->name}}</p>
                        <p><strong>Telefono:   </strong>{{$user->telefon}}</p>
                        <p><strong>Dirección:   </strong>{{$user->address}}</p>
                        <p><strong>Email:   </strong>{{$user->email}}</p>
                        <p><strong>Contraseña:   </strong><input type="password" value="{{$user->password}}"></p>
                    </td>
                    <td><button><a class="" href="{{route('admin.edit',$user->id)}}">Edit</a></button></td>
                    <td>
                        <form action="{{route('admin.destroy',$user->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button  class="btn-delete" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres borrar?')){return false;};">Delete</button>

                        </form>

                </tr>

            @endforeach

            </thead>
        </table>
        </div>

        </div>

@endsection
