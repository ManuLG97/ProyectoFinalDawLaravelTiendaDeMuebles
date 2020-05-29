@extends('layouts.app_admin')

@section('content')
    <br/><br/><br/>


    <section class="product_style">
        @if($photos)
            <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $tam =0;
                    @endphp

                    @foreach($photos as $photo)
                        <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                            <img id=" {{$tam = $tam + 1}}" src="{{asset('storage/'.$photo->photo)}}" style="width: 500px">
                            <p class="slider-n">{{$tam ?? ''}}/{{$total}}</p>
                            <p>  {{$photo->id}} </p></div>
                    @endforeach

                </div>

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" >

    <svg width="44" height="46" viewBox="0 0 44 46" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="-0.500132" y="-0.499731" width="42.9882" height="44" transform="matrix(-1 0.000537106 -0.000263414 -1 42.9996 44.0008)" fill="#F0F0F0" stroke="black"/>
    <path d="M1.6648 24.2593C1.11849 23.8546 1.12355 23.0362 1.6748 22.6422L18.8618 10.3599C19.5257 9.88543 20.4502 10.3667 20.4451 11.1841L20.2912 36.0866C20.2862 36.904 19.3558 37.3669 18.6979 36.8794L1.6648 24.2593Z" fill="black"/>
    <rect x="17.1388" y="18.8234" width="25.5566" height="9.44506" rx="2" fill="black"/>
    </svg>
                    </span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" style="margin-right:25px">


    <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="0.499944" y="0.49992" width="43.0241" height="43.9177" transform="matrix(1 -0.000159545 -0.000112027 1 0.0170238 0.0236546)" fill="#F0F0F0" stroke="black"/>
    <path d="M42.376 20.74C42.9235 21.1449 42.9181 21.9649 42.3654 22.3586L25.1604 34.6115C24.4962 35.0845 23.5731 34.6028 23.5784 33.786L23.7418 8.93016C23.7472 8.11335 24.6766 7.65055 25.3344 8.13709L42.376 20.74Z" fill="black"/>
    <rect x="26.8903" y="26.1624" width="25.5775" height="9.42779" rx="2" transform="rotate(-179.978 26.8903 26.1624)" fill="black"/>
    </svg>
                    </span>
                </a>
                @endif
            </div>

    <h1 class="my-4 titulogrande">Crear producto</h1>
    <form class="form-propertie centrar" action="{{route('producto.store',$producto->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')


        <br/><br/>
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

        Foto:
        <input class="new-photo" type="file" name="foto[]" id="foto[]" multiple accept="image/*">
        <br/>
        <br/><br/>

        <input  type="submit" class="botonverde" value="Guardar Cambios">
    </form>




@endsection