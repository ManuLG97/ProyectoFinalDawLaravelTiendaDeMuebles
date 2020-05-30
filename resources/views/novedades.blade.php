@extends('layouts.app')
@section('content')


    <div id="comprassugeridas">
        <div id="titulo"> Ultimás novedades </div>
        <div>
            @php
                $products=\App\Producto::latest()->take(8)->get();
            @endphp
            @foreach($products as $product)

                <div class="oferta">
                    <a href="{{route('home.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
                        <br> <p class="centrar">{{$product->nombre_producto}} ({{$product->precio_sin_montaje}} €)</p></a>

                    <button class="btn-primaryregistrar"><a href="{{route('home.show',$product->id)}}">Ver mas</a></button>
                    <button class="btn-primaryregistrar"><a href="{{}}">Añadir al carrito</a></button>

                </div>
            @endforeach

        </div>

    </div>

@endsection