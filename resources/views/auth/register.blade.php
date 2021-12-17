@extends('layouts.app')

@section('portada')
        <div class="masthead-heading">Biblioteca Virtual</div>
        <div class="masthead-subheading">Santiago Atitlán, Sololá</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    
                    <div class="form-group row">
                        <label  class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <span class="login100-form-title" style="font-family: Poppins-Bold; font-size: 39px;">
                            {{ __('Registrarse') }}
                            </span>
                        </div>
                    </div>   

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 45%;
                                    height: 50px;
                                    border-radius: 20px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

        </div>
    </div>
</div>
@endsection

@section('comentario')
<div style="text-align: center;">
    <img class="img-fluid" width="50%" height="50%" src="{{ asset('/web/img/LOGO.png')}}" alt="..." />
</div>
@endsection

@section('css')
<style>
#contact:before {
  content: "";
  position: absolute;
  background-color: #1c375e;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.1;
}
</style>
@endsection