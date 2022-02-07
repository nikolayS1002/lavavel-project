<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Profile\EditRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $users = User::query()
            ->paginate(5);

        return view('admin.profile.index', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.profile.edit', [
            'user' => $user
        ]);
    }

    public function update(EditRequest $request, User $user)
    {
        $updated = $user->fill($request->only(['name', 'email', 'is_admin', 'password']))
            ->save();

        if($updated) {
            return redirect()->route('admin.profile.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }
}
