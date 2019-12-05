@extends('layouts.template')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
@section('title', 'Welcome to The Vinyl Shop')


    <style>

    </style>
</head>
<body>
@section('main')
    <h1>Contact us</h1>
    @include('shared.alert')

    @if (!session()->has('success'))
    <form action="/contact-us" method="post" novalidate>
        @csrf


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                   placeholder="Your name"
                   required
                   value="{{ old('name') }}">
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>




        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email"
                   class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                   placeholder="Your email"
                   required
                   value="{{ old('email') }}">
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        </div>





        <div class="form-group">
            <label for="contact">Contact</label>
            <select id="contact"
                    class="form-control {{ $errors->first('contact') ? 'is-invalid' : '' }}" name="contact"
                    required
            >
                <option  class="form-control" selected disabled value="">Select a contact</option>
                <option  value="info@thevinylshop.com">info</option>
                <option value="billing@thevinylshop.com">billing</option>
                <option value="support@thevinylshop.com">support</option>
            </select>
            <div class="invalid-feedback">{{ $errors->first('contact') }}</div>
        </div>


















        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="5"
                      class="form-control {{ $errors->first('message') ? 'is-invalid' : '' }}"
                      placeholder="Your message"
                      required
                      minlength="10">{{ old('message') }}</textarea>
            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
        </div>
        <button type="submit" class="btn btn-success">Send Message</button>
    </form>
    @endif
@endsection


</body>
</html>
