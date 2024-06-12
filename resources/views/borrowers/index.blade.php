<x-app-layout>
    @push('header')
        <link rel="stylesheet" href="{{ url('jsandcss/daterangepicker.min.css') }}">
        <script src="{{ url('jsandcss/moment.min.js') }}"></script>
        <script src="{{ url('jsandcss/knockout-3.5.1.js') }}" defer></script>
        <script src="{{ url('jsandcss/daterangepicker.min.js') }}" defer></script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            Borrowers
        </h2>
        <div class="flex justify-center items-center float-right">
            <div class="flex justify-center items-center float-right print:hidden">

                <a href="{{ route('borrower.create') }}" class="flex items-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-gray-200 dark:border-gray-200  dark:hover:bg-gray-700 ml-2">
                    <svg data-slot="icon" fill="none" class="h-5 w-5" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                </a>
                <button id="toggle" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"
                        />
                    </svg>

                </button>

                <button onclick="window.print()" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2"
                        title="Members List">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                </button>



                <a href="#" class="text-center px-4 py-2 text-gray-600 bg-white border rounded-lg focus:outline-none hover:bg-gray-100 transition-colors duration-200 transform dark:text-black dark:border-gray-200 dark:hover:bg-white dark:bg-gray-700 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4 mt-6 shadow-lg rounded-lg" style="display: none" id="filters">
        <form method="GET" action="#">
            <div class="mt-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Admission No -->
                <div>
                    <x-label for="id" value="{{ __('Admission No / Student ID') }}" />
                    <x-input id="id" class="block mt-1 w-full" type="text" name="filter[id]" value="{{ request('filter.id') }}" />
                </div>


                <!-- First Name -->
                <div>
                    <x-label for="firstname" value="{{ __('First Name') }}" />
                    <x-input id="firstname" class="block mt-1 w-full" type="text" name="filter[firstname]" value="{{ request('filter.firstname') }}" />
                </div>

                <!-- Last Name -->
                <div>
                    <x-label for="lastname" value="{{ __('Last Name') }}" />
                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="filter[lastname]" value="{{ request('filter.lastname') }}" />
                </div>

                <!-- Father Name -->
                <div>
                    <x-label for="father_name" value="{{ __('Father Name') }}" />
                    <x-input id="father_name" class="block mt-1 w-full" type="text" name="filter[father_name]" value="{{ request('filter.father_name') }}" />
                </div>


                <div>
                    <x-label for="cnic" value="{{ __('CNIC') }}" :required="false" />
                    <x-input id="cnic" class="block mt-1 w-full" type="text" name="filter[cnic]" :value="request('filter.cnic')" />
                </div>


                <div>
                    <x-label for="mobile_no" value="{{ __('Student Cell #') }}" :required="false" />
                    <x-input id="mobile_no" class="block mt-1 w-full" type="text" name="filter[mobile_no]" :value="request('filter.mobile_no')" />
                </div>
                <div>
                    <x-label for="guardian_emergency_contact" value="{{ __('Guardian Cell # / Emergency Contact') }}" :required="false" />
                    <x-input id="guardian_emergency_contact" class="block mt-1 w-full" type="text" name="filter[guardian_emergency_contact]" :value="request('filter.guardian_emergency_contact')" />
                </div>


                <!-- Mobile Number for SMS Alert -->
                <div>
                    <x-label for="mobile_number_for_sms_alert" value="{{ __('SMS Alert / WhatsApp') }}" :required="true" />
                    <x-input id="mobile_number_for_sms_alert" class="block mt-1 w-full" type="text" name="filter[mobile_number_for_sms_alert]" :value="request('filter.mobile_number_for_sms_alert')" />
                </div>


                <!-- Gender -->
                <div>
                    <x-label for="gender" value="{{ __('Gender') }}" />
                    <select name="filter[gender]" id="gender" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a gender</option>
                        <option value="Male" {{ request( 'filter.gender')==='Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ request( 'filter.gender')==='Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ request( 'filter.gender')==='Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>


                <div>
                    <x-label for="qualification" value="{{ ('Educational Qualification') }}" :required="false" />
                    <select name="filter[qualification]" id="qualification" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a qualification</option>
                        <option value="Secondary School Certificate / Matriculation / O - level" {{ request( 'filter.qualification')==='Secondary School Certificate / Matriculation / O - level' ? 'selected' : '' }}>Secondary School Certificate / Matriculation / O - level
                        </option>
                        <option value="Higher Secondary School Certificate / Intermediate/ A - level" {{ request( 'filter.qualification')==='Higher Secondary School Certificate / Intermediate/ A - level' ? 'selected' : '' }}>Higher Secondary School Certificate / Intermediate/ A - level
                        </option>
                        <option value="Bachelor (14 Years) Degree" {{ request( 'filter.qualification')==='Bachelor (14 Years) Degree' ? 'selected' : '' }}>Bachelor (14 Years) Degree</option>
                        <option value="Bachelor (16 Years) Degree" {{ request( 'filter.qualification')==='Bachelor (16 Years) Degree' ? 'selected' : '' }}>Bachelor (16 Years) Degree</option>
                        <option value="Master (16 Years) Degree" {{ request( 'filter.qualification')==='Master (16 Years) Degree' ? 'selected' : '' }}>Master (16 Years) Degree</option>
                        <option value="Master/ MS (18 Years) Degree" {{ request( 'filter.qualification')==='Master/ MS (18 Years) Degree' ? 'selected' : '' }}>Master/ MS (18 Years) Degree</option>
                        <option value="M-Phil (18 Years) Degree" {{ request( 'filter.qualification')==='M-Phil (18 Years) Degree' ? 'selected' : '' }}>M-Phil (18 Years) Degree</option>
                        <option value="Doctorate Degree" {{ request( 'filter.qualification')==='Doctorate Degree' ? 'selected' : '' }}>Doctorate Degree</option>
                        <option value="MS leading to PhD" {{ request( 'filter.qualification')==='MS leading to PhD' ? 'selected' : '' }}>MS leading to PhD</option>
                        <option value="Post Doctorate" {{ request( 'filter.qualification')==='Post Doctorate' ? 'selected' : '' }}>Post Doctorate</option>
                        <option value="PGD" {{ request( 'filter.qualification')==='PGD' ? 'selected' : '' }}>PGD</option>
                    </select>
                </div>

                <div>
                    <x-label for="date_range" value="{{ __('Date Range') }}" :required="false" />
                    <x-input class="block mt-0.5 w-full" type="text" readonly name="filter[starts_between]" id="date_range" />
                </div>


                <div>
                    <x-label for="district" value="{{ __('District') }}" :required="false" />
                    <select name="filter[district]" id="district" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a district</option>
                        <option {{ request( 'filter.district')==='MUZAFFARABAD' ? 'selected' : '' }} value="MUZAFFARABAD">MUZAFFARABAD</option>
                        <option {{ request( 'filter.district')==='JHELUM' ? 'selected' : '' }} value="JHELUM VALLEY">JHELUM VALLEY</option>
                        <option {{ request( 'filter.district')==='NEELUM' ? 'selected' : '' }} value="NEELUM">NEELUM</option>
                        <option {{ request( 'filter.district')==='MIRPUR' ? 'selected' : '' }} value="MIRPUR">MIRPUR</option>
                        <option {{ request( 'filter.district')==='BHIMBER' ? 'selected' : '' }} value="BHIMBER">BHIMBER</option>
                        <option {{ request( 'filter.district')==='KOTLI' ? 'selected' : '' }} value="KOTLI">KOTLI</option>
                        <option {{ request( 'filter.district')==='POONCH' ? 'selected' : '' }} value="POONCH">POONCH</option>
                        <option {{ request( 'filter.district')==='BAGH' ? 'selected' : '' }} value="BAGH">BAGH</option>
                        <option {{ request( 'filter.district')==='HAVELI' ? 'selected' : '' }} value="HAVELI">HAVELI</option>
                        <option {{ request( 'filter.district')==='SUDHNATI' ? 'selected' : '' }} value="SUDHNATI">SUDHNATI</option>
                        <option {{ request( 'filter.district')==='OTHER/PAKISTAN' ? 'selected' : '' }} value="OTHER/PAKISTAN">OTHER/PAKISTAN</option>
                    </select>
                </div>


                <div>
                    <x-label for="certification_required" value="{{ __('Certification') }}" :required="false" /> {{--
                    <select name="filter[certification_required]" id="certification_required" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">--}} {{--
                        <option value="">Select a certification</option>--}} {{-- @foreach(\App\Models\Category::where('category_type','Certification Required')->get() as $cat)--}} {{--
                        <option value="{{ $cat->id }}" {{ request( 'filter.certification_required')==$ cat->id ? 'selected' : '' }} >{{ $cat->name }}</option>--}} {{-- @endforeach--}} {{-- </select>--}}
                </div>


                <div>
                    <x-label for="admission_type" value="{{ __('Admission Type') }}" :required="false" />
                    <select name="filter[admission_type]" id="admission_type" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a admission type</option>
                        {{-- @foreach(\App\Models\Category::where('category_type','Admission Type')->get() as $cat)--}} {{--
                        <option value="{{ $cat->id }}" {{ request( 'filter.admission_type')==$ cat->id ? 'selected' : '' }} >{{ $cat->name }}</option>--}} {{-- @endforeach--}}
                    </select>
                </div>


                <div>
                    <x-label for="computer_knowledge" value="{{ __('Computer Knowledge') }}" :required="false" />
                    <select name="filter[computer_knowledge]" id="computer_knowledge" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a computer knowledge?</option>
                        {{-- @foreach(\App\Models\Category::where('category_type','Computer Knowledge')->get() as $cat)--}} {{--
                        <option value="{{ $cat->id }}" {{ request( 'filter.computer_knowledge')==$ cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>--}} {{-- @endforeach--}}
                    </select>
                </div>


                <!-- Phone Network -->
                <div>
                    <x-label for="phone_network_id" value="{{ __('Phone Network') }}" :required="false" />
                    <select name="filter[phone_network_id]" id="phone_network_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a phone network {{ request('filter.phone_network_id') }}</option>
                        <!-- Add your options here -->
                        {{-- @foreach(\App\Models\PhoneNetwork::all() as $mn)--}} {{--
                        <option value="{{ $mn->id }}" {{ request( 'filter.phone_network_id')==$ mn->id ? 'selected' : '' }} >{{ $mn->name }}</option>--}} {{-- @endforeach--}}
                    </select>
                </div>

                <div>
                    <x-label for="session_year_id" value="{{ __('Session Year') }}" :required="true" />
                    <select name="filter[session_year_id]" id="session_year_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select session year</option>
                        {{-- @foreach(\App\Models\SessionYear::all() as $st)--}} {{--
                        <option value="{{ $st->id }}" {{ request( 'filter.session_year_id')==$ st->id ? 'selected' : '' }} >{{ \Carbon\Carbon::parse($st->start_year)->format('Y-') . \Carbon\Carbon::parse($st->end_year)->format('Y') }}</option>--}} {{-- @endforeach--}}
                    </select>
                </div>


                <!-- Blood Group -->
                <div>
                    <x-label for="blood_group_id" value="{{ __('Blood Group') }}" />
                    <select name="filter[blood_group_id]" id="blood_group_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a blood group</option>
                        {{-- @foreach (\App\Models\BloodGroup::all() as $bg)--}} {{--
                        <option value="{{ $bg->id }}" {{ request( 'filter.blood_group_id')==$ bg->id ? 'selected' : '' }} > {{ $bg->name }}--}} {{-- </option>--}} {{-- @endforeach--}}
                    </select>
                </div>


                <!-- Institute Class -->
                <div>
                    <x-label for="branch_id" value="{{ __('Branch') }}" />
                    <select name="filter[branch_id]" id="branch_id" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a branch</option>
                        {{-- @foreach (\App\Models\Branch::all() as $branch)--}} {{--
                        <option value="{{ $branch->id }}" {{ request( 'filter.branch_id')==$ branch->id ? 'selected' : '' }}> {{ $branch->branch_custom_code }}--}} {{-- </option>--}} {{-- @endforeach--}}
                    </select>
                </div>


                <!-- Status -->
                <div>
                    <x-label for="status" value="{{ __('Status') }}" />
                    <select name="filter[latestStatus.status_id]" id="status" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        <option value="">Select a student status</option>
                        {{-- @foreach (\App\Models\Status::all() as $st)--}} {{--
                        <option value="{{ $st->id }}" @if(!empty(request( 'filter')[ 'latestStatus.status_id'])) {{ request( "filter")[ 'latestStatus.status_id']==$ st->id ? 'selected' : '' }} @endif > {{ $st->name }}--}} {{-- </option>--}} {{-- @endforeach--}}
                    </select>
                </div>


                <div>

                    <div>
                        <x-label for="age_between" value="{{ __('Age Between') }}" :required="false" />
                        <select name="filter[age_between]" id="age_between" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                            <option value="">Select a age between</option>
                            <option {{ request( 'filter.age_between')==='13,20' ? 'selected' : '' }} value="13,20">13 to 20 Years</option>
                            <option {{ request( 'filter.age_between')==='20,25' ? 'selected' : '' }} value="20,25">20 to 25 Years</option>
                            <option {{ request( 'filter.age_between')==='25,30' ? 'selected' : '' }} value="25,30">25 to 30 Years</option>
                            <option {{ request( 'filter.age_between')==='30,35' ? 'selected' : '' }} value="30,35">30 to 35 Years</option>
                            <option {{ request( 'filter.age_between')==='35,40' ? 'selected' : '' }} value="35,40">35 to 40 Years</option>
                            <option {{ request( 'filter.age_between')==='40,45' ? 'selected' : '' }} value="40,45">40 to 45 Years</option>
                            <option {{ request( 'filter.age_between')==='46,50' ? 'selected' : '' }} value="46,50">46 to 50 Years</option>
                            <option {{ request( 'filter.age_between')==='51,60' ? 'selected' : '' }} value="41,60">51 to 60 Years</option>
                            <option {{ request( 'filter.age_between')==='60,70' ? 'selected' : '' }} value="41,60">60 to 70 Years</option>
                            <option {{ request( 'filter.age_between')==='70,150' ? 'selected' : '' }} value="70,150">70 to 150 Years</option>
                        </select>
                    </div>

                </div>

                <div>
                    <x-label for="applied_for" class="uppercase font-extrabold" value="{{ __('Applied For') }}" :required="false" />
                    <select name="filter[applied_for_certificates.certificate_category_id]" id="applied_for" multiple="multiple" class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                        {{-- @foreach(\App\Models\CertificateCategory::where('status',1)->get() as $cert)--}} {{--
                        <option value="{{ $cert->id }}">{{ $cert->name }}</option>--}} {{-- @endforeach--}}
                    </select>
                </div>


            </div>

            <div class="mt-4">
                <x-button class="bg-indigo-500 text-white">
                    {{ __('Apply Filters') }}
                </x-button>
            </div>
        </form>
    </div>


    <div class="py-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl print:shadow-none sm:rounded-lg">
                <x-status-message class="ml-4 mt-4" />
                <x-validation-errors class="ml-4 mt-4" /> @if($borrowers->isNotEmpty())
                    <div class="relative overflow-x-auto rounded-lg ">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-white bg-bank-green uppercase print:border-b print:border-black  text-sm print:text-black">
                                <th class="py-2 px-2 text-center">#</th>
                                <th class="py-2 px-2 text-center">Name</th>
                                <th class="py-2 px-2 text-center">Age/Sex</th>
                                <th class="py-2 px-2 text-center">CNIC/NTN</th>
                                <th class="py-2 px-2 text-center">REG.DATE</th>
                                <th class="py-2 px-2 text-center">Loan Category</th>
                                <th class="py-2 px-2 text-center">Mobile</th>
                                <th class="py-2 px-2 text-center">Status</th>
                                <th class="py-2 px-2 text-center print:hidden">Action</th>
                            </tr>
                            </thead>
                            @foreach ($borrowers as $borrower)
                                <tbody class="text-black text-md leading-normal font-extrabold">
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-1 px-2 text-center">
                                        <a href="{{ route('borrower.edit', $borrower->id) }}" class="text-blue-600 hover:underline font-extrabold">
                                            {{ $borrower->branch?->code }}-{{$borrower->region?->id}}
                                        </a>

                                    </td>

{{--                                    <td class="py-1 px-2 text-center">--}}
{{--                                        {{ $borrower->borrower_type }}--}}
{{--                                        <a href="#" class="text-blue-600 hover:underline font-extrabold">--}}
{{--                                            --}}
{{--                                            {{ $borrower->gender == 'Male' ? 'Mr.' : 'Ms.' }} {{ $borrower->firstname . ' ' . $borrower->lastname }}--}}
{{--                                        </a>--}}

{{--                                    </td>--}}


                                    <td class="py-1 px-2 text-center">
                                        {{ $borrower->gender == 'Male' ? 'Mr.' : ($borrower->gender == 'Female' ? 'Ms.' : 'M/s.') }}{{ $borrower->name }}
                                        {{--                                        {{  $borrower->relationship_status }} {{ $borrower->parent_spouse_name }}--}}
                                    </td>



                                    <td class="py-1 px-2 text-center">
                                        {{ \Carbon\Carbon::parse($borrower->date_of_birth)->diff(\Carbon\Carbon::now())->format('%yy') }}/{{ $borrower->gender == 'Male' ? 'M' : ($borrower->gender == 'Female' ? 'F' : 'C') }}
                                    </td>

                                    <td class="py-1 px-2 text-center">
                                        {{ $borrower->national_id_cnic }}
                                    </td>

                                    <td class="py-1 px-2 text-center">
                                        {{ \Carbon\Carbon::parse($borrower->date_registered)->format('d-M-y') }}
                                    </td>

                                    <td class="py-1 px-2 text-center">
                                        {{ $borrower->loan_sub_category->name }}
                                    </td>


                                    <td class="py-1 px-2 text-center">
                                        {{ $borrower->mobile_number }}
                                    </td>




                                    <td class="py-1 px-2 text-center ">
                                        {{-- {{ $borrower->latestStatus->status->name }}--}}
                                    </td>

                                    <td class="py-1 px-2 text-center print:hidden">

{{--                                        <a href="#" class="inline-flex items-center px-0.5 py-0.5 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />--}}
{{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />--}}
{{--                                            </svg>--}}
{{--                                        </a> <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">--}}


{{--                                            View--}}
{{--                                        </a>--}}

{{--                                        <a href="#" class="inline-flex items-center px-0.5 py-0.5 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"--}}
{{--                                                />--}}
{{--                                            </svg>--}}


{{--                                        </a>--}}


                                        <a href="#" class="inline-flex items-center px-0.5 py-0.5 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('modals')
        <script>
            $(document).ready(function () {

                $("#date_range").daterangepicker({
                    minDate: moment().subtract(10, 'years'),
                    orientation: 'left',
                    callback: function (startDate, endDate, period) {
                        $(this).val(startDate.format('L') + ' – ' + endDate.format('L'));
                    }
                });
            });


            const targetDiv = document.getElementById("filters");
            const btn = document.getElementById("toggle");
            btn.onclick = function () {
                if (targetDiv.style.display !== "none") {
                    targetDiv.style.display = "none";

                } else {
                    targetDiv.style.display = "block";
                    // btn.innerHTML = "Hide";
                }
            };

            function redirectToLink(url) {
                window.location.href = url;
            }

            document.addEventListener('DOMContentLoaded', function () {
                const cnicInput = document.getElementById('cnic');
                const mobileInput = document.getElementById('mobile_no');
                const guardianContactInput = document.getElementById('guardian_emergency_contact');
                const smsAlertInput = document.getElementById('mobile_number_for_sms_alert');

                const formatCNIC = (value) => {
                    return value.replace(/\D/g, '')
                        .replace(/(\d{5})(\d{7})(\d{1})/, '$1-$2-$3')
                        .substr(0, 15); // CNIC format: 00000-0000000-0
                };

                const formatPhoneNumber = (value) => {
                    return value.replace(/\D/g, '')
                        .replace(/(\d{4})(\d{7})/, '$1-$2')
                        .substr(0, 12); // Phone format: 0000-0000000
                };

                cnicInput.addEventListener('input', function (e) {
                    e.target.value = formatCNIC(e.target.value);
                });

                mobileInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });

                guardianContactInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });

                smsAlertInput.addEventListener('input', function (e) {
                    e.target.value = formatPhoneNumber(e.target.value);
                });
            });
        </script>
    @endpush
</x-app-layout>
