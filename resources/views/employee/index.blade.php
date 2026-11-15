@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.all_conferences') }}</h2>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>{{ __('ui.title') }}</th>
                <th>{{ __('ui.date') }}</th>
                <th>{{ __('ui.location') }}</th>
                <th>{{ __('ui.status') }}</th>
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
                        @if($conference['date'] < date('Y-m-d'))
                            {{ __('ui.completed') }}
                        @else
                            {{ __('ui.planned') }}
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('employee.show', $conference['id']) }}"
                           class="btn btn-primary btn-sm">
                            {{ __('ui.view') }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
