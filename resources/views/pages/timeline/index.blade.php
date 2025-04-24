@extends('layouts.app')

@section('title', 'Unsere Timeline')

@section('content')
    @include('shared.slider', ['slides' => $slides])

    <section id="timeline" class="py-20 bg-gray-900/50 backdrop-blur-sm">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    Unsere Timeline
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Eine Reise durch unsere Geschichte - von den bescheidenen Anfängen bis zum heutigen Erfolg.
                </p>
            </div>

            @include('sections.timeline.timeline', ['timelineEvents' => $timelineEvents])
        </div>
    </section>

    @include('shared.contact-form')
@endsection
