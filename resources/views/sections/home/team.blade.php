@php
    use App\Models\TeamMember;

$teamMembers = TeamMember::where('is_active', true)
    ->where('show_on_home', true)
    ->get()
    ->map(function ($member) {
        return [
            'real_name' => $member->full_name, // First + Last Name
            'ingame_name' => $member->ingame_name,
            'role' => $member->role_name,      // z. B. ICEKIDZ Developer
            'role_short' => $member->role,     // z. B. IKRID
            'role_color' => $member->role_color, // z. B. bg-blue-500
            'image' => 'storage/' . $member->profile_image,
            'social' => [
                'discord' => $member->discord_name,
                'email' => $member->private_email ?? $member->assigned_email,
            ],
        ];
    });
@endphp
<section id="team" class="py-20">
    <div class="container mx-auto px-4">
        <!-- ...Header... -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teamMembers as $member)
                <div class="bg-gray-900/50 border border-gray-800 rounded-xl overflow-hidden hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
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
        <!-- ...Link zum Team... -->
    </div>
</section>
