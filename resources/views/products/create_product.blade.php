
@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-4 titulogrande">Crear producto</h1>
        <form class="form-propertie centrar" action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            Nombre producto
            <br/>
            <textarea class="new-propertie" type="text" name="nombre_producto" value="" ></textarea>
            <br/><br/>

            Marca
            <br/>
            <textarea class="new-propertie" type="text" name="marca"></textarea>
            <br/><br/>

            Tipo mueble
            <br/>
            <textarea class="new-propertie" type="text" name="tipo_mueble"></textarea>
            <br/><br/>


            Descripción
            <br/>
            <textarea class="new-propertie" type="text" name="descripcion"></textarea>
            <br/><br/>

            Dimensiones
            <br/>
            <input class="new-price" type="text" name="dimensiones">
            <br/><br/>

            Volum
            <br/>
            <input  class="new-price" type="text" name="volum">
            <br/><br/>

            Oferta
            <br/>
            <input class="new-price" type="number" name="oferta">
            <br/><br/>

            Cantidad
            <br/>
            <input class="new-price" type="number" name="cantidad">
            <br/><br/>

            Precio sin montaje
            <br/>
            <input class="new-price" type="number" name="precio_sin_montaje">
            <br/><br/>

            Precio con montaje
            <br/>
            <input class="new-price" type="number" name="precio_con_montaje">
            <br/><br/>

            Fragil
            <br/>
            <input class="new-price" type="number" name="fragil">
            <br/><br/>

            <input class="new-photo" type="file" name="foto">
            <br/><br/>

            <input  type="submit" class="botonverde" value="Guardar Cambios">
            <br/>
        </form>
        <br/>
    </div>

@endsection