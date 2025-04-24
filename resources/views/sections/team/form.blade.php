<form action="{{ route('apply.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <input type="hidden" name="job_id" value="{{ $jobId }}">

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
        <label class="block text-gray-300 mb-2">Wie möchtest du kontaktiert werden? *</label>
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
                <input type="checkbox" id="contact_other" name="contact_methods[]" value="other" class="mr-3 rounded bg-gray-800 border-gray-700 text-purple-500 focus:ring-purple-500">
                <label for="contact_other" class="text-gray-300">Sonstiges</label>
                <input type="text" name="other_contact" placeholder="Bitte angeben"
                       class="ml-3 px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50 hidden"
                       data-contact-field="other">
            </div>
        </div>
    </div>

    <div>
        <label for="message" class="block text-gray-300 mb-2">Nachricht an uns - Warum du? *</label>
        <textarea id="message" name="message" rows="5" required
                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"></textarea>
    </div>

    <div>
        <label class="block text-gray-300 mb-2">Verfügbarkeit *</label>
        <div class="overflow-x-auto">
            <table class="w-full bg-gray-800/50 border border-gray-700 rounded-lg">
                <thead class="bg-gray-700/50">
                <tr>
                    <th class="px-4 py-2 text-left text-sm text-gray-300">Wochentag</th>
                    <th class="px-4 py-2 text-left text-sm text-gray-300">Von</th>
                    <th class="px-4 py-2 text-left text-sm text-gray-300">Bis</th>
                </tr>
                </thead>
                <tbody>
                @foreach(['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'] as $day)
                    <tr class="border-t border-gray-700">
                        <td class="px-4 py-3 text-gray-300">{{ $day }}</td>
                        <td class="px-4 py-3">
                            <select name="availability[{{ strtolower($day) }}][from]" class="bg-gray-800 border border-gray-700 rounded px-3 py-2 text-gray-300 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                                @for($i = 0; $i <= 23; $i++)
                                    <option value="{{ sprintf('%02d:00', $i) }}">{{ sprintf('%02d:00', $i) }}</option>
                                @endfor
                            </select>
                        </td>
                        <td class="px-4 py-3">
                            <select name="availability[{{ strtolower($day) }}][to]" class="bg-gray-800 border border-gray-700 rounded px-3 py-2 text-gray-300 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-transparent">
                                @for($i = 0; $i <= 23; $i++)
                                    <option value="{{ sprintf('%02d:00', $i) }}" {{ $i === 23 ? 'selected' : '' }}>{{ sprintf('%02d:00', $i) }}</option>
                                @endfor
                            </select>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <label for="references" class="block text-gray-300 mb-2">Referenzen / Portfolio</label>
        <textarea id="references" name="references" rows="3"
                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"
                  placeholder="Links zu Referenzen oder Portfolio (optional)"></textarea>
    </div>

    <div>
        <label for="cv" class="block text-gray-300 mb-2">Lebenslauf hochladen (optional)</label>
        <input type="file" id="cv" name="cv"
               class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-500/50"
               accept=".pdf,.doc,.docx">
        <p class="text-gray-500 text-sm mt-1">Erlaubte Formate: PDF, DOC, DOCX (max. 5MB)</p>
    </div>

    <div class="pt-4">
        <button type="submit"
                class="w-full px-6 py-4 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-500 shadow-lg hover:shadow-purple-500/30 font-medium text-lg">
            Bewerbung absenden
        </button>
    </div>
</form>

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
        const form = document.querySelector('form');
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
