# New Contact Message

You have received a new contact message from your website.

**Name:** {{ $contact->name }}
**Email:** {{ $contact->email }}
**Phone:** {{ $contact->phone ?: 'Not provided' }}
**Proficiency:** {{ $contact->proficiency ?: 'Not specified' }}

**Message:**
{{ $contact->message }}

@if ($contact->file)
    A file was attached to this message.
@endif

Thanks,
{{ config('app.name') }}
