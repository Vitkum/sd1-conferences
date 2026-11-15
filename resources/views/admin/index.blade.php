@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.admin') }}</h2>

    <p>{{ __('ui.admin_description') }}</p>

    <div class="list-group mt-4">
        <a href="{{ route('admin.conferences.index') }}"
           class="list-group-item list-group-item-action">
            {{ __('ui.conference_management') }}
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="list-group-item list-group-item-action">
            {{ __('ui.user_management') }}
        </a>
    </div>
@endsection
