@component('mail::message')
    # Hallo {{ $contact->name }},

    Wir haben dir auf dein Anliegen **({{ $contact->ticket_number }})** geantwortet:

    ---

    {{ $contact->reply }}

    @if($contact->attachment)
        Ein Anhang ist dieser E-Mail beigefügt.
    @endif

    Viele Grüße
    Dein Support-Team
@endcomponent
