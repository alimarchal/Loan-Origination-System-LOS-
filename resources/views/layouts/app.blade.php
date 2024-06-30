<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="{{ url('apexcharts/apexcharts.js') }}"></script>
        <link href="{{ url('select2/select2.min.css') }}" rel="stylesheet" />
        @stack('header')

        <style>
            .select2 {
                /*width:100%!important;*/
                width: auto !important;
                display: block;
            }

            .select2-container .select2-selection--single {
                margin-top: 4px;
                height: auto; /* Reset the height if necessary */
                padding: 0.7rem 1rem; /* This should match Tailwind's py-2 px-4 */
                line-height: 1.25; /* Adjust based on Tailwind's line height for consistency */
                /*font-size: 0.875rem; !* Matches Tailwind's text-sm *!*/
                border: 1px solid #d1d5db; /* Tailwind's border-gray-300 */
                border-radius: 0.375rem; /* Tailwind's rounded-md */
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* Tailwind's shadow-sm */
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                line-height: 1.25; /* Aligns text vertically */
                padding-left: 0; /* Adjust if needed */
                padding-right: 0; /* Adjust if needed */
            }

            /*.select2-selection__arrow*/
            .select2-container .select2-selection--single {
                height: auto; /* Ensure the arrow aligns with the adjusted height */
                right: 0.5rem; /* Align the arrow similarly to Tailwind's padding */

            }

            .select2-selection__arrow {
                top: 8px!important;
                right: 10px!important;
            }

        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 print:hidden">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="{{ url('select2/jquery-3.5.1.js') }}"></script>
        <script src="{{ url('select2/select2.min.js') }}" defer></script>
        <script>
            $(document).ready(function () {
                $('.select2').select2();
            });

            $('form').submit(function(){
                // If x-button does not render as a traditional submit button, target it directly by ID or class
                $('#submit-btn').attr('disabled', 'disabled');
            });
        </script>
        @stack('modals')

        @livewireScripts
    </body>
</html>
