@extends('layouts.app')

@section('content')
    <h2>Planuojamos konferencijos</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Data</th>
                <th>Vieta</th>
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
                        <a href="{{ route('client.show', $conference['id']) }}"
                           class="btn btn-primary btn-sm">
                            Peržiūrėti
                        </a>

                        <form action="{{ route('client.register', $conference['id']) }}"
                              method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">
                                Registruotis
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
