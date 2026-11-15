@extends('layouts.app')

@section('content')
    <h2>Naujos konferencijos kūrimas</h2>

    <form action="{{ route('admin.conferences.store') }}"
          method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pavadinimas</label>
            <input type="text" name="title"
                   value="{{ old('title') }}"
                   class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Aprašymas</label>
            <textarea name="description"
                      class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Lektorius</label>
            <input type="text" name="speaker"
                   value="{{ old('speaker') }}"
                   class="form-control">
            @error('speaker')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="date"
                   value="{{ old('date') }}"
                   class="form-control">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Laikas</label>
            <input type="time" name="time"
                   value="{{ old('time') }}"
                   class="form-control">
            @error('time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Vieta</label>
            <input type="text" name="location"
                   value="{{ old('location') }}"
                   class="form-control">
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Išsaugoti
        </button>

        <a href="{{ route('admin.conferences.index') }}"
           class="btn btn-secondary">
            Atšaukti
        </a>
    </form>
@endsection
