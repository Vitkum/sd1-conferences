<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConferenceRequest;
use App\Http\Requests\UpdateConferenceRequest;
use App\Services\ConferenceService;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = ConferenceService::all();

        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(StoreConferenceRequest $request)
    {
        $conferences = ConferenceService::all();

        $ids = array_column($conferences, 'id');
        $newId = empty($ids) ? 1 : max($ids) + 1;

        $conference = $request->validated();
        $conference['id'] = $newId;
        $conference['participants'] = [];

        $conferences[] = $conference;

        ConferenceService::save($conferences);

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('ui.conference_created'));
    }

    public function edit($id)
    {
        $conference = ConferenceService::find($id);

        if (!$conference) {
            abort(404);
        }

        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(UpdateConferenceRequest $request, $id)
    {
        $conferences = ConferenceService::all();
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

        ConferenceService::save($conferences);

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('ui.conference_updated'));
    }

    public function destroy($id)
    {
        $conferences = ConferenceService::all();

        foreach ($conferences as $key => $conference) {
            if ($conference['id'] == $id) {

                if ($conference['date'] < date('Y-m-d')) {
                    return redirect()
                        ->route('admin.conferences.index')
                        ->with('error', __('ui.conference_delete_error'));
                }

                unset($conferences[$key]);

                ConferenceService::save(array_values($conferences));

                return redirect()
                    ->route('admin.conferences.index')
                    ->with('success', __('ui.conference_deleted'));
            }
        }

        abort(404);
    }
}
