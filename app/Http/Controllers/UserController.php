<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Permission\Models\Permission;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [

            new Middleware('role_or_permission:users-access', only: ['index']),
            new Middleware('role_or_permission:users-create', only: ['create']),
            new Middleware('role_or_permission:users-edit', only: ['edit']),
            new Middleware('role_or_permission:users-edit', only: ['update']),
        ];
    }
    public function index()
    {
        $users = QueryBuilder::for(User::with('roles', 'permissions'))
            ->allowedFilters([
                'name',
                'email',
                'status',
            ])
            ->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'designation' => 'required',
            'placement' => 'required',
            'employee_no' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'designation' => $request->designation,
            'placement' => $request->placement,
            'employee_no' => $request->employee_no,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->role);
        $user->assignRole($role);

        session()->flash('status', 'User has been successfully created.');

        return to_route('users.index');
    }

    public function edit(User $user, Request $request)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'designation' => 'required',
            'placement' => 'required',
            'employee_no' => 'required',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($request->input('pwd')) {
            $request->merge(['password' => Hash::make($request->input('pwd'))]);
        }



        $user->update($request->all());
        $permissions = array_map('intval', $request->input('permissions', []));
        $user->syncPermissions($permissions);

        session()->flash('success', 'User has been updated successfully.');
        return to_route('users.edit', $user->id);
    }
}
