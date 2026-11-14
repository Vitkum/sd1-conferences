@extends('layouts.app')

@section('content')
    <h2>{{ $conference['title'] }}</h2>

    <div class="card mt-4">
        <div class="card-body">
            <p><strong>Data:</strong> {{ $conference['date'] }}</p>
            <p><strong>Laikas:</strong> {{ $conference['time'] }}</p>
            <p><strong>Vieta:</strong> {{ $conference['location'] }}</p>
            <p><strong>Lektorius:</strong> {{ $conference['speaker'] }}</p>

            <h4 class="mt-4">Užsiregistravę klientai</h4>

            @if(count($conference['participants']) > 0)
                <ul class="list-group mt-3">
                    @foreach($conference['participants'] as $participant)
                        <li class="list-group-item">
                            {{ $participant }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Užsiregistravusių klientų nėra.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('employee.index') }}" class="btn btn-secondary mt-3">
        Grįžti į sąrašą
    </a>
@endsection
