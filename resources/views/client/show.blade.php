
@extends('layouts.app')

@section('content')
    <h2>{{ $conference['title'] }}</h2>

    <div class="card mt-4">
        <div class="card-body">
            <p><strong>Aprašymas:</strong> {{ $conference['description'] }}</p>
            <p><strong>Lektorius:</strong> {{ $conference['speaker'] }}</p>
            <p><strong>Data:</strong> {{ $conference['date'] }}</p>
            <p><strong>Laikas:</strong> {{ $conference['time'] }}</p>
            <p><strong>Vieta:</strong> {{ $conference['location'] }}</p>

            <form action="{{ route('client.register', $conference['id']) }}"
                  method="POST">
                @csrf
                <button type="submit" class="btn btn-success">
                    Registruotis
                </button>
            </form>
        </div>
    </div>

    <a href="{{ route('client.index') }}" class="btn btn-secondary mt-3">
        Grįžti į sąrašą
    </a>
@endsection
