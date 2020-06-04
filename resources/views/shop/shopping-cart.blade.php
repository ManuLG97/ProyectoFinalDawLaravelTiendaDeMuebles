@extends('layouts.app')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('cart'))
        <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"> <ul class="list-group">
                    @foreach($products as $product) <li class="list-group-item"> <span class="badge">{{$product['qty']}}</span>
                        <strong>{{$product['item']['nombre_producto']}}</strong> <span class="label label-succes">{{$product['item']['price']}} €</span>
                        <form action="{{url('shopping-cart-delete/'.$product['item']['id'])}}" method="POST" style="">
                            @csrf @method("DELETE") <button class="btn-primaryeliminar" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres eliminar?')){return false;};">Eliminar</button>
                        </form> </li>
                    @endforeach </ul> </div> </div> <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}} €</strong> </div>
        </div> <hr> <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{route('checkout')}}" type="button" class="btn btn-primaryregistrar">Revisa y compra</a>
            </div> </div> @else <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>Todavia no has añadido ningún producto al carrito!</h2> </div> </div>
    @endif
@endsection