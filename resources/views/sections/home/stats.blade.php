@php
    use App\Models\SiteStat;

    $stats = SiteStat::pluck('value', 'name');
@endphp
<section class="py-20 bg-gradient-to-br from-purple-900/30 to-blue-900/30 backdrop-blur-sm">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                Unsere Erfolge in Zahlen
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Seit unserer Gründung haben wir kontinuierlich an der Verbesserung unserer Projekte gearbeitet und eine starke Community aufgebaut.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Team Members -->
            <div class="bg-gray-900/50 border border-gray-800 rounded-xl p-8 text-center hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="text-5xl font-bold mb-2 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    <span class="counter" data-target="{{ $stats['team'] ?? 0 }}">0</span>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Teammitglieder</h3>
                <p class="text-gray-400">Engagierte Experten in verschiedenen Bereichen</p>
            </div>

            <!-- Lines of Code -->
            <div class="bg-gray-900/50 border border-gray-800 rounded-xl p-8 text-center hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="text-5xl font-bold mb-2 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    <span class="counter" data-target="{{ ($stats['lines'] ?? 0) / 1000 }}">0</span>k
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Programmierte Zeilen</h3>
                <p class="text-gray-400">Für unsere Projekte und Tools</p>
            </div>

            <!-- Updates -->
            <div class="bg-gray-900/50 border border-gray-800 rounded-xl p-8 text-center hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="text-5xl font-bold mb-2 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    <span class="counter" data-target="{{ $stats['updates'] ?? 0 }}">0</span>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Updates</h3>
                <p class="text-gray-400">Regelmäßige Verbesserungen und neue Features</p>
            </div>

            <!-- Projects -->
            <div class="bg-gray-900/50 border border-gray-800 rounded-xl p-8 text-center hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                <div class="text-5xl font-bold mb-2 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    <span class="counter" data-target="{{ $stats['projects'] ?? 0 }}">0</span>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Projekte</h3>
                <p class="text-gray-400">In verschiedenen Spielen und Bereichen</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCounter, 1);
                } else {
                    counter.innerText = target + '+';
                }

                function updateCounter() {
                    const current = +counter.innerText;
                    if (current < target) {
                        counter.innerText = Math.ceil(current + increment);
                        setTimeout(updateCounter, 1);
                    } else {
                        counter.innerText = target + '+';
                    }
                }
            });
        });
    </script>
</section>
