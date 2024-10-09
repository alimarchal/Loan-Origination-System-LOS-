<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--            <h1 class="text-2xl text-center font-extrabold pb-4">Financing</h1>--}}

{{--            <div class="grid grid-cols-12 gap-6 mb-4 ">--}}
{{--                <a href="javascript:;" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">--}}
{{--                    <div class="p-5">--}}
{{--                        <div class="grid grid-cols-3 gap-1">--}}
{{--                            <div class="col-span-2">--}}
{{--                                <div class="text-3xl font-bold leading-8">--}}
{{--                                    {{ $primaryCards[1] }}--}}
{{--                                </div>--}}
{{--                                <div class="mt-1 text-base font-extrabold text-black">--}}
{{--                                    Consumer Financing--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-span-1 flex items-center justify-end">--}}
{{--                                <img src="{{ url('icons-images/consumer.png') }}" alt="employees on leave" class="h-12 w-12">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="javascript:;" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">--}}
{{--                    <div class="p-5">--}}
{{--                        <div class="grid grid-cols-3 gap-1">--}}
{{--                            <div class="col-span-2">--}}
{{--                                <div class="text-3xl font-bold leading-8">--}}
{{--                                    {{ $primaryCards[2] }}--}}
{{--                                </div>--}}
{{--                                <div class="mt-1 text-base font-extrabold text-black">--}}
{{--                                    Commercial / SME--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-span-1 flex items-center justify-end">--}}
{{--                                <img src="{{ url('icons-images/commercial.png') }}" alt="employees on leave" class="h-12 w-12">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="javascript:;" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">--}}
{{--                    <div class="p-5">--}}
{{--                        <div class="grid grid-cols-3 gap-1">--}}
{{--                            <div class="col-span-2">--}}
{{--                                <div class="text-3xl font-bold leading-8">--}}
{{--                                    {{ $primaryCards[3] }}--}}
{{--                                </div>--}}
{{--                                <div class="mt-1 text-base font-extrabold text-black">--}}
{{--                                    Micro Financing--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-span-1 flex items-center justify-end">--}}
{{--                                <img src="{{ url('icons-images/micro.png') }}" alt="employees on leave" class="h-12 w-12">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="javascript:;" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">--}}
{{--                    <div class="p-5">--}}
{{--                        <div class="grid grid-cols-3 gap-1">--}}
{{--                            <div class="col-span-2">--}}
{{--                                <div class="text-3xl font-bold leading-8">--}}
{{--                                    {{ $primaryCards[4] }}--}}
{{--                                </div>--}}
{{--                                <div class="mt-1 text-base font-extrabold text-black">--}}
{{--                                    Agriculture Financing--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-span-1 flex items-center justify-end">--}}
{{--                                <img src= "{{ url('icons-images/agriculture.png') }}" alt="employees on leave" class="h-12 w-12">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-2">
                <!-- Card 1 -->
                <a href="javascript:;" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{ $secondaryCards["Draft"] }}
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">
                                    Draft
                                </div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="{{ url('icons-images/draft.png') }}" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="javascript:;" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{ $secondaryCards["Submitted"] }}
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">
                                    Submitted
                                </div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="{{ url('icons-images/submitted.png') }}" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="javascript:;" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{ $secondaryCards["In Process"] }}
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">
                                    In Process
                                </div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="{{ url('icons-images/inprocess.png') }}" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 4 -->
                <a href="javascript:;" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{ $secondaryCards["Approved"] }}
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">
                                    Approved
                                </div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="{{ url('icons-images/approved.png') }}" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 5 -->
                <a href="javascript:;" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{ $secondaryCards["Declined"] }}
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">
                                    Declined
                                </div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="{{ url('icons-images/declined.png') }}" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Card 6 -->
                <a href="javascript:;" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{ $secondaryCards["Returned With Observation"] }}
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">
                                    Returned With Observation
                                </div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src= "{{ url('icons-images/return.png') }}" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
            </div>





            <div class="grid grid-cols-6 gap-6 mt-6">
                <div class="col-span-6 md:col-span-6 lg:col-span-3">
                    <div class="bg-white transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg p-4" id="chart">
                    </div>
                </div>

                <div class="col-span-6 md:col-span-6 lg:col-span-3">
                    <div class="bg-white transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg p-4" id="chart_two">
                    </div>
                </div>


            </div>


{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <x-welcome/>--}}
{{--                <div id="chart"></div>--}}
{{--            </div>--}}
        </div>
    </div>
    @push('modals')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Chart 1: Pie Chart - "Loan Category"
                var options1 = {
                    series: [@foreach($genderWise as $key => $value) {{ $value }}, @endforeach],
                    chart: {
                        width: 500,
                        height: 300, // Height set to 400
                        type: 'pie',
                    },
                    labels: [@foreach($genderWise as $key => $value) "{{ $key }}", @endforeach],
                    title: {
                        text: 'Gender Wise',
                        align: 'center',
                        style: {
                            fontSize: '20px',
                            fontWeight: 'bold',
                            color: '#263238' // Optional: Customize the color as needed
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                // Initialize Chart 1
                var chart1 = new ApexCharts(document.querySelector("#chart"), options1);
                chart1.render();


                // Chart 2: Donut Chart - "Gender Wise"
                var options2 = {
                    series: [@foreach($primaryCards as $key => $value) {{ $value }}, @endforeach],
                    chart: {
                        width: 500,
                        height: 300, // Height set to 400
                        type: 'pie',
                    },
                    labels: ['Consumer Financing', 'Commercial / SME', 'Micro Financing', 'Agriculture Financing'],
                    title: {
                        text: 'Loan Category',
                        align: 'center',
                        style: {
                            fontSize: '20px',
                            fontWeight: 'bold',
                            color: '#263238' // Optional: Customize the color as needed
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                // Initialize Chart 2
                var chart2 = new ApexCharts(document.querySelector("#chart_two"), options2);
                chart2.render();


            });


        </script>
    @endpush
</x-app-layout>
