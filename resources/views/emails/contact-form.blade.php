@component('mail::message')
# {{ __('Dear Admin') }}

## {{ __('New Contact Form Submission details') }} 

- **{{__('Name')}}:** {{ $contact->name }}
- **{{__('Email')}}:** {{ $contact->email }}
- **{{__('Phone number')}}:** {{ $contact->phone_number }}

**{{__('Message')}}:**
<p>
{{ $contact->message }}
</p>
@endcomponent
