<section id="team" class="py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                Unser komplettes Team
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Jedes Mitglied unseres Teams bringt einzigartige Fähigkeiten und Leidenschaft für Gaming mit.
            </p>
        </div>

        <div class="mb-12 flex flex-wrap justify-center gap-4" data-aos="fade-up">
            <button class="px-4 py-2 bg-purple-600 rounded-lg text-white filter-btn active" data-filter="all">Alle</button>
            <button class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 filter-btn" data-filter="IKRIPL">Projekt Leitung</button>
            <button class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 filter-btn" data-filter="IKRIPM">Management</button>
            <button class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 filter-btn" data-filter="IKRID">Developer</button>
            <button class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 filter-btn" data-filter="IKRIS">Support</button>
            <button class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 filter-btn" data-filter="IKRIF">Friends</button>
            <button class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 hover:bg-gray-700 filter-btn" data-filter="IKRESI">Server Inhaber</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 team-container">
            @foreach($teamMembers as $member)
                <div class="bg-gray-900/50 border border-gray-800 rounded-xl overflow-hidden hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2 group team-item" data-category="{{ $member['role_short'] }}" data-aos="fade-up" data-aos-delay="{{ $loop->index % 4 * 100 }}">
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ asset($member['image']) }}" alt="{{ $member['ingame_name'] }}" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <h3 class="text-xl font-bold text-white">{{ $member['ingame_name'] }}</h3>
                            <div class="text-sm {{ $member['role_color'] }} text-white px-2 py-1 rounded-full inline-block mt-1">
                                {{ $member['role_short'] }}
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-white mb-1">{{ $member['real_name'] }}</h4>
                        <p class="text-purple-400 mb-4">{{ $member['role'] }}</p>
                        <p class="text-gray-400 text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-400 hover:text-purple-400 transition-all duration-300" title="Discord: {{ $member['social']['discord'] }}">
                                <i class="fab fa-discord"></i>
                            </a>
                            <a href="mailto:{{ $member['social']['email'] }}" class="text-gray-400 hover:text-blue-400 transition-all duration-300" title="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const teamItems = document.querySelectorAll('.team-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active', 'bg-purple-600'));
                    filterBtns.forEach(b => b.classList.add('bg-gray-800'));

                    // Add active class to clicked button
                    this.classList.add('active', 'bg-purple-600');
                    this.classList.remove('bg-gray-800');

                    const filterValue = this.getAttribute('data-filter');

                    teamItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</section>
