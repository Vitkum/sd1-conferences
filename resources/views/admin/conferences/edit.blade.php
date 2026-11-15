@extends('layouts.app')

@section('content')
    <h2>{{ __('ui.edit_conference') }}</h2>

    <form action="{{ route('admin.conferences.update', $conference['id']) }}"
          method="POST" class="mt-4">
        @csrf
        @method('PUT')

        @include('admin.conferences.form')

        <button type="submit" class="btn btn-success">
            {{ __('ui.save_changes') }}
        </button>

        <a href="{{ route('admin.conferences.index') }}"
           class="btn btn-secondary">
            {{ __('ui.cancel') }}
        </a>
    </form>
@endsection
