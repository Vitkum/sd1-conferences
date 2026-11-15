<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    private function conferences()
    {
        return [
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
                'description' => 'Konferencija apie dirbtinio intelekto taikymą versle.',
                'speaker' => 'Petras Petraitis',
                'date' => '2026-12-12',
                'time' => '11:00',
                'location' => 'Kaunas'
            ],
            [
                'id' => 3,
                'title' => 'Interneto svetainių kūrimas',
                'description' => 'Konferencija apie interneto svetainių kūrimą.',
                'speaker' => 'Ona Onaitytė',
                'date' => '2026-12-19',
                'time' => '12:00',
                'location' => 'Vilnius'
            ]
        ];
    }

    public function index()
    {
        $conferences = $this->conferences();

        return view('client.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = collect($this->conferences())
            ->firstWhere('id', (int) $id);

        if (!$conference) {
            abort(404);
        }

        return view('client.show', compact('conference'));
    }

    public function register(Request $request, $id)
    {
        $conference = collect($this->conferences())
            ->firstWhere('id', (int) $id);

        if (!$conference) {
            abort(404);
        }

        return redirect()
            ->route('client.index')
            ->with('success', __('ui.registration_success'));
    }
}
