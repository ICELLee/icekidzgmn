@extends('layouts.app')

@section('title', 'Kooperationen')

@section('content')
    @include('shared.slider', ['slides' => $slides])

    <section id="cooperation" class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    Kooperation mit ICEKIDZ
                </h2>
                <p class="text-gray-400">
                    Wir sind immer auf der Suche nach spannenden Partnern und Projekten, die zu unserem Netzwerk passen.
                    Gemeinsam können wir unsere Reichweite vergrößern und einzigartige Erfahrungen für unsere Communities schaffen.
                </p>
            </div>

            @include('sections.cooperation.form', ['countries' => $countries])
        </div>
    </section>

    @include('shared.contact-form')
@endsection
