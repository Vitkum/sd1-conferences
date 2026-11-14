@extends('layouts.app')

@section('content')
    <h1>Konferencijų registracijos sistema</h1>

    <p>Studentas: Matas Vitkus</p>
    <p>Grupė: PIT-23-I-NT</p>

    <h3 class="mt-4">Pasirinkite posistemį</h3>

    <div class="list-group mt-3">
        <a href="{{ route('client.index') }}"
           class="list-group-item list-group-item-action">
            Kliento posistemis
        </a>

        <a href="{{ route('employee.index') }}"
           class="list-group-item list-group-item-action">
            Darbuotojo posistemis
        </a>

        <a href="#"
           class="list-group-item list-group-item-action">
            Administratoriaus posistemis
        </a>
    </div>
@endsection
