<footer class="bg-gray-900/80 border-t border-purple-500/20 backdrop-blur-md">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo and Info -->
            <div class="md:col-span-1">
                <div class="flex items-center space-x-2 mb-4">
                    <img src="{{ asset('images/temp.jpg') }}" alt="ICEKIDZ Logo" class="h-10 w-10">
                    <span class="text-2xl font-orbitron font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                        ICEKIDZ
                    </span>
                </div>
                <p class="text-gray-400 mb-4">
                    Das führende Gaming Netzwerk für innovative Projekte und Communities.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition-all duration-300">
                        <i class="fab fa-discord text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition-all duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-400 transition-all duration-300">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-pink-400 transition-all duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-4 border-b border-purple-500/30 pb-2">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Home</a></li>
                    <li><a href="{{ route('team') }}" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Team</a></li>
                    <li><a href="{{ route('cooperation') }}" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Kooperation</a></li>
                    <li><a href="{{ route('timeline') }}" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Timeline</a></li>
                    <li><a href="{{ route('concept') }}" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Konzept</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-4 border-b border-purple-500/30 pb-2">Support</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('server-status') }}" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Server Status</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-all duration-300">FAQ</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Regeln</a></li>
                    <li><a href="{{ route('apply') }}" class="text-gray-400 hover:text-purple-400 transition-all duration-300">Bewerben</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-4 border-b border-purple-500/30 pb-2">Newsletter</h3>
                <p class="text-gray-400 mb-4">
                    Bleib auf dem Laufenden mit unseren neuesten Updates und Projekten.
                </p>
                <form class="flex flex-col space-y-3">
                    <input type="email" placeholder="Deine Email" class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <button type="submit" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-blue-600 rounded-md hover:from-blue-600 hover:to-purple-600 transition-all duration-500">
                        Abonnieren
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} ICEKIDZ Gaming Network. Alle Rechte vorbehalten.
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="text-gray-500 hover:text-gray-300 text-sm">Impressum</a>
                <a href="#" class="text-gray-500 hover:text-gray-300 text-sm">Datenschutz</a>
                <a href="#" class="text-gray-500 hover:text-gray-300 text-sm">AGB</a>
            </div>
        </div>
    </div>
</footer>
