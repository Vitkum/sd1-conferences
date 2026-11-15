<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    private function users()
    {
        if (!session()->has('users')) {
            session(['users' => [
                [
                    'id' => 1,
                    'first_name' => 'Jonas',
                    'last_name' => 'Jonaitis',
                    'email' => 'jonas@example.com'
                ],
                [
                    'id' => 2,
                    'first_name' => 'Rūta',
                    'last_name' => 'Petrauskaitė',
                    'email' => 'ruta@example.com'
                ],
                [
                    'id' => 3,
                    'first_name' => 'Tomas',
                    'last_name' => 'Kazlauskas',
                    'email' => 'tomas@example.com'
                ]
            ]]);
        }

        return session('users');
    }

    public function index()
    {
        $users = $this->users();

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = collect($this->users())
            ->firstWhere('id', (int) $id);

        if (!$user) {
            abort(404);
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $users = $this->users();
        $found = false;

        foreach ($users as &$user) {
            if ($user['id'] == $id) {
                $user = array_merge(
                    $user,
                    $request->validated()
                );

                $found = true;
                break;
            }
        }

        unset($user);

        if (!$found) {
            abort(404);
        }

        session(['users' => $users]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('ui.user_updated'));
    }
}
