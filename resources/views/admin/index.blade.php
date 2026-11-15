@extends('layouts.app')

@section('content')
    <h2>Administratoriaus posistemis</h2>

    <p>Pasirinkite, ką norite valdyti:</p>

    <div class="list-group mt-4">
        <a href="{{ route('admin.conferences.index') }}"
           class="list-group-item list-group-item-action">
            Konferencijų valdymas
        </a>

        <a href="#"
           class="list-group-item list-group-item-action">
            Naudotojų valdymas
        </a>
    </div>
@endsection
