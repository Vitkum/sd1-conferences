@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.create_conference') }}</h2>

    <form action="{{ route('admin.conferences.store') }}"
          method="POST" class="mt-4">
        @csrf

        @include('admin.conferences.form')

        <button type="submit" class="btn btn-success">
            {{ __('ui.save') }}
        </button>

        <a href="{{ route('admin.conferences.index') }}"
           class="btn btn-secondary">
            {{ __('ui.cancel') }}
        </a>
    </form>
@endsection
