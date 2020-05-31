
@extends('layouts.app_admin')
@section('content')


    <div id="comprassugeridas">
        <br> <div id="titulo"> <strong>Camas </strong> </div>
        <div>
            @php
                $products=\App\Producto::all();
            @endphp
            @foreach($products as $product)
                @if($product->tipo_mueble == "Cama")
                    <div class="oferta">
                        <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
                            <br> <p class="centrar">{{$product->nombre_producto}} ({{$product->precio_sin_montaje}} €)</p></a>

                    </div>
                @endif
            @endforeach

        </div>

    </div>

@endsection