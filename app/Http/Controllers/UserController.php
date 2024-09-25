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

            new Middleware('role_or_permission:Users Access', only: ['index']),
            new Middleware('role_or_permission:Users Create', only: ['create']),
            new Middleware('role_or_permission:Users Edit', only: ['edit']),
            new Middleware('role_or_permission:Users View', only: ['update']),
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

        $permissions = [
            'Inputter',
            'Authorizer',
            'Users Access',
            'Users Create',
            'Users Edit',
            'Users View',
            'Credit Report Access',
            'Credit Report Create',
            'Credit Report Show',
            'Credit Report Edit',
            'Credit Report Update',
            'Remarks',
            'Sanctions Advised Issued',
            'Borrower Access',
            'Borrower Create',
            'Borrower Edit',
            'Borrower Show',
            'Print PDF',
        ];
        $roles = [
            'Branch Manager' => [
                'Inputter', 'Authorizer', 'Credit Report Access', 'Credit Report Create',
                'Credit Report Show', 'Borrower Access', 'Borrower Create', 'Borrower Edit',
                'Borrower Show', 'Print PDF'
            ],
            'Credit Manager' => [
                'Authorizer', 'Credit Report Access', 'Credit Report Show', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'Credit Officer' => [
                'Authorizer', 'Credit Report Access', 'Credit Report Show', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'Regional Credit Manager' => [
                'Credit Report Access', 'Credit Report Show', 'Remarks', 'Sanctions Advised Issued',
                'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'Regional Chief' => [
                'Credit Report Access', 'Credit Report Show', 'Remarks', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'DH CRBD' => [
                'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'SM CRBD' => [
                'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'SM Manager Officer' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Sanctions Advised Issued', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'DH CMD' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Sanctions Advised Issued', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'SM CMD' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'CMD Manager Officer' => [
                'Credit Report Access', 'Credit Report Show', 'Credit Report Edit',
                'Credit Report Update', 'Remarks', 'Borrower Access', 'Borrower Show', 'Print PDF'
            ],
            'Admin' => [
                'Users Access', 'Users Create', 'Users Edit', 'Users View', 'Credit Report Access',
                'Credit Report Show', 'Credit Report Edit', 'Credit Report Update', 'Borrower Access',
                'Borrower Show', 'Print PDF'
            ],
            'Super Admin' => $permissions, // All permissions
        ];
        foreach ($roles as $roleName => $rolePermissions) {

            if ($roleName == $role->name){
                // Sync the permissions of the user with the permissions of the assigned role
                $user->syncPermissions($rolePermissions);
            }


        }


        session()->flash('status', 'User has been successfully created.');

        return to_route('users.index');
    }

    public function edit(User $user, Request $request)
    {
        // Reload the user with fresh permissions and roles
        $user = $user->load('permissions');
//        dd($user->getRoleNames(), $user->getAllPermissions(), $user->getDirectPermissions());

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

        // Revoke all permissions from the user
        $user->permissions()->detach();

        // Sync direct permissions only (the ones that are not inherited from roles)
        $directPermissions = Permission::whereIn('id', $request->input('permissions', []))->pluck('name')->toArray();

        // Clear cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Sync only the direct permissions
        $user->syncPermissions($directPermissions);

//        $permissions = array_map('intval', $request->input('permissions', []));
//        $user->syncPermissions($permissions);

        session()->flash('success', 'User has been updated successfully.');
        return to_route('users.edit', $user->id);
    }
}
