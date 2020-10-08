@extends('layouts.app')

@section('content')
   <br><br> <div class="rowcheck">
        <div class="offset-34">
            <p class="datos"><strong>Pago con tarjeta </strong><img src="/imagenes/VISA.svg" id="imgcard" alt=""/>
            <img src="/imagenes/paypal.svg" id="imgcard" alt=""/>
            <img src="/imagenes/mastercard.svg" id="imgcard" alt=""/></p> <br>
            <h4><strong>Total: {{$total}} €</strong></h4>
            <div id="" class="{{!\Illuminate\Support\Facades\Session::has('error') ? 'hidden': ''}}">
                {{\Illuminate\Support\Facades\Session::get('error')}}
            </div>
            <form action="{{route('factura.index')}}" method="post" id=""  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="rowtarj">
                    <div class="col-xs-12">
                        <div class="">
                            <label for="name" class="numtarjeta">Nº tarjeta</label>
                            <input type="number" id="name" class="form-control2" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required oninvalid="this.setCustomValidity('Por favor rellene este campo')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address" class="address1">Caducidad</label>
                            <label for="address" class="address2">Mes</label>
                            <input type="number" id="address" class="form-control3"  pattern="[0-9]{2}"  required oninvalid="this.setCustomValidity('Por favor rellene este campo')" oninput="setCustomValidity('')">
                            <label for="address" class="address3">Año</label>
                            <input type="number" id="address" class="form-control4" pattern="[0-9]{4}" required oninvalid="this.setCustomValidity('Por favor rellene este campo')" oninput="setCustomValidity('')">
                            <br/> <br/>
                            <input  type="submit" class="btn btn-primarycomprar" value="Comprar ahora">
                            <br/>
                        </div>
                    </div>
                    <hr>


                </div>
               {{--{{csrf_field()}}--}}
                {{-- <a href="{{route('comprar')}}"><button type="submit" class="btn btn-primarycomprar">Comprar ahora</button></a>--}}
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>


@endsection