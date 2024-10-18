<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">

        <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
            Requested Loan Information
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <x-validation-errors class="mb-4 mt-4"/>
                        @if(empty($borrower->applicant_requested_loan_information))
                            <form method="POST" action="{{ route('applicant.requested-loan-information.store', $borrower->id) }}" enctype="multipart/form-data">
                                @csrf
                                @else
                                    <form method="POST" action="{{ route('applicant.requested-loan-information.update',  [$borrower->id, $borrower->applicant_requested_loan_information?->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @endif

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                                            <div>
                                                <x-label for="request_date" value="Request Date" :required="true"/>
                                                <x-input id="request_date" class="block mt-1 w-full" type="date" max="{{ date('Y-m-d') }}" name="request_date" :value="old('request_date', $borrower->applicant_requested_loan_information?->request_date)" required/>
                                            </div>

                                            <div>
                                                <x-label for="requested_amount" value="Requested Amount"/>
                                                <x-input id="requested_amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="requested_amount" :value="old('requested_amount', $borrower->applicant_requested_loan_information?->requested_amount)"/>
                                            </div>


                                            @if(!in_array($borrower->loan_sub_category->name, ["Advance Salary"]))
                                                <div>
                                                    <x-label for="margin_on_gold_limit" value="Margin on Gold Limit"/>
                                                    <x-input id="margin_on_gold_limit" class="block mt-1 w-full" type="number" step="0.01" min="0" name="margin_on_gold_limit" :value="old('margin_on_gold_limit', $borrower->applicant_requested_loan_information?->margin_on_gold_limit)"/>
                                                </div>
                                            @endif


                                            <div>
                                                <x-label for="loan_purpose" value="Loan Purpose"/>
                                                <x-input id="loan_purpose" class="block mt-1 w-full" type="text" name="loan_purpose" :value="old('loan_purpose', $borrower->applicant_requested_loan_information?->loan_purpose)"/>
                                            </div>

                                            <div>
                                                <x-label for="status" value="Status"/>
                                                <select name="status" id="status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @foreach(\App\Models\Status::where('status', 'status')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                        <option value="{{ $item->name }}" {{ old('status', $borrower->applicant_requested_loan_information?->status) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div>
                                                <x-label for="fund_based_non_fund_based" value="Fund Based / Non Fund Based"/>
                                                <select name="fund_based_non_fund_based" id="fund_based_non_fund_based" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @foreach(\App\Models\Status::where('status', 'fund_based_non_fund_based')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                        <option value="{{ $item->name }}" {{ old('fund_based_non_fund_based', $borrower->applicant_requested_loan_information?->fund_based_non_fund_based) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <x-label for="tenure_in_years" value="Tenure in Years"/>
                                                <select name="tenure_in_years" id="tenure_in_years" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @for($i = 0; $i <= 20; $i++)
                                                        <option value="{{$i}}" {{ old('grade', $borrower->applicant_requested_loan_information?->tenure_in_years) == $i ? 'selected' : '' }}>{{$i}} Years</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <div>
                                                <x-label for="tenure_in_months" value="Tenure in Months"/>
                                                <select name="tenure_in_months" id="tenure_in_months" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @for($i = 0; $i <= 11; $i++)
                                                        <option value="{{$i}}" {{ old('grade', $borrower->applicant_requested_loan_information?->tenure_in_months) == $i ? 'selected' : '' }}>{{$i}} Months</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <div>
                                                <x-label for="repayment_frequency" value="Repayment Frequency"/>
                                                <select name="repayment_frequency" id="repayment_frequency" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @foreach(\App\Models\Status::where('status', 'repayment_frequency')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                        <option value="{{ $item->name }}" {{ old('repayment_frequency', $borrower->applicant_requested_loan_information?->repayment_frequency) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <x-label for="salary_account_no" value="Other Bank Account"/>
                                                <x-input id="salary_account_no" class="block mt-1 w-full" type="text" name="salary_account_no" :value="old('salary_account_no', $borrower->applicant_requested_loan_information?->salary_account_no)"/>
                                            </div>

                                            <div>
                                                <x-label for="salary_account_branch_name" value="Other Bank Branch Name"/>
                                                <x-input id="salary_account_branch_name" class="block mt-1 w-full" type="text" name="salary_account_branch_name" :value="old('salary_account_branch_name', $borrower->applicant_requested_loan_information?->salary_account_branch_name)"/>
                                            </div>

                                            <div>
                                                <x-label for="salary_account_bank_name" value="Salary Account Bank Name"/>
                                                <x-input id="salary_account_bank_name" class="block mt-1 w-full" type="text" name="salary_account_bank_name" :value="old('salary_account_bank_name', $borrower->applicant_requested_loan_information?->salary_account_bank_name)"/>
                                            </div>

                                            <div>
                                                <x-label for="account_with_bajk" value="BAJK Account #"/>
                                                <x-input id="account_with_bajk" class="block mt-1 w-full" type="text" name="account_with_bajk" :value="old('account_with_bajk', $borrower->applicant_requested_loan_information?->account_with_bajk)"/>
                                                </div>


                                            <div>
                                                <x-label for="markup_rate_type" value="Markup Rate Type"/>
                                                <select name="markup_rate_type" id="markup_rate_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @foreach(\App\Models\Status::where('status', 'markup_rate_type')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                        <option value="{{ $item->name }}" {{ old('markup_rate_type', $borrower->applicant_requested_loan_information?->markup_rate_type) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div>
                                                <x-label for="markup_rate" value="Mark Up Rate"/>
                                                <x-input id="markup_rate" class="block mt-1 w-full" type="number" step="0.01" name="markup_rate" :value="old('markup_rate', $borrower->applicant_requested_loan_information?->markup_rate)"/>
                                            </div>

                                            <div>
                                                <x-label for="is_insured" value="Is Insured"/>
                                                <select name="is_insured" id="is_insured" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @foreach(\App\Models\Status::where('status', 'is_insured')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                        <option value="{{ $item->name }}" {{ old('is_insured', $borrower->applicant_requested_loan_information?->is_insured) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div>
                                                <x-label for="nature_of_business" value="Nature of Business / Profession"/>
                                                <select name="nature_of_business" required id="nature_of_business" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                                    <option value="">Select an option</option>
                                                    @foreach(\App\Models\Status::where('status', 'nature_of_business')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                        <option value="{{ $item->name }}" {{ old('nature_of_business', $borrower->applicant_requested_loan_information?->nature_of_business) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <x-label for="nature_of_business_other" value="If Any Other "/>
                                                <x-input id="nature_of_business_other" class="block mt-1 w-full" type="text" name="nature_of_business_other" :value="old('markup_rate', $borrower->applicant_requested_loan_information?->nature_of_business_other)"/>
                                            </div>


                                            <div>
                                                <x-label for="details_payment_schedule" value="Details of Payment Schedule"/>
                                                <x-input id="details_payment_schedule" class="block mt-1 w-full" type="text" name="details_payment_schedule" :value="old('markup_rate', $borrower->applicant_requested_loan_information?->details_payment_schedule)"/>
                                            </div>


                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>


                                            <div class="flex items-center justify-end mt-4">
                                                @can('inputter')
                                                    @if(empty($borrower->applicant_requested_loan_information))
                                                        <x-button class="ml-4" id="submit-btn">Save</x-button>
                                                    @else
                                                        @if($borrower->is_authorize == "No")
                                                            <x-button class="ml-4" id="submit-btn">Update</x-button>
                                                        @endif
                                                    @endif


                                                    @php
                                                        $checklist = \App\Models\Checklist::where('loan_sub_category_id', $borrower->loan_sub_category->id)->orderBy('sequence_no')->get();
                                                        $currentIndex = $checklist->search(fn($item) => request()->routeIs($item->route));
                                                        $prevItem = $checklist[$currentIndex - 1] ?? null;
                                                        $nextItem = $checklist[$currentIndex + 1] ?? null;
                                                    @endphp
                                                    @if($prevItem)
                                                        <a href="{{ route($prevItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                                            Previous
                                                        </a>
                                                    @endif
                                                    @if($nextItem)
                                                        <a href="{{ route($nextItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                                            Next
                                                        </a>
                                                    @endif
                                                @endcan
                                            </div>
                                        </div>
                                    </form>

                                    @can('authorizer')
                                        @if(!empty($borrower->applicant_requested_loan_information))
                                            <form method="POST" onsubmit="return confirm('Do you really want to authorized this record?');" action="{{ route('applicant.requested-loan-information.authorized', [$borrower->id, $borrower->applicant_requested_loan_information?->id] ) }}" enctype="multipart/form-data">
                                                @csrf @method('PUT')
                                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                                    <div class="flex mt-4">
                                                        <input type="hidden" name="is_authorize" value="Yes">
                                                        <button class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2" id="submit-btn">Authorized</button>
                                                    </div>
                                                </div>
                                            </form>
                                    @endif

                                            <div class="flex items-center justify-end mt-4">

                                                @php
                                                    $checklist = \App\Models\Checklist::where('loan_sub_category_id', $borrower->loan_sub_category->id)->orderBy('sequence_no')->get();
                                                    $currentIndex = $checklist->search(fn($item) => request()->routeIs($item->route));
                                                    $prevItem = $checklist[$currentIndex - 1] ?? null;
                                                    $nextItem = $checklist[$currentIndex + 1] ?? null;
                                                @endphp
                                                @if($prevItem)
                                                    <a href="{{ route($prevItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                                        Previous
                                                    </a>
                                                @endif
                                                @if($nextItem)
                                                    <a href="{{ route($nextItem->route, $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150 ml-2">
                                                        Next
                                                    </a>
                                                @endif
                                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
