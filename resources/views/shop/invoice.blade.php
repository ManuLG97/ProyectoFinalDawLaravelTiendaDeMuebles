@extends('layouts.app')
@section('content')
    <br><br>
    @if(\Illuminate\Support\Facades\Session::has('cart'))

        <div class="row2">  <h5 class="alert alert-info">Pedido en curso</h5>
            <div class="col7">
                <table  class="table">
                    <tr><th>Nombre:  {{ Auth::user()->name }}</th></tr>
                    <tr><th>Adresa:  {{ Auth::user()->address }}</th></tr>
                    <tr class="cart-title">

                        <th>Articulo</th>

                        <th>Cantidad</th>

                        <th>Precio</th>


                    </tr>
                    @foreach($products as $product)
                        <tr>

                            <td class="desc"><strong class="nombre">{{$product['item']['nombre_producto']}}</strong><br>
                            </td>

                            <td class="cant"> <span class=""> <h5 class="qty">{{$product['qty']}} </h5></span></td>


                            {{-- <a href="{{route('product.addToCart',$product['item']['id'])}}"><button type="submit" class="btn-primaryregistrar">+</button></a>
    --}}

                            <td class="precio"> <span class="label label-succes">{{$product['item']['price']}} €</span></td>

                    @endforeach
                </table>
                <br><br>
                <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <strong>Total: {{$totalPrice}} €</strong> </div>
                </div>

                <a href="{{route('product.remove',$product['item'])}}">
                    <button class="btn-primaryregistrar" type="submit" onclick="window.alert('Compra realizada!');" >Estoy de acuerdo</button>
                </a>

            </div><br>
        </div> </div>

    @else <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h1>Todavia no has añadido ningún producto al carrito!</h1> </div> </div>
    @endif
@endsection