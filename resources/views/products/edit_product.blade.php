@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4">Property edit</h1>

        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="" action="{{route('producto.update',$products->id)}}" method="POST">
            @csrf
            @method('PUT')
            Nombre
            <br/>
            <input class="text-info" type="text" name="nombre_producto" value="{{$products->nombre_producto}}">
            <br/> <br/>

            Marca
            <br/>
            <input class="text-info" type="text" name="marca" value="{{$products->marca}}">
            <br/> <br/>

            Tipo mueble
            <br/>
            <input class="text-info" type="text" name="tipo_mueble" value="{{$products->tipo_mueble}}">
            <br/> <br/>

            Descripcion
            <br/>
            <input class="text-info" type="text" name="descripcion" value="{{$products->descripcion}}">
            <br/> <br/>

            Dimensiones
            <br/>
            <input class="text-info" type="text" name="dimensiones" value="{{$products->dimensiones}}">
            <br/> <br/>

            Volum
            <br/>
            <input class="text-info" type="text" name="volum" value="{{$products->volum}}">
            <br/> <br/>

            Oferta
            <br/>
            <input class="text-info" type="number" name="oferta" value="{{$products->oferta}}">
            <br/> <br/>

            Cantidad
            <br/>
            <input class="text-info" type="number" name="cantidad" value="{{$products->cantidad}}">
            <br/> <br/>

            Precio sin montaje
            <br/>
            <input class="valid" type="number" name="precio_sin_montaje" value="{{$products->precio_sin_montaje}}" class="form form-control">
            <br/><br/>

            Precio con montaje
            <br/>
            <input class="valid" type="number" name="precio_con_montaje" value="{{$products->precio_con_montaje}}" class="form form-control">
            <br/><br/>

            Fragil
            <br/>
            <input class="valid" type="number" name="fragil" value="{{$products->fragil}}" class="form form-control">
            <br/><br/>

            Foto
            <br/>
            <input class="valid-photo" type="file" name="foto" value="{{$products->foto}}" class="form form-control">
            <br/>

            @foreach($users as $user)
                <datalist id="user_id">
                    <option value="{{$user->id}}">{{$user->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input class="save" type="submit" class="btn btn-primary" value="Guardar cambios" onclick="if(!confirm('¿Estas segur/o que quieres modificar?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection
