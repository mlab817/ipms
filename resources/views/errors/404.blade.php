@php
  $error_number = 403;
@endphp

@php
  $default_error_message = "Please <a href='javascript:history.back()''>go back</a> or return to <a href='".url('')."'>our homepage</a>.";
@endphp

@extends('layouts.errors')

@section('content')
  @php($error_message = isset($exception)? ($exception->getMessage() ? $exception->getMessage() : $default_error_message) : $default_error_message)
  <x-error-page :error="$error_number" :message="$error_message"></x-error-page>
@endsection
