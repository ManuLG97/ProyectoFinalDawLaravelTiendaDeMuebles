@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-5">Editar producto</h1>

        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-propertie centrar" action="{{route('producto.update',$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="nombre_producto">Nombre:</label>
            <input class="text-info" type="text" name="nombre_producto" value="{{$products->nombre_producto}}">
            <br/>

            <label for="marca">Marca: </label>
            <input class="text-info" type="text" name="marca" value="{{$products->marca}}">
            <br/>

            <label for="tipo_mueble"> Tipo mueble: </label>
            <input class="text-info" type="text" name="tipo_mueble" value="{{$products->tipo_mueble}}">
            <br/>


            <label for="tipo_mueble"> Descripcion: </label>
            <input class="text-info" type="text" name="descripcion" value="{{$products->descripcion}}">
            <br/>

            <label for="dimensiones"> Dimensiones: </label>
            <input class="text-info" type="text" name="dimensiones" value="{{$products->dimensiones}}">
            <br/>

            <label for="volum"> Volum: </label>
            <input class="text-info" type="text" name="volum" value="{{$products->volum}}">
            <br/>

            <label for="oferta"> Oferta: </label>
            <input class="text-info" type="number" name="oferta" value="{{$products->oferta}}">
            <br/>


            <label for="cantidad"> Cantidad: </label>
            <input class="text-info" type="number" name="cantidad" value="{{$products->cantidad}}">
            <br/>

            <label for="precio_sin_montaje"> Precio: </label>

            <input class="valid" type="number" name="price" value="{{$products->price}}" class="form form-control">
            <br/>

            <label for="precio_con_montaje"> Precio con montaje: </label>

            <input class="valid" type="number" name="precio_con_montaje" value="{{$products->precio_con_montaje}}" class="form form-control">
            <br/>

            <label for="fragil"> Fragil: </label>
            <input class="valid" type="number" name="fragil" value="{{$products->fragil}}" class="form form-control">
            <br/>

            <label for="foto"> Foto: </label>
            <input class="valid-photo" type="file" name="foto" value="{{$products->foto}}" class="form form-control">
            <br/>

            <label for="photo">Imagenes</label>
            <input type="file" name="photo[]" multiple>

            @foreach($users as $user)
                <datalist id="user_id">
                    <option value="{{$user->id}}">{{$user->email}}</option>
                </datalist>
            @endforeach
            <br/>
            <input class="btn btn-primaryregistrar" type="submit"  value="Guardar cambios" onclick="if(!confirm('¿Estas segur/o que quieres modificar?')){return false;};">
            <br/>
            <br/>
        </form>
        <br/>
    </div>

@endsection
