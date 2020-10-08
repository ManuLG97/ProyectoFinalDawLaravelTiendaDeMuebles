@extends('layouts.app')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('cart'))
       <div class="row"> <div class="col6">
              <h5 class="resumen">Resumen de compra</h5>
                <table  class="table">
                    <tr class="cart-title">
                        <th>Articulo</th>
                        <th>Descripción</th>
                        <th></th>
                        <th>Cantidad</th>
                        <th></th>
                        <th>Precio</th>
                        <th></th>

                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td class="list-item">
                            <a href="{{route('home.show',$product['item']['id'])}}"><img class="imagenessugeridas centrar" src="{{asset('storage/'.$product['item']['foto'])}}" alt="Foto mueble con el nombre: {{$product['item']['nombre_producto']}}"/> </a>
                            </td>
                          <td class="desc"><strong class="nombre">{{$product['item']['nombre_producto']}}</strong><br>
                              <h6 class="descrip">Marca: {{$product['item']['marca']}}<br>{{$product['item']['descripcion']}}</h6>

                          </td>


                            <td class="disminuir">  @if($product['qty'] >1)
                           <form action="{{url('shopping-delete-product/'.$product['item']['id'])}}" method="POST" style="">
                                @csrf @method("DELETE") <button class="" type="submit">-</button>
                            </form>
                                @endif </td>
                            <td class="cant"> <span class=""> {{$product['qty']}} </span></td>

                            <td>  <a href ="{{url('add-to-cart-product/'.$product['item']['id'])}}">
                                <button class="anadir" type="submit">+</button></a></td>


                        {{-- <a href="{{route('product.addToCart',$product['item']['id'])}}"><button type="submit" class="btn-primaryregistrar">+</button></a>
--}}

                                    <td class="precio"> <span class="label label-succes">{{$product['item']['price']}} €</span></td>
                                    <td>      <form action="{{url('shopping-cart-delete/'.$product['item']['id'])}}" method="POST" style="">
                            @csrf @method("DELETE") <button class="" type="submit" onclick="if(!confirm('¿Estas segur/o que quieres eliminar?')){return false;};">X</button>
                                        </form></td></tr>



                    @endforeach
                </table>
               <br><br>
        <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}} €</strong> </div>
        </div> <hr>
               <div class="row">
                   <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                       <a href="{{route('checkout')}}" type="button" class="btn btn-primaryregistrar">Revisa y compra</a>
                   </div>
       {{--    <form action="/pago" method="POST">
              {{ csrf_field() }}
              <script
                      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                      data-key="{{ config('services.stripe.key') }}"
                      data-amount="{{$totalPrice.'00'}}"
                      data-name="Compra"
                      data-description="Prueba compra"
                      data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                      data-locale="auto">
              </script>
          </form>     --------}}
</div> </div>
</div> </div>
@else <div class="row"> <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<h1>Todavia no has añadido ningún producto al carrito!</h1> </div> </div>
@endif
@endsection