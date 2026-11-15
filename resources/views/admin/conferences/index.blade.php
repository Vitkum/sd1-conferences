@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.conference_management') }}</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('admin.conferences.create') }}"
       class="btn btn-success mt-3">
        {{ __('ui.add_conference') }}
    </a>

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
                        <a href="{{ route('admin.conferences.edit', $conference['id']) }}"
                           class="btn btn-primary btn-sm">
                            {{ __('ui.edit') }}
                        </a>

                        @if($conference['date'] >= date('Y-m-d'))
                            <form action="{{ route('admin.conferences.destroy', $conference['id']) }}"
                                  method="POST"
                                  class="d-inline delete-form"
                                  data-confirm="{{ __('ui.delete_confirm') }}"
                                  data-yes="{{ __('ui.yes_delete') }}"
                                  data-no="{{ __('ui.no_cancel') }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    {{ __('ui.delete') }}
                                </button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>
                                {{ __('ui.completed') }}
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.index') }}" class="btn btn-secondary">
        {{ __('ui.back') }}
    </a>
@endsection
