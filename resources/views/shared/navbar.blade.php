<nav class="fixed top-0 left-0 right-0 z-50 bg-gray-900/80 backdrop-blur-md border-b border-purple-500/20 shadow-lg">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                <img src="{{ asset('images/temp.jpg') }}" alt="ICEKIDZ Logo" class="h-10 w-10">
                <span class="text-2xl font-orbitron font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400 group-hover:from-blue-400 group-hover:to-purple-400 transition-all duration-500">
                    ICEKIDZ
                </span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-white hover:text-purple-400 transition-all duration-300 relative group">
                    Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('team') }}" class="text-white hover:text-purple-400 transition-all duration-300 relative group">
                    Team
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('cooperation') }}" class="text-white hover:text-purple-400 transition-all duration-300 relative group">
                    Kooperation
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('timeline') }}" class="text-white hover:text-purple-400 transition-all duration-300 relative group">
                    Timeline
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('concept') }}" class="text-white hover:text-purple-400 transition-all duration-300 relative group">
                    Konzept
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ route('server-status') }}" class="text-white hover:text-purple-400 transition-all duration-300 relative group">
                    Server Status
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-purple-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 rounded-md hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-lg hover:shadow-purple-500/30">
                    Bewerben
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-900/95 backdrop-blur-lg border-t border-purple-500/20">
        <div class="container mx-auto px-4 py-3 flex flex-col space-y-4">
            <a href="{{ route('home') }}" class="text-white hover:text-purple-400 transition-all duration-300 py-2 border-b border-gray-800">Home</a>
            <a href="{{ route('team') }}" class="text-white hover:text-purple-400 transition-all duration-300 py-2 border-b border-gray-800">Team</a>
            <a href="{{ route('cooperation') }}" class="text-white hover:text-purple-400 transition-all duration-300 py-2 border-b border-gray-800">Kooperation</a>
            <a href="{{ route('timeline') }}" class="text-white hover:text-purple-400 transition-all duration-300 py-2 border-b border-gray-800">Timeline</a>
            <a href="{{ route('concept') }}" class="text-white hover:text-purple-400 transition-all duration-300 py-2 border-b border-gray-800">Konzept</a>
            <a href="{{ route('server-status') }}" class="text-white hover:text-purple-400 transition-all duration-300 py-2 border-b border-gray-800">Server Status</a>
            <a href="#" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 rounded-md hover:from-blue-600 hover:to-purple-600 transition-all duration-500 text-center">
                Bewerben
            </a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
