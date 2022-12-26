@extends('layouts.main')

@section('title', 'Iniciar sesión')

@section('main_container')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header fs-5 border-bottom-0"><i class="fa-solid fa-house-user me-2"></i>{{ __('Iniciar sesión') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                            <label for="email" class="form-label"><i class="fa-solid fa-at me-2"></i>{{ __('Correo electrónico') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                            <label for="password" class="form-label"><i class="fa-solid fa-lock me-2"></i>{{ __('Contraseña') }}</label>
                        </div>
                        <div class="mt-4 text-end">
                            <div class="btn-group">
                                <a href="{{ route('index') }}" class="btn btn-secondary"><i class="fa-solid fa-xmark me-2"></i>{{ _('Cancelar') }}</a>
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket me-2"></i>{{ __('Ingresar') }}</button>
                            </div>
                        </div>
                        <div class="mt-4 text-start">
                            <a href="{{ route('register') }}" class="link-secondary">¡No tengo una cuenta!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
