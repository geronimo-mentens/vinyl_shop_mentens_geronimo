@component('mail::message')
    # Dear {{ $request->name }},
    Thanks for your message.
    We'll contact you as soon as possible.


   Your name: {{ $request->name }} <br>
   Your email: {{ $request->email }} <br>
    Your message: {{ $request->message }} <br>
    Your contact person: {{ $request->contact }} <br>

    Thanks,
    {{ config('app.name') }}
@endcomponent