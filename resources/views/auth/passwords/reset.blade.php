@extends('layouts.app')



@section('content')
    <br><br><br>
    <div>

        <div class="card-header2"><strong>{{ __('Restablecer la contraseña') }}</strong></div>

        <div class="card-bodycontrasena">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" required oninvalid="this.setCustomValidity('Por favor rellene este campo')" oninput="setCustomValidity('')">

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" required oninvalid="this.setCustomValidity('Por favor rellene este campo')" oninput="setCustomValidity('')">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" required oninvalid="this.setCustomValidity('Por favor rellene este campo')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primaryrestablecer">
                            {{ __('Restablecer la contraseña') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>



    </div>
    </div>
@endsection