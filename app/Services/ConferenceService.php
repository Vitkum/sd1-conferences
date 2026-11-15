<?php

namespace App\Services;

class ConferenceService
{
    public static function all()
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
                    'location' => 'Vilnius',
                    'participants' => ['Tomas Tomasaitis', 'Rūta Petrauskaitė']
                ],
                [
                    'id' => 2,
                    'title' => 'Dirbtinis intelektas versle',
                    'description' => 'Konferencija apie dirbtinio intelekto taikymą versle.',
                    'speaker' => 'Petras Petraitis',
                    'date' => '2026-12-12',
                    'time' => '11:00',
                    'location' => 'Kaunas',
                    'participants' => ['Laura Kazlauskaitė']
                ],
                [
                    'id' => 3,
                    'title' => 'Interneto svetainių kūrimas',
                    'description' => 'Konferencija apie interneto svetainių kūrimą.',
                    'speaker' => 'Ona Onaitytė',
                    'date' => '2026-12-19',
                    'time' => '12:00',
                    'location' => 'Vilnius',
                    'participants' => []
                ],
                [
                    'id' => 4,
                    'title' => 'Informacinių technologijų naujovės',
                    'description' => 'Konferencija apie IT naujoves.',
                    'speaker' => 'Antanas Antanaitis',
                    'date' => '2026-10-15',
                    'time' => '09:00',
                    'location' => 'Klaipėda',
                    'participants' => ['Jonas Jonaitis', 'Aistė Petrauskaitė']
                ]
            ]]);
        }

        return session('conferences');
    }

    public static function find($id)
    {
        return collect(self::all())->firstWhere('id', (int) $id);
    }

    public static function save($conferences)
    {
        session(['conferences' => $conferences]);
    }
}
