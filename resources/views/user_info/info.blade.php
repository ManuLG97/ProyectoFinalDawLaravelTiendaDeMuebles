

@extends('layouts.app')

@section('content')

    <h1 class="my-4">Mi perfil</h1><br/>
    @csrf
        <form class="form-edit-user" action="{{route('user.index')}}" method="POST">
            @csrf
            @method('PUT')
            <table class="table_info">
                <thead>
        @foreach($user as $property)
        @if($property->id == $usuario)
        <tr>
               <td><strong>Name:  </strong>{{$property->name}}"
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
   <button  class="modify" type="submit"><a class="modify" href="{{route('user.edit',$property->id)}}">Modificar perfil</a></button>
    <br/>
     </form>

    </div>

    @endsection