@component('mail::message')
    # Neue Kontaktanfrage erhalten

    **Name:** {{ $contact->name }}
    **E-Mail:** {{ $contact->email }}
    **Art:** {{ $contact->contact_type }}
    **Priorität:** {{ ucfirst($contact->priority) }}
    **Ticketnummer:** {{ $contact->ticket_number }}

    ---

    **Nachricht:**
    {{ $contact->message }}

@endcomponent
