
@extends('layouts.app')

@section('content')
    <h2>Konferencijų valdymas</h2>

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
        Pridėti konferenciją
    </a>

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
                        <a href="{{ route('admin.conferences.edit', $conference['id']) }}"
                           class="btn btn-primary btn-sm">
                            Redaguoti
                        </a>

                        @if($conference['date'] >= date('Y-m-d'))
                            <form action="{{ route('admin.conferences.destroy', $conference['id']) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Ar tikrai norite ištrinti konferenciją?')">
                                    Ištrinti
                                </button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>
                                Įvykusi
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.index') }}"
       class="btn btn-secondary">
        Grįžti
    </a>
@endsection
