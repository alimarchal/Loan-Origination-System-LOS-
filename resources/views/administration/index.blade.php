<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight inline-block">
            {{ __('Administration') }}
        </h2>

        <div class="flex justify-center items-center float-right">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:text-white text-black bg-white border rounded-lg focus:outline-none hover:mc-bg-blue transition-colors duration-200 transform ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 mb-4 gap-6">
                <x-card
                        link="{{ route('users.index') }}"
                        number="{{ \App\Models\User::count() }}"
                        title="Users"
                        imageSrc="{{ url('icons-images/users.png') }}"
                        imageAlt="Users"
                />

{{--                @if(Auth::user()->hasRole('Super-Admin'))--}}


{{--                <x-card--}}
{{--                        link="{{ route('permissions.index') }}"--}}
{{--                        number="{{ \Spatie\Permission\Models\Permission::count() }}"--}}
{{--                        title="Permissions"--}}
{{--                        imageSrc="{{ url('icons-images/permissions.png') }}"--}}
{{--                        imageAlt="Permissions"--}}
{{--                />--}}

{{--                <x-card--}}
{{--                        link="{{ route('roles.index') }}"--}}
{{--                        number="{{ \Spatie\Permission\Models\Role::count() }}"--}}
{{--                        title="Roles"--}}
{{--                        imageSrc="{{ url('icons-images/roles.png') }}"--}}
{{--                        imageAlt="Roles"--}}
{{--                />--}}
{{--                @endif--}}


{{--                <x-card--}}
{{--                        link="{{ route('branch.index') }}"--}}
{{--                        number="{{ \App\Models\Branch::count() }}"--}}
{{--                        title="Branches"--}}
{{--                        imageSrc="{{ url('icons-images/branches.png') }}"--}}
{{--                        imageAlt="Branches"--}}
{{--                />--}}

{{--                <x-card--}}
{{--                        link="{{ route('course.index') }}"--}}
{{--                        number="{{ \App\Models\Course::count() }}"--}}
{{--                        title="Courses"--}}
{{--                        imageSrc="{{ url('icons-images/course.png') }}"--}}
{{--                        imageAlt="Courses"--}}
{{--                />--}}

{{--                <x-card--}}
{{--                        link="{{ route('certificateCategory.index') }}"--}}
{{--                        number="Certificate"--}}
{{--                        title="Category"--}}
{{--                        imageSrc="{{ url('icons-images/certificate.png') }}"--}}
{{--                        imageAlt="Certificates Category"--}}
{{--                />--}}


{{--                <x-card--}}
{{--                        link="{{ route('instituteClass.index') }}"--}}
{{--                        number="Class"--}}
{{--                        title="Rooms"--}}
{{--                        imageSrc="{{ url('icons-images/classrooms.png') }}"--}}
{{--                        imageAlt="Class Rooms"--}}
{{--                />--}}

{{--                <x-card--}}
{{--                    link="{{ route('accountCategory.index') }}"--}}
{{--                    number="Account"--}}
{{--                    title="Categories"--}}
{{--                    imageSrc="{{ url('icons-images/accounting.png') }}"--}}
{{--                    imageAlt="Account Category"--}}
{{--                />--}}


{{--                <x-card--}}
{{--                    link="{{ route('transactions.index') }}"--}}
{{--                    number="MC"--}}
{{--                    title="Transactions"--}}
{{--                    imageSrc="{{ url('icons-images/transaction.png') }}"--}}
{{--                    imageAlt="Transactions"--}}
{{--                />--}}


{{--                <x-card--}}
{{--                    link="{{ route('bankDeposit.index') }}"--}}
{{--                    number="Bank"--}}
{{--                    title="Deposits"--}}
{{--                    imageSrc="{{ url('icons-images/bank-deposit.png') }}"--}}
{{--                    imageAlt="Account"--}}
{{--                />--}}
            </div>

        </div>
    </div>
</x-app-layout>
