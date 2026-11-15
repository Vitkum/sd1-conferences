@extends('layouts.app')

@section('content')
    <h2>Konferencijos redagavimas</h2>

    <form action="{{ route('admin.conferences.update', $conference['id']) }}"
          method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pavadinimas</label>
            <input type="text" name="title"
                   value="{{ old('title', $conference['title']) }}"
                   class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Aprašymas</label>
            <textarea name="description"
                      class="form-control">{{ old('description', $conference['description']) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Lektorius</label>
            <input type="text" name="speaker"
                   value="{{ old('speaker', $conference['speaker']) }}"
                   class="form-control">
            @error('speaker')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="date"
                   value="{{ old('date', $conference['date']) }}"
                   class="form-control">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Laikas</label>
            <input type="time" name="time"
                   value="{{ old('time', $conference['time']) }}"
                   class="form-control">
            @error('time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Vieta</label>
            <input type="text" name="location"
                   value="{{ old('location', $conference['location']) }}"
                   class="form-control">
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Išsaugoti pakeitimus
        </button>

        <a href="{{ route('admin.conferences.index') }}"
           class="btn btn-secondary">
            Atšaukti
        </a>
    </form>
@endsection
