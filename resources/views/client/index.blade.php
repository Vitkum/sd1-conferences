@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.planned_conferences') }}</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>{{ __('ui.title') }}</th>
                <th>{{ __('ui.date') }}</th>
                <th>{{ __('ui.location') }}</th>
                <th>{{ __('ui.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conferences as $conference)
                <tr>
                    <td>{{ $conference['title'] }}</td>
                    <td>{{ $conference['date'] }}</td>
                    <td>{{ $conference['location'] }}</td>
                    <td>
                        <a href="{{ route('client.show', $conference['id']) }}"
                           class="btn btn-primary btn-sm">
                            {{ __('ui.view') }}
                        </a>

                        <form action="{{ route('client.register', $conference['id']) }}"
                              method="POST" class="d-inline">
                            @csrf

                            <button type="submit" class="btn btn-success btn-sm">
                                {{ __('ui.register') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
