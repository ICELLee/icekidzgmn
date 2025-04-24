<section class="py-16 bg-gray-900/50 backdrop-blur-sm border-t border-b border-purple-500/20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto" data-aos="fade-up">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
                    Kontaktiere uns
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Hast du Fragen oder Anliegen? Wir sind hier, um dir zu helfen! Fülle einfach das Formular aus und wir melden uns so schnell wie möglich bei dir.
                </p>
            </div>

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-gray-300 mb-2">Dein Name</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-300 mb-2">Deine Email</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_type" class="block text-gray-300 mb-2">Art des Kontakts</label>
                        <select id="contact_type" name="contact_type" required
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 appearance-none">
                            <option value="" disabled selected>Bitte auswählen</option>
                            <option value="general">Allgemeine Fragen</option>
                            <option value="support">Support</option>
                        </select>
                    </div>
                    <div>
                        <label for="priority" class="block text-gray-300 mb-2">Priorität</label>
                        <select id="priority" name="priority"
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 appearance-none">
                            <option value="low">Niedrig</option>
                            <option value="medium" selected>Mittel</option>
                            <option value="high">Hoch</option>
                            <option value="urgent">Dringend</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-gray-300 mb-2">Deine Nachricht</label>
                    <textarea id="message" name="message" rows="5" required
                              class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full px-6 py-4 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-lg hover:shadow-purple-500/30 font-medium text-lg">
                        Nachricht senden
                    </button>
                </div>
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         class="fixed bottom-6 right-6 bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-4 rounded-lg shadow-xl animate__animated animate__fadeInUp z-50">
                        {{ session('success') }}
                    </div>
                @endif

            </form>
        </div>
    </div>
</section>
