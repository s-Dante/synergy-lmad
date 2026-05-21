@extends('layouts.appprofile')

@section('title', 'Profile')

@push('styles')
    @vite(['resources/css/shared/profile.css'])
@endpush

@section('content')

    <div class="profile-main">

        <section class="section-header">
            <div class="glass-card">

            </div>
        </section>

        <div class="data-wrapper">

            <section class="section-profile-projects">

                <h2>Proyectos</h2>

                <div class="projects-wrapper">
                    <div class="glass-card projects-card">

                    </div>
                    <div class="glass-card projects-card">

                    </div>
                </div>

            </section>

            <section class="section-profile-abilities">

                <h2>Habilidades</h2>

                <div class="abilities-wrapper">

                    <div class="div-abilities-skills">
                        <h3>Duras</h3>

                        <div class="abilities-skills">
                            <div class="skill-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                            <div class="skill-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                            <div class="skill-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                            <div class="skill-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                            <div class="skill-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                        </div>

                    </div>

                    <div class="div-abilities-dowries">
                        <h3>Blandas</h3>

                        <div class="abilities-dowries">
                            <div class="dowry-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                            <div class="dowry-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                            <div class="dowry-card">
                                <img>
                                <p>Habilidad</p>
                            </div>
                        </div>

                    </div>

                </div>

            </section>

            <section class="section-profile-contact">

                <h2>Contacto</h2>

                <div class="contact-list">
                    <div class="glass-card contact-card">

                    </div>

                    <div class="glass-card contact-card">

                    </div>

                    <div class="glass-card contact-card">

                    </div>
                </div>

            </section>

        </div>

    </div>
@endsection