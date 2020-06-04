
        @extends('layouts.app_admin')

        @section('content')
            <a class="col-lg-12">

                <h1 class="my-5"><strong>Usuarios información</strong></h1>
                <div class="perfil">
                    @if($message=\Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                    @endif

                    <a href="{{route('admin.users')}}"></a>
                    @csrf
                    <table class="table_info" >

                        <tr>
                            <td colspan="14" class="tablastdtitulolista"> <h2> <strong> Lista Usuarios </strong> </h2></td>
                        </tr>

                        <tr> <td class="tablastdtitulo">Informacion</td>    <td class="tablastdtitulo">Editar</td> <td class="tablastdtitulo">Eliminar</td>   <tr>

                        <?php
                        $admin=\App\User::all();
                        ?>
                        @foreach($admin as $user)
                            @if($user->email!="admin@example.com")
                            <tr class="tablas">
                                <td class="tablastd"> <br/> <p><strong>Nombre:  </strong>{{$user->name}}</p>
                                    <p><strong>Telefono:   </strong>{{$user->telefon}}</p>
                                    <p><strong>Dirección:   </strong>{{$user->address}}</p>
                                    <p><strong>Email:   </strong>{{$user->email}}</p>
                                </td>

                                <td class="tablastd"><button class="btn-primaryregistrar"><a class="" href="{{route('admin.edit',$user->id)}}">Editar</a></button></td>
                                <td class="tablastd">
                                    <form action="{{route('admin.destroy',$user->id)}}" method="POST" style="">
                                        @csrf
                                        @method("DELETE")
                                        <button  class="btn-primaryeliminar" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres borrar?')){return false;};">Eliminar</button>

                                    </form>

                            </tr>

                            @endif
                        @endforeach



                    </table>

                </div>

                </div>

@endsection

