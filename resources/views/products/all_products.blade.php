

@extends('layouts.app_admin')

@section('content')
    <div class="col-lg-12">

        <h1 class="my-5">Productos</h1>
        <button class=""><a href="{{route('producto.create')}}">Nuevo producto</a></button>

        <br/>
        <table class="table">
            <thead>

            @foreach($products as $product)
                <tr>
                    <td><br/><br/>
                        @if($product->foto!=null)<img src="{{asset('storage/'.$product->foto)}}" width="250px" height="200px">@endif
                    </td>
                    <td class="description-property2">Nombre: {{$product->nombre_producto}}
                        <br/>Marca: {{$product->marca}}
                        <br/>Tipo mueble: {{$product->tipo_mueble}}
                        <br/>Descripción: {{$product->descripcion}}
                        <br/>Dimensiones: {{$product->dimensiones}}
                        <br/>Volum: {{$product->volum}}
                        <br/>Oferta: {{$product->oferta}}
                        <br/>Cantidad: {{$product->cantidad}}
                        <br/>Precio sin montaje; {{$product->precio_sin_montaje}}
                        <br/>Precio con montaje: {{$product->precio_con_montaje}}
                        <br/>Fragil: {{$product->fragil}}


                    </td>
                    <td><button><a class="" href="{{route('producto.edit',$product->id)}}">Edit</a></button></td>
                    <td>
                        <form action="{{route('producto.destroy',$product->id)}}" method="POST" style="">
                            @csrf
                            @method("DELETE")
                            <button  class="btn-delete" type="submit" onclick="if(!confirm('Are you sure?')){return false;};">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            </thead>
        </table>
    </div>

@endsection

