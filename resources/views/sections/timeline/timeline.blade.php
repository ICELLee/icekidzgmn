<div class="relative">
    <!-- Timeline line -->
    <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-purple-500 to-blue-500 transform -translate-x-1/2" data-aos="fade-up"></div>

    <div class="space-y-8 md:space-y-16">
        @foreach($timelineEvents as $event)
            <div class="relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <!-- Timeline content -->
                <div class="flex flex-col md:flex-row items-center md:items-start {{ $loop->index % 2 == 0 ? 'md:flex-row-reverse' : '' }} gap-8">
                    <!-- Date -->
                    <div class="md:w-1/2 flex justify-center md:justify-{{ $loop->index % 2 == 0 ? 'end' : 'start' }} px-4">
                        <div class="inline-flex items-center px-6 py-3 bg-gray-800 border border-gray-700 rounded-lg shadow-lg">
                            <span class="text-white font-semibold">{{ $event['date'] }}</span>
                        </div>
                    </div>

                    <!-- Event card -->
                    <div class="md:w-1/2 px-4">
                        <div class="relative bg-gray-900/50 border border-gray-800 rounded-xl p-6 shadow-xl hover:border-purple-500/50 transition-all duration-500 group overflow-hidden">
                            <!-- Background gradient -->
                            <div class="absolute inset-0 -z-10 bg-gradient-to-br from-purple-900/10 to-blue-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Icon -->
                            <div class="absolute -top-5 -right-5 w-16 h-16 rounded-full {{ $event['color'] }} flex items-center justify-center text-white text-2xl opacity-20 group-hover:opacity-100 transition-opacity duration-500">
                                <i class="{{ $event['icon'] }}"></i>
                            </div>

                            <!-- Content -->
                            <div class="relative">
                                <h3 class="text-xl font-bold text-white mb-2">{{ $event['title'] }}</h3>
                                <p class="text-gray-400 mb-4">{{ $event['description'] }}</p>

                                @if(isset($event['image']))
                                    <div class="mt-4 rounded-lg overflow-hidden border border-gray-800 group-hover:border-purple-500/50 transition-all duration-500">
                                        <img src="{{ asset('storage/' . $event['image']) }}">
                                    </div>
                                @endif
                            </div>

                            <!-- Timeline dot -->
                            <div class="hidden md:block absolute top-1/2 {{ $loop->index % 2 == 0 ? '-left-5' : '-right-5' }} transform -translate-y-1/2 w-5 h-5 rounded-full {{ $event['color'] }} border-4 border-gray-900 z-10"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Future item -->
    <div class="relative mt-16" data-aos="fade-up">
        <div class="flex flex-col md:flex-row items-center justify-center gap-8">
            <div class="md:w-1/2 px-4"></div>

            <div class="md:w-1/2 px-4">
                <div class="relative bg-gray-900/50 border-2 border-dashed border-purple-500/30 rounded-xl p-6 text-center">
                    <div class="text-4xl text-purple-500 mb-4">
                        <i class="fas fa-question"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Was kommt als nächstes?</h3>
                    <p class="text-gray-400 mb-4">Sei Teil unserer Geschichte und erlebe unsere zukünftigen Meilensteine mit!</p>
                    <a href="{{ route('home') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-lg hover:shadow-purple-500/30">
                        Jetzt mitmachen
                    </a>

                    <!-- Timeline dot -->
                    <div class="hidden md:block absolute top-1/2 -left-5 transform -translate-y-1/2 w-5 h-5 rounded-full bg-gray-600 border-4 border-gray-900 z-10 animate-pulse"></div>
                </div>
            </div>
        </div>
    </div>
</div>
