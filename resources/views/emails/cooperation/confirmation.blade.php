@component('mail::message')
    # Hallo {{ $firstName }},

    vielen Dank für deine Kooperationsanfrage bei **ICEKIDZ**!

    Wir haben deine Anfrage erhalten und werden sie so schnell wie möglich bearbeiten.
    Deine **Ticketnummer** lautet:

    @component('mail::panel')
        📨 **{{ $ticketNumber }}**
    @endcomponent

    Du erhältst eine Rückmeldung, sobald wir deine Anfrage geprüft haben.

    Mit freundlichen Grüßen
    **Das ICEKIDZ-Team**
@endcomponent
