@extends('layouts.app')

@section('content')
    <h1>{{ __('ui.home_title') }}</h1>

    <p>{{ __('ui.student') }}: Matas Vitkus</p>
    <p>{{ __('ui.group') }}: PIT-23-I-NT</p>

    <h3 class="mt-4">{{ __('ui.choose_role') }}</h3>

    <div class="list-group mt-3">
        <a href="{{ route('client.index') }}"
           class="list-group-item list-group-item-action">
            {{ __('ui.client') }}
        </a>

        <a href="{{ route('employee.index') }}"
           class="list-group-item list-group-item-action">
            {{ __('ui.employee') }}
        </a>

        <a href="{{ route('admin.index') }}"
           class="list-group-item list-group-item-action">
            {{ __('ui.admin') }}
        </a>
    </div>
@endsection
