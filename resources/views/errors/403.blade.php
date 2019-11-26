@extends('layouts.template')
@section('main')

    <h3 class="text-center my-5">403 | <span class="text-black-50">{{ $exception->getMessage() ?: 'Forbidden' }}</span></h3>

    @include('errors.errorbuttons' )


@endsection