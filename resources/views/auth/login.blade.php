@extends('layouts.app')

@section('content')
    <div>
        <div class="card">
            <div class="card-header">{{ __('Iniciar sesión') }}<img src="imagenes/unnamed.png" id="boli" alt=""/>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                        <div class="col-md-6">
                            <input id="email type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-check">

                                <label class="form-check-label" for="remember">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''  }}>
                                    {{ __ ( ' Recordar nombre de usuario') }}
                                </label>
                            </div>
                        </div>


                        <br>
                        <div class="form-grupodos">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn-primaryregistrar">
                                    {{ __('Iniciar sesión') }}
                                </button><br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Has olvidado tu contraseña?') }}
                                    </a>
                                    <br>
                                @endif
                                @if (Route::has('register'))

                                    <a class="btn-primaryregistrar" href="{{ route('register') }}">{{ __('Crear cuenta') }}</a>

                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>



    </div>


@endsection
