@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Introduce tus datos</h1>
            <h4>Total: {{$total}} €</h4>
            <div id="charge-error" class="alert alert-danger{{!\Illuminate\Support\Facades\Session::has('error') ? 'hidden': ''}}">
                {{\Illuminate\Support\Facades\Session::get('error')}}
            </div>
            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                    <hr>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Nombre Card</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <hr>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Card numero</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-month">Card valabilidad mes</label>
                                    <input type="text" id="card-expiry-month" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-year">Card valabilidad año</label>
                                    <input type="text" id="card-expiry-year" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC</label>
                            <input type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div>

                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primaryregistrar">Comprar ahora</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>


@endsection