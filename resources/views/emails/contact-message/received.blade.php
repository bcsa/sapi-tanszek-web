@component('vendor.mail.text.message')
# New Contact Message 

From: **{{ $contactMessage->name }}** ({{ $contactMessage->email }})

{{ $contactMessage->message }}

@endcomponent
