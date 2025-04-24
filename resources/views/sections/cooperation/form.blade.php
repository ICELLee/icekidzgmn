<div class="bg-gray-900/50 border border-gray-800 rounded-xl p-8 shadow-xl backdrop-blur-sm" data-aos="fade-up">
    @if(session('success'))
        <div class="mb-8 p-4 bg-green-900/50 border border-green-800 rounded-lg text-green-400">
            {{ session('success') }}
        </div>
    @endif

        <form id="coop-form" action="{{ route('cooperation.submit') }}" method="POST" class="space-y-6">
        @csrf

        <h3 class="text-2xl font-bold mb-6 font-orbitron bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">
            Kooperationsanfrage
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="block text-gray-300 mb-2">Vorname *</label>
                <input type="text" id="first_name" name="first_name" required
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
            </div>
            <div>
                <label for="last_name" class="block text-gray-300 mb-2">Nachname *</label>
                <input type="text" id="last_name" name="last_name" required
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
            </div>
        </div>

        <div>
            <label for="email" class="block text-gray-300 mb-2">Email *</label>
            <input type="email" id="email" name="email" required
                   class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
        </div>

        <div>
            <label for="project_name" class="block text-gray-300 mb-2">Projekt-/Firmenname</label>
            <input type="text" id="project_name" name="project_name"
                   class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
        </div>

        <div>
            <label for="project_type" class="block text-gray-300 mb-2">Art deines Projekts *</label>
            <select id="project_type" name="project_type" required
                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 appearance-none">
                <option value="" disabled selected>Bitte auswählen</option>
                <option value="minecraft">Minecraft Server</option>
                <option value="company">Allgemeine Firma</option>
                <option value="youtuber">YouTuber</option>
                <option value="streamer">Livestreamer</option>
                <option value="influencer">Influencer</option>
                <option value="clan">Clan</option>
                <option value="community">Community</option>
                <option value="other">Etwas anderes</option>
            </select>
        </div>

        <div>
            <label for="why_fit" class="block text-gray-300 mb-2">Wieso sollte dein Projekt zu uns passen? *</label>
            <textarea id="why_fit" name="why_fit" rows="4" required
                      class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"></textarea>
        </div>

        <div>
            <label for="expectations" class="block text-gray-300 mb-2">Was erwartest du von uns? *</label>
            <textarea id="expectations" name="expectations" rows="4" required
                      class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"></textarea>
        </div>

        <div>
            <label for="social_media" class="block text-gray-300 mb-2">Social Media Kanäle (falls vorhanden)</label>
            <textarea id="social_media" name="social_media" rows="2"
                      class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"
                      placeholder="Bitte Links zu deinen Social Media Kanälen angeben"></textarea>
        </div>

        <div>
            <label for="coop_suggestion" class="block text-gray-300 mb-2">Kooperationsvorschlag</label>
            <textarea id="coop_suggestion" name="coop_suggestion" rows="3"
                      class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"
                      placeholder="Hast du konkrete Ideen für eine Kooperation?"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="team_members" class="block text-gray-300 mb-2">Aktive Teamler (Anzahl)</label>
                <input type="number" id="team_members" name="team_members" min="0"
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
            </div>
            <div>
                <label for="user_numbers" class="block text-gray-300 mb-2">Aktive Nutzerzahlen</label>
                <input type="number" id="user_numbers" name="user_numbers" min="0"
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50">
            </div>
        </div>

        <div>
            <label for="main_country" class="block text-gray-300 mb-2">Woher kommt der Großteil deiner Reichweite? *</label>
            <select id="main_country" name="main_country" required
                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 appearance-none">
                <option value="" disabled selected>Land auswählen</option>
                @foreach($countries as $code => $name)
                    <option value="{{ $code }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-300 mb-2">Bevorzugte Kontaktmethode(n) *</label>
            <div class="space-y-3">
                <div class="flex items-center">
                    <input type="checkbox" id="contact_discord" name="contact_methods[]" value="discord" class="mr-3 rounded bg-gray-800 border-gray-700 text-purple-500 focus:ring-purple-500">
                    <label for="contact_discord" class="text-gray-300">Discord</label>
                    <input type="text" name="discord_username" placeholder="Benutzername#1234"
                           class="ml-3 px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 hidden"
                           data-contact-field="discord">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="contact_email" name="contact_methods[]" value="email" class="mr-3 rounded bg-gray-800 border-gray-700 text-purple-500 focus:ring-purple-500" checked>
                    <label for="contact_email" class="text-gray-300">Email</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="contact_whatsapp" name="contact_methods[]" value="whatsapp" class="mr-3 rounded bg-gray-800 border-gray-700 text-purple-500 focus:ring-purple-500">
                    <label for="contact_whatsapp" class="text-gray-300">WhatsApp</label>
                    <input type="text" name="whatsapp_number" placeholder="+49 123 456789"
                           class="ml-3 px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 hidden"
                           data-contact-field="whatsapp">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="contact_instagram" name="contact_methods[]" value="instagram" class="mr-3 rounded bg-gray-800 border-gray-700 text-purple-500 focus:ring-purple-500">
                    <label for="contact_instagram" class="text-gray-300">Instagram</label>
                    <input type="text" name="instagram_username" placeholder="@benutzername"
                           class="ml-3 px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 hidden"
                           data-contact-field="instagram">
                </div>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="w-full px-6 py-4 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-lg hover:shadow-purple-500/30 font-medium text-lg">
                Kooperationsanfrage senden
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show/hide contact method fields based on checkbox selection
        const contactCheckboxes = document.querySelectorAll('input[name="contact_methods[]"]');

        contactCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const contactField = document.querySelector(`[data-contact-field="${this.value}"]`);
                if (contactField) {
                    contactField.classList.toggle('hidden', !this.checked);
                    if (this.checked) {
                        contactField.focus();
                    }
                }
            });

            // Trigger change event on page load if checkbox is checked
            if (checkbox.checked) {
                checkbox.dispatchEvent(new Event('change'));
            }
        });

        // Form validation
        const form = document.querySelector('#coop-form');
        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Check if at least one contact method is selected
            const contactMethods = document.querySelectorAll('input[name="contact_methods[]"]:checked');
            if (contactMethods.length === 0) {
                isValid = false;
                alert('Bitte wähle mindestens eine Kontaktmethode aus.');
            }

            // Check if required fields for selected contact methods are filled
            contactMethods.forEach(method => {
                const field = document.querySelector(`[data-contact-field="${method.value}"]`);
                if (field && !field.classList.contains('hidden') && !field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                    field.addEventListener('input', function() {
                        if (this.value.trim()) {
                            this.classList.remove('border-red-500');
                        }
                    });
                }
            });

            if (!isValid) {
                e.preventDefault();

                // Scroll to first error
                const firstError = form.querySelector('.border-red-500');
                if (firstError) {
                    firstError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }
        });
    });
</script>
