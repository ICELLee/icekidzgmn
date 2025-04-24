@extends('layouts.app')

@section('title', 'Server Status')

@section('content')
    @include('shared.slider', ['slides' => $slides])

    <section id="server-status" class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    Server Status
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Echtzeit-Übersicht über den Status aller unserer Server und Dienste. Wir arbeiten kontinuierlich an einer 99,9% Verfügbarkeit.
                </p>
            </div>

            @include('sections.serverstatus.server-list', ['servers' => $servers])
        </div>
    </section>

    @include('shared.contact-form')
@endsection
