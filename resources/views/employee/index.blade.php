
@extends('layouts.app')

@section('content')
    <h2>Visos konferencijos</h2>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Data</th>
                <th>Vieta</th>
                <th>Būsena</th>
                <th>Veiksmai</th>
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
                            Įvykusi
                        @else
                            Planuojama
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employee.show', $conference['id']) }}"
                           class="btn btn-primary btn-sm">
                            Peržiūrėti
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
