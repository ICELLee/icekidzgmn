@component('mail::message')
    # Danke für deine Nachricht, {{ $contact->name }}!

    Wir haben deine Anfrage erhalten und kümmern uns schnellstmöglich darum.

    ---

    **Ticketnummer:** {{ $contact->ticket_number }}

    **Deine Nachricht:**
    {{ $contact->message }}

    Mit freundlichen Grüßen
    Dein Team

@endcomponent
