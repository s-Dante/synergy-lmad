@extends('layouts.appwelcome')

@section('title', 'Login')

@push('styles')
@vite(['resources/css/guests/auth.css'])
@endpush

@section('content')
<div class="auth-wrapper">
    <button class="btn-back" aria-label="Regresar">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </button>

    <div class="auth-glass-card">
        <h1 class="auth-title">Inicio de sesión</h1>

        <div class="role-toggle-container">
            <button type="button" class="btn-toggle">Estudiante</button>
            <button type="button" class="btn-toggle active-company">Empresa</button>
        </div>

        <form class="auth-form" method="POST" action="...">
            @csrf
            <input type="email" class="auth-input" placeholder="email">
            <input type="password" class="auth-input" placeholder="contraseña">

            <div class="auth-actions">
                <button type="submit" class="btn-submit-auth">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>
@endsection