@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.edit_user') }}</h2>

    <form action="{{ route('admin.users.update', $user['id']) }}"
          method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">
                {{ __('ui.first_name') }}
            </label>

            <input type="text" name="first_name"
                   value="{{ old('first_name', $user['first_name']) }}"
                   class="form-control">

            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">
                {{ __('ui.last_name') }}
            </label>

            <input type="text" name="last_name"
                   value="{{ old('last_name', $user['last_name']) }}"
                   class="form-control">

            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">
                {{ __('ui.email') }}
            </label>

            <input type="email" name="email"
                   value="{{ old('email', $user['email']) }}"
                   class="form-control">

            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            {{ __('ui.save') }}
        </button>

        <a href="{{ route('admin.users.index') }}"
           class="btn btn-secondary">
            {{ __('ui.cancel') }}
        </a>
    </form>
@endsection
