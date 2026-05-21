@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
@vite(['resources/css/shared/dashboard.css'])
@vite(['resources/css/guests/auth.css'])
@endpush

@section('content')
<div class="dashboard-form">
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