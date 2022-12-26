@extends('layouts.main')

@section('title', 'Crear una cuenta')

@section('main_container')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header fs-5 border-bottom-0"><i class="fa-solid fa-user-plus me-2"></i>{{ __('Crear una cuenta') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Usuario" required>
                            <label for="name" class="form-label"><i class="fa-solid fa-user me-2"></i>{{ __('Usuario') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                            <label for="email" class="form-label"><i class="fa-solid fa-at me-2"></i>{{ __('Correo electrónico') }}</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                                    <label for="password" class="form-label"><i class="fa-solid fa-lock me-2"></i>{{ __('Contraseña') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Contraseña" required>
                                    <label for="password-confirm" class="form-label"><i class="fa-solid fa-lock me-2"></i>{{ __('Contraseña') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <div class="btn-group">
                                <a href="{{ route('index') }}" class="btn btn-secondary"><i class="fa-solid fa-xmark me-2"></i>{{ __('Cancelar') }}</a>
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>{{ __('Registrar') }}</button>
                            </div>
                        </div>
                        <div class="mt-4 text-start">
                            <a href="{{ route('login') }}" class="link-secondary">¡Ya tengo una cuenta!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
