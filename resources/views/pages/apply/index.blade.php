@extends('layouts.app')

@section('content')
    @include('shared.slider', ['slides' => $slides])

    <section class="py-16 bg-gray-900/50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center font-orbitron text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">
                Aktuelle Stellenangebote
            </h2>

            <div class="grid md:grid-cols-2 gap-6 mb-12">
                @foreach($jobs as $job)
                    <a href="{{ route('sections.apply.show', $job['id']) }}"
                       class="block bg-gray-900/50 border border-gray-800 rounded-xl p-6 hover:border-purple-500/50 transition-all hover:-translate-y-1">
                        <div class="flex justify-between">
                            <h3 class="text-xl font-bold text-white mb-2">{{ $job['title'] }}</h3>
                            <span class="px-3 py-1 rounded-full text-xs bg-purple-600 text-white">{{ $job['type'] }}</span>
                        </div>
                        <p class="text-gray-400 mb-4">{{ $job['short_desc'] }}</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            {{ $job['location'] }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
