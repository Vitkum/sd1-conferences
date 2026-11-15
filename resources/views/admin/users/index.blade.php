@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.user_management') }}</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>{{ __('ui.first_name') }}</th>
                <th>{{ __('ui.last_name') }}</th>
                <th>{{ __('ui.email') }}</th>
                <th>{{ __('ui.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user['first_name'] }}</td>
                    <td>{{ $user['last_name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user['id']) }}"
                           class="btn btn-primary btn-sm">
                            {{ __('ui.edit') }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.index') }}"
       class="btn btn-secondary">
        {{ __('ui.back') }}
    </a>
@endsection
