@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
@vite(['resources/css/shared/dashboard.css'])
@vite(['resources/css/guests/auth.css'])
@endpush

@section('content')
<div class="dashboard-form" style="max-width: 400px; margin: 0 auto 1rem auto">
    <input type="text" placeholder="Buscar..." class="auth-input" style="text-align: left; ">

</div>
<div class="dashboard-layout">
    <x-profile-card />
    <x-profile-card />
    <x-profile-card />
    <x-profile-card />
    <x-profile-card />
    <x-profile-card />
    <x-profile-card />
    <x-profile-card />
    <x-profile-card />
</div>
@endsection