<section id="about" class="py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2" data-aos="fade-right">
                <div class="relative">
                    <img src="{{ asset('images/temp.jpg') }}" alt="About ICEKIDZ" class="rounded-xl shadow-2xl border border-purple-500/20">
                    <div class="absolute -inset-4 -z-10 bg-gradient-to-r from-purple-600/30 to-blue-600/30 rounded-xl blur-lg opacity-75"></div>
                </div>
            </div>
            <div class="lg:w-1/2" data-aos="fade-left">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    Über das ICEKIDZ Gaming Network
                </h2>
                <p class="text-gray-300 mb-6">
                    Das ICEKIDZ Gaming Network ist eine aufstrebende Plattform für innovative Gaming-Projekte und Communities.
                    Unser Ziel ist es, einzigartige Erlebnisse für Spieler aller Art zu schaffen und eine lebendige,
                    unterstützende Community aufzubauen.
                </p>
                <p class="text-gray-300 mb-8">
                    Mit einem Team aus leidenschaftlichen Entwicklern, Designern und Community-Managern arbeiten wir
                    kontinuierlich daran, unsere Projekte zu verbessern und neue, spannende Inhalte zu entwickeln.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('concept') }}" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-lg hover:shadow-purple-500/30">
                        Unser Konzept
                    </a>
                    <a href="{{ route('team') }}" class="px-6 py-3 bg-gray-800 border border-gray-700 rounded-lg hover:border-purple-500/50 hover:bg-gray-700/50 transition-all duration-300">
                        Unser Team
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
