@extends('layouts.app_admin')
@section('content')


    <div id="comprassugeridas">
        <div id="titulo"> Ofertas </div>
        <div>
            @php
                $products=\App\Producto::first()->take(9)->get();
            @endphp
            @foreach($products as $product)
                @if($product->oferta == "1");
                <div class="oferta">
                    <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
                        <br> <p class="centrar">{{$product->nombre_producto}} ({{$product->precio_sin_montaje}} €)</p></a>


                <button class="btn-primaryregistrar"><a href="{{route('user.show',$product->id)}}">Ver mas</a></button>
                <button class="btn-primaryregistrar"><a href="{{}}">Añadir al carrito</a></button>

                </div>
                @endif
            @endforeach

        </div>

    </div>

@endsection