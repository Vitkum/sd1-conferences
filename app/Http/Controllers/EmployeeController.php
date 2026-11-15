<?php

namespace App\Http\Controllers;

use App\Services\ConferenceService;

class EmployeeController extends Controller
{
    public function index()
    {
        $conferences = ConferenceService::all();

        return view('employee.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = ConferenceService::find($id);

        if (!$conference) {
            abort(404);
        }

        $conference['participants'] = $conference['participants'] ?? [];

        return view('employee.show', compact('conference'));
    }
}
