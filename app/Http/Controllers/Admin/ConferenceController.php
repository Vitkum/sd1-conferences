<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConferenceRequest;
use App\Http\Requests\UpdateConferenceRequest;

class ConferenceController extends Controller
{
    private function conferences()
    {
        if (!session()->has('conferences')) {
            session(['conferences' => [
                [
                    'id' => 1,
                    'title' => 'Programavimo pagrindai',
                    'description' => 'Konferencija apie programavimo pagrindus.',
                    'speaker' => 'Jonas Jonaitis',
                    'date' => '2026-12-05',
                    'time' => '10:00',
                    'location' => 'Vilnius'
                ],
                [
                    'id' => 2,
                    'title' => 'Dirbtinis intelektas versle',
                    'description' => 'Dirbtinio intelekto taikymas versle.',
                    'speaker' => 'Petras Petraitis',
                    'date' => '2026-12-12',
                    'time' => '11:00',
                    'location' => 'Kaunas'
                ],
                [
                    'id' => 3,
                    'title' => 'Interneto svetainių kūrimas',
                    'description' => 'Interneto svetainių kūrimo pagrindai.',
                    'speaker' => 'Ona Onaitytė',
                    'date' => '2026-12-19',
                    'time' => '12:00',
                    'location' => 'Vilnius'
                ],
                [
                    'id' => 4,
                    'title' => 'Informacinių technologijų naujovės',
                    'description' => 'Naujausios IT technologijos.',
                    'speaker' => 'Antanas Antanaitis',
                    'date' => '2026-10-15',
                    'time' => '09:00',
                    'location' => 'Klaipėda'
                ]
            ]]);
        }

        return session('conferences');
    }

    public function index()
    {
        $conferences = $this->conferences();

        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(StoreConferenceRequest $request)
    {
        $conferences = $this->conferences();

        $ids = array_column($conferences, 'id');
        $newId = empty($ids) ? 1 : max($ids) + 1;

        $conference = $request->validated();
        $conference['id'] = $newId;

        $conferences[] = $conference;

        session(['conferences' => $conferences]);

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', 'Konferencija sėkmingai sukurta!');
    }

    public function edit($id)
    {
        $conference = collect($this->conferences())
            ->firstWhere('id', (int) $id);

        if (!$conference) {
            abort(404);
        }

        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(UpdateConferenceRequest $request, $id)
    {
        $conferences = $this->conferences();
        $found = false;

        foreach ($conferences as &$conference) {
            if ($conference['id'] == $id) {
                $conference = array_merge(
                    $conference,
                    $request->validated()
                );
                $found = true;
                break;
            }
        }
        unset($conference);

        if (!$found) {
            abort(404);
        }

        session(['conferences' => $conferences]);

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', 'Konferencija sėkmingai atnaujinta!');
    }

    public function destroy($id)
    {
        $conferences = $this->conferences();

        foreach ($conferences as $key => $conference) {
            if ($conference['id'] == $id) {

                if ($conference['date'] < date('Y-m-d')) {
                    return redirect()
                        ->route('admin.conferences.index')
                        ->with('error', 'Įvykusios konferencijos trinti negalima!');
                }

                unset($conferences[$key]);

                session(['conferences' => array_values($conferences)]);

                return redirect()
                    ->route('admin.conferences.index')
                    ->with('success', 'Konferencija sėkmingai ištrinta!');
            }
        }

        abort(404);
    }
}
