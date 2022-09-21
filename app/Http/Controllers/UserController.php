<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->input('search'), function ($query, $search) {
                $query
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(8, ['id', 'name', 'email', 'role', 'created_at', 'updated_at'])
            ->through(fn($user)=>[
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
                'role'=>\Str::ucfirst($user->role),
                'created_at'=>$user->created_at,
                'updated_at'=>$user->updated_at,
            ])
            ->withQueryString();

        return Inertia::render('Laru/User/Index', [
            'users' => $users,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = [
            User::ROLE_ADMIN => \Str::ucfirst(User::ROLE_ADMIN),
            User::ROLE_SUBSCRIBER => \Str::ucfirst(User::ROLE_SUBSCRIBER),
        ];

        return Inertia::render('Laru/User/Edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update($validated);

        return redirect()->route('users.index')->with([
            'success' => 'User Updated successfull.'
        ]);
    }

    public function destroy(User $user)
    {
        //
    }
}
