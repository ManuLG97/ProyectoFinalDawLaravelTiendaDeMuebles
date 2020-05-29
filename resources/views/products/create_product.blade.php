
@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-5">Crear producto</h1>
        <form class="form-propertie centrar" action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="nombre_producto"> Nombre producto  </label>
            <input class="new-propertie" placeholder="Ejemplo: Kallax" type="text" name="nombre_producto" value="">
            <br/>

            <label for="marca"> Marca  </label>
            <input class="new-propertie" placeholder="Ejemplo: Ikea" type="text" name="marca">
            <br/>


            <label for="tipo_mueble"> Tipo mueble  </label>
            <input class="new-propertie" placeholder="Ejemplo: Armario" type="text" name="tipo_mueble">
            <br/>



            <label for="descripcion"> Descripción </label>
            <input class="new-propertie" placeholder="Ejemplo: Mueble de plastico de color azul" type="text" name="descripcion">
            <br/>


            <label for="dimensiones"> Dimensiones </label>
            <input class="new-price" placeholder="Ejemplo: 22.52"  type="text" name="dimensiones">
            <br/>


            <label for="volum">  Volum </label>
            <input  class="new-price" placeholder="Ejemplo: 22.22" type="text" name="volum">
            <br/>


            <label for="oferta">  Oferta </label>
            <input class="new-price" type="number" placeholder="Ejemplo: 1 (true) / 0 (false)" name="oferta">
            <br/>


            <label for="cantidad"> Cantidad</label>
            <input class="new-price" type="number"  placeholder="Ejemplo: 11"   name="cantidad">
            <br/>


            <label for="precio_sin_montaje"> Precio sin montaje</label>
            <input class="new-price" type="number" placeholder="Ejemplo: 23.22" name="precio_sin_montaje">
            <br/>


            <label for="precio_con_montaje"> Precio con montaje</label>
            <input class="new-price" type="number"  placeholder="Ejemplo: 223.22"  name="precio_con_montaje">
            <br/>


            <label for="fragil"> Fragil </label>
            <input class="new-price"  placeholder="Ejemplo: 1 (true) / 0 (false)"  type="number" name="fragil">
            <br/>

            <label for="foto"> Foto </label>
            <input class="new-photo" type="file" name="foto">
            <br/>

            <label for="photo">Imagenes</label>
            <input type="file" name="photo[]" multiple>

            <input  type="submit" class="botonverde" value="Guardar Cambios">
            <br/>
        </form>
        <br/>
    </div>

@endsection