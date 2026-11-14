<?php

namespace App\Http\Controllers;

class EmployeeController extends Controller
{
    private function conferences()
    {
        return [
            [
                'id' => 1,
                'title' => 'Programavimo pagrindai',
                'date' => '2026-12-05',
                'time' => '10:00',
                'location' => 'Vilnius',
                'speaker' => 'Jonas Jonaitis',
                'participants' => ['Tomas Tomasaitis', 'Rūta Petrauskaitė']
            ],
            [
                'id' => 2,
                'title' => 'Dirbtinis intelektas versle',
                'date' => '2026-12-12',
                'time' => '11:00',
                'location' => 'Kaunas',
                'speaker' => 'Petras Petraitis',
                'participants' => ['Laura Kazlauskaitė']
            ],
            [
                'id' => 3,
                'title' => 'Interneto svetainių kūrimas',
                'date' => '2026-12-19',
                'time' => '12:00',
                'location' => 'Vilnius',
                'speaker' => 'Ona Onaitytė',
                'participants' => []
            ],
            [
                'id' => 4,
                'title' => 'Informacinių technologijų naujovės',
                'date' => '2026-10-15',
                'time' => '09:00',
                'location' => 'Klaipėda',
                'speaker' => 'Antanas Antanaitis',
                'participants' => ['Jonas Jonaitis', 'Aistė Petrauskaitė']
            ]
        ];
    }

    public function index()
    {
        $conferences = $this->conferences();

        return view('employee.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = collect($this->conferences())
            ->firstWhere('id', (int) $id);

        if (!$conference) {
            abort(404);
        }

        return view('employee.show', compact('conference'));
    }
}
