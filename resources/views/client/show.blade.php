@extends('layouts.app')

@section('content')
    <h2>{{ $conference['title'] }}</h2>

    <div class="card mt-4">
        <div class="card-body">
            <p>
                <strong>{{ __('ui.description') }}:</strong>
                {{ $conference['description'] }}
            </p>

            <p>
                <strong>{{ __('ui.speaker') }}:</strong>
                {{ $conference['speaker'] }}
            </p>

            <p>
                <strong>{{ __('ui.date') }}:</strong>
                {{ $conference['date'] }}
            </p>

            <p>
                <strong>{{ __('ui.time') }}:</strong>
                {{ $conference['time'] }}
            </p>

            <p>
                <strong>{{ __('ui.location') }}:</strong>
                {{ $conference['location'] }}
            </p>

            <form action="{{ route('client.register', $conference['id']) }}"
                  method="POST">
                @csrf

                <button type="submit" class="btn btn-success">
                    {{ __('ui.register') }}
                </button>
            </form>
        </div>
    </div>

    <a href="{{ route('client.index') }}" class="btn btn-secondary mt-3">
        {{ __('ui.back_to_list') }}
    </a>
@endsection
