
@extends('layouts.app')
@section('content')


    <div id="comprassugeridas">
        <br>  <div id="titulo"> <strong>Lamparas </strong> </div>
        <div>
            @php
                $products=\App\Producto::all();
            @endphp
            @foreach($products as $product)
                @if($product->tipo_mueble == "Lampara")
                    <div class="oferta">
                        <a href="{{route('home.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
                            <br> <p class="centrar">{{$product->nombre_producto}}<br><strong>{{$product->price}} €</strong></p></a>

                    </div>
                @endif
            @endforeach

        </div>

    </div>

@endsection
