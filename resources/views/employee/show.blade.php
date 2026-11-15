@extends('layouts.app')

@section('content')
    <h2>{{ $conference['title'] }}</h2>

    <div class="card mt-4">
        <div class="card-body">
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

            <p>
                <strong>{{ __('ui.speaker') }}:</strong>
                {{ $conference['speaker'] }}
            </p>

            <h4 class="mt-4">{{ __('ui.participants') }}</h4>

            @if(count($conference['participants']) > 0)
                <ul class="list-group mt-3">
                    @foreach($conference['participants'] as $participant)
                        <li class="list-group-item">
                            {{ $participant }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>{{ __('ui.no_participants') }}</p>
            @endif
        </div>
    </div>

    <a href="{{ route('employee.index') }}" class="btn btn-secondary mt-3">
        {{ __('ui.back_to_list') }}
    </a>
@endsection
