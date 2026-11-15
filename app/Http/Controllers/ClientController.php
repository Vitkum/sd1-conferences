<?php

namespace App\Http\Controllers;

use App\Services\ConferenceService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $conferences = array_filter(
            ConferenceService::all(),
            function ($conference) {
                return $conference['date'] >= date('Y-m-d');
            }
        );

        return view('client.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = ConferenceService::find($id);

        if (!$conference || $conference['date'] < date('Y-m-d')) {
            abort(404);
        }

        return view('client.show', compact('conference'));
    }

    public function register(Request $request, $id)
    {
        $conference = ConferenceService::find($id);

        if (!$conference || $conference['date'] < date('Y-m-d')) {
            abort(404);
        }

        return redirect()
            ->route('client.index')
            ->with('success', __('ui.registration_success'));
    }
}
