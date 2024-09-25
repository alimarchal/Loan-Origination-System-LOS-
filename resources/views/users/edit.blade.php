<x-app-layout>'

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User ') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <form method="POST" action="{{ route('users.update', $user->id) }}" class="px-8 py-4">
                    <x-status-message />
                    <x-validation-errors />
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="designation" value="{{ __('Designation') }}" />
                        <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="$user->designation" />
                    </div>

                    <div class="mt-4">
                        <x-label for="placement" value="{{ __('Placement') }}" />
                        <x-input id="placement" class="block mt-1 w-full" type="text" name="placement" :value="$user->placement" />
                    </div>

                    <div class="mt-4">
                        <x-label for="employee_no" value="{{ __('Employee No') }}" />
                        <x-input id="employee_no" class="block mt-1 w-full" type="text" name="employee_no" :value="$user->employee_no" />
                    </div>


{{--                    <div class="mt-4">--}}
{{--                        <x-label for="role" value="{{ __('Role') }}" />--}}
{{--                        <select name="role" id="role" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">--}}
{{--                            <option value="" selected>None</option>--}}
{{--                            @foreach(\Spatie\Permission\Models\Role::all() as $role)--}}
{{--                                <option value="{{ $role->id }}">{{ $role->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="mt-4">
                        <x-label for="status" value="{{ __('Status') }}" />
                        <select name="status" id="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="active" @if($user->status == "active") selected @endif>Active</option>
                            <option value="inactive" @if($user->status == "inactive") selected @endif>Disable</option>
                        </select>
                    </div>



                    <div class="mt-4">
                        <label for="permissions" class="block text-gray-700 text-sm font-bold mb-2">Permissions:</label>


                        @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" class="form-checkbox"
                                        {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}> <!-- Check for both direct and role-based permissions -->

                                <label for="permission_{{ $permission->id }}" class="ml-2">
                                    {{ $permission->name }}
                                    @if(!$user->hasDirectPermission($permission->name) && $user->hasPermissionTo($permission->name))
                                        <small>(inherited from role)</small>
                                    @endif
                                </label>
                            </div>
                        @endforeach



                        @error('permissions')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>





                    <div class="mt-4">
                        <x-label for="pwd" value="{{ __('Password') }}" />
                        <x-input id="pwd" class="block mt-1 w-full" type="password" name="pwd"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


