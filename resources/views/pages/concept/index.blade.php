@extends('layouts.app')

@section('title', 'Unser Konzept')

@section('content')
    @include('shared.slider', ['slides' => $slides])

    <section id="concept" class="py-20 bg-gray-900/50 backdrop-blur-sm">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto" data-aos="fade-up">
                @include('sections.concept.content')
            </div>
        </div>
    </section>

    @include('shared.contact-form')
@endsection
