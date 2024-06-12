<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            {{--            {{ $student->gender === 'Male' ? 'Mr.' : ($student->gender === 'Female' ? 'Miss' : '') }}--}}
            {{--            {{ $student->firstname . ' ' . $student->lastename }} - {{ $student->id }}--}}
            {{--            ::--}}
            {{--            <span class="text-red-700 font-extrabold">Contact: {{ $student->mobile_number_for_sms_alert }} / {{ $student->guardian_emergency_contact }}</span>--}}
        </h2>
        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
                        <h2 class="text-2xl text-center my-2 uppercase underline font-bold text-red-700">Applicant Business Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        @if(empty($borrower->applicant_business))
                            <form method="POST" action="{{ route('borrower.employment-information.store', $borrower->id) }}" enctype="multipart/form-data">
                                @csrf
                        @else
                            <form method="POST" action="{{ route('borrower.employment-information.update',  [$borrower->id, $borrower->employment_information?->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

                                <div>
                                    <x-label for="name" value="Business Name" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $borrower->applicant_business?->name)" />
                                </div>

                                <div>
                                    <x-label for="type" value="Business Type" />
                                    <select name="type" id="type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        @foreach(\App\Models\Status::where('status', 'Business Type')->get() as $item)
                                            <option value="{{ $item->name }}" {{ old('type', $borrower->applicant_business?->type) == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div>
                                    <x-label for="address" value="Business Address" />
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $borrower->applicant_business?->address)" />
                                </div>

                                <div>
                                    <x-label for="landline" value="Landline Number" />
                                    <x-input id="landline" class="block mt-1 w-full" type="text" name="landline" :value="old('landline', $borrower->applicant_business?->landline)" />
                                </div>

                                <div>
                                    <x-label for="mobile" value="Mobile Number" />
                                    <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile', $borrower->applicant_business?->mobile)" />
                                </div>


                                <div>
                                    <x-label for="designation" value="Designation" />
                                    <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation', $borrower->applicant_business?->designation)" />
                                </div>

                                <div>
                                    <x-label for="monthly_revenue" value="Monthly Revenue / Income" />
                                    <x-input id="monthly_revenue" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_revenue" :value="old('monthly_revenue', $borrower->applicant_business?->monthly_revenue)" />
                                </div>

                                <div>
                                    <x-label for="monthly_expenses" value="Monthly Expenses" />
                                    <x-input id="monthly_expenses" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_expenses" :value="old('monthly_expenses', $borrower->applicant_business?->monthly_expenses)" />
                                </div>

                                <div>
                                    <x-label for="net_monthly_income" value="Net Monthly Income" />
                                    <x-input id="net_monthly_income" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_monthly_income" :value="old('net_monthly_income', $borrower->applicant_business?->net_monthly_income)" />
                                </div>


                                <div>
                                    <x-label for="start_date" value="Commencement Date" />
                                    <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date', $borrower->applicant_business?->start_date)" />
                                </div>

                                <div>
                                    <x-label for="acquisition_date" value="Takeover Date" />
                                    <x-input id="acquisition_date" class="block mt-1 w-full" type="date" name="acquisition_date" :value="old('acquisition_date', $borrower->applicant_business?->acquisition_date)" />
                                </div>

                                <div>
                                    <x-label for="experience_years" value="Years of Experience" />
                                    <x-input id="experience_years" class="block mt-1 w-full" type="number" min="0" name="experience_years" :value="old('experience_years', $borrower->applicant_business?->experience_years)" />
                                </div>





                                <div>
                                    <x-label for="number_of_employees" value="Number of Employees" />
                                    <x-input id="number_of_employees" class="block mt-1 w-full" type="number" min="0" name="number_of_employees" :value="old('number_of_employees', $borrower->applicant_business?->number_of_employees)" />
                                </div>

                                <div>
                                    <x-label for="tax_number" value="National Tax Number (NTN)" />
                                    <x-input id="tax_number" class="block mt-1 w-full" type="text" name="tax_number" :value="old('tax_number', $borrower->applicant_business?->tax_number)" />
                                </div>



                                <div>
                                    <x-label for="initial_investment" value="Initial Investment" />
                                    <x-input id="initial_investment" class="block mt-1 w-full" type="number" step="0.01" min="0" name="initial_investment" :value="old('initial_investment', $borrower->applicant_business?->initial_investment)" />
                                </div>

                                <div>
                                    <x-label for="investment_source" value="Investment Source" />
                                    <x-input id="investment_source" class="block mt-1 w-full" type="text" name="investment_source" :value="old('investment_source', $borrower->applicant_business?->investment_source)" />
                                </div>

                                <div>
                                    <x-label for="premises_status" value="Premises Status" />
                                    <select name="premises_status" id="premises_status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="owned">Owned</option>
                                        <option value="rented">Rented</option>
                                        <option value="leased">Leased</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="monthly_rent" value="Monthly Rent" />
                                    <x-input id="monthly_rent" class="block mt-1 w-full" type="number" step="0.01" min="0" name="monthly_rent" :value="old('monthly_rent', $borrower->applicant_business?->monthly_rent)" />
                                </div>

                                <div>
                                    <x-label for="security_deposit" value="Security Deposit" />
                                    <x-input id="security_deposit" class="block mt-1 w-full" type="number" step="0.01" min="0" name="security_deposit" :value="old('security_deposit', $borrower->applicant_business?->security_deposit)" />
                                </div>

                                <div>
                                    <x-label for="bank_accounts" value="Bank Accounts" />
                                    <x-input id="bank_accounts" class="block mt-1 w-full" type="text" name="bank_accounts" :value="old('bank_accounts', $borrower->applicant_business?->bank_accounts)" />
                                </div>

                                <div>
                                    <x-label for="average_monthly_balance" value="Average Monthly Balance" />
                                    <x-input id="average_monthly_balance" class="block mt-1 w-full" type="number" step="0.01" min="0" name="average_monthly_balance" :value="old('average_monthly_balance', $borrower->applicant_business?->average_monthly_balance)" />
                                </div>

                                <div>
                                    <x-label for="account_opening_date" value="Account Opening Date" />
                                    <x-input id="account_opening_date" class="block mt-1 w-full" type="date" name="account_opening_date" :value="old('account_opening_date', $borrower->applicant_business?->account_opening_date)" />
                                </div>

                                <div>
                                    <x-label for="average_balance_six_months" value="Average Balance Last Six Months" />
                                    <x-input id="average_balance_six_months" class="block mt-1 w-full" type="number" step="0.01" min="0" name="average_balance_six_months" :value="old('average_balance_six_months', $borrower->applicant_business?->average_balance_six_months)" />
                                </div>

                                <div>
                                    <x-label for="account_number" value="Account Number" />
                                    <x-input id="account_number" class="block mt-1 w-full" type="text" name="account_number" :value="old('account_number', $borrower->applicant_business?->account_number)" />
                                </div>

                                <div>
                                    <x-label for="bank_name" value="Bank Name" />
                                    <x-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name', $borrower->applicant_business?->bank_name)" />
                                </div>

                                <div>
                                    <x-label for="net_worth" value="Business Net Worth" />
                                    <x-input id="net_worth" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_worth" :value="old('net_worth', $borrower->applicant_business?->net_worth)" />
                                </div>

                                <div>
                                    <x-label for="business_plan" value="Business Plan" />
                                    <x-input id="business_plan" class="block mt-1 w-full" type="text" name="business_plan" :value="old('business_plan', $borrower->applicant_business?->business_plan)" />
                                </div>

                                <div>
                                    <x-label for="business_type" value="Entity Type" />
                                    <x-input id="business_type" class="block mt-1 w-full" type="text" name="business_type" :value="old('business_type', $borrower->applicant_business?->business_type)" />
                                </div>

                                <div>
                                    <x-label for="new_venture" value="New Business Venture" />
                                    <x-input id="new_venture" class="block mt-1 w-full" type="text" name="new_venture" :value="old('new_venture', $borrower->applicant_business?->new_venture)" />
                                </div>

                                <div>
                                    <x-label for="total_investment_needed" value="Total Investment Needed" />
                                    <x-input id="total_investment_needed" class="block mt-1 w-full" type="number" step="0.01" min="0" name="total_investment_needed" :value="old('total_investment_needed', $borrower->applicant_business?->total_investment_needed)" />
                                </div>

                                <div>
                                    <x-label for="self_financed_amount" value="Self-Financing Amount" />
                                    <x-input id="self_financed_amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="self_financed_amount" :value="old('self_financed_amount', $borrower->applicant_business?->self_financed_amount)" />
                                </div>


                                <div>
                                    <x-label for="status" value="Business Status" />
                                    <select name="status" id="status" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select an option</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="product_description" value="Product Description" />
                                    <x-input id="product_description" class="block mt-1 w-full" type="text" name="product_description" :value="old('product_description', $borrower->applicant_business?->product_description)" />
                                </div>

                                <div>
                                    <x-label for="credit_score" value="Credit Score" />
                                    <x-input id="credit_score" class="block mt-1 w-full" type="number" min="0" name="credit_score" :value="old('credit_score', $borrower->applicant_business?->credit_score)" />
                                </div>

                                <div>
                                    <x-label for="loan_amount" value="Loan Amount" />
                                    <x-input id="loan_amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="loan_amount" :value="old('loan_amount', $borrower->applicant_business?->loan_amount)" />
                                </div>

                                <div>
                                    <x-label for="loan_interest_rate" value="Loan Interest Rate" />
                                    <x-input id="loan_interest_rate" class="block mt-1 w-full" type="number" step="0.01" min="0" name="loan_interest_rate" :value="old('loan_interest_rate', $borrower->applicant_business?->loan_interest_rate)" />
                                </div>

                                <div>
                                    <x-label for="loan_term" value="Loan Term" />
                                    <x-input id="loan_term" class="block mt-1 w-full" type="number" min="0" name="loan_term" :value="old('loan_term', $borrower->applicant_business?->loan_term)" />
                                </div>

                                <div>
                                    <x-label for="loan_start_date" value="Loan Start Date" />
                                    <x-input id="loan_start_date" class="block mt-1 w-full" type="date" name="loan_start_date" :value="old('loan_start_date', $borrower->applicant_business?->loan_start_date)" />
                                </div>

                                <div>
                                    <x-label for="loan_end_date" value="Loan End Date" />
                                    <x-input id="loan_end_date" class="block mt-1 w-full" type="date" name="loan_end_date" :value="old('loan_end_date', $borrower->applicant_business?->loan_end_date)" />
                                </div>

                                <div>
                                    <x-label for="collateral_description" value="Collateral Description" />
                                    <x-input id="collateral_description" class="block mt-1 w-full" type="text" name="collateral_description" :value="old('collateral_description', $borrower->applicant_business?->collateral_description)" />
                                </div>

                                <div>
                                    <x-label for="collateral_value" value="Collateral Value" />
                                    <x-input id="collateral_value" class="block mt-1 w-full" type="number" step="0.01" min="0" name="collateral_value" :value="old('collateral_value', $borrower->applicant_business?->collateral_value)" />
                                </div>

                                <div>
                                    <x-label for="annual_revenue" value="Annual Revenue" />
                                    <x-input id="annual_revenue" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_revenue" :value="old('annual_revenue', $borrower->applicant_business?->annual_revenue)" />
                                </div>

                                <div>
                                    <x-label for="annual_expenses" value="Annual Expenses" />
                                    <x-input id="annual_expenses" class="block mt-1 w-full" type="number" step="0.01" min="0" name="annual_expenses" :value="old('annual_expenses', $borrower->applicant_business?->annual_expenses)" />
                                </div>

                                <div>
                                    <x-label for="net_annual_income" value="Net Annual Income" />
                                    <x-input id="net_annual_income" class="block mt-1 w-full" type="number" step="0.01" min="0" name="net_annual_income" :value="old('net_annual_income', $borrower->applicant_business?->net_annual_income)" />
                                </div>

                                <div>
                                    <x-label for="alternate_contact_name" value="Alternate Contact Name" />
                                    <x-input id="alternate_contact_name" class="block mt-1 w-full" type="text" name="alternate_contact_name" :value="old('alternate_contact_name', $borrower->applicant_business?->alternate_contact_name)" />
                                </div>

                                <div>
                                    <x-label for="alternate_contact_phone" value="Alternate Contact Phone" />
                                    <x-input id="alternate_contact_phone" class="block mt-1 w-full" type="text" name="alternate_contact_phone" :value="old('alternate_contact_phone', $borrower->applicant_business?->alternate_contact_phone)" />
                                </div>


                            </div>
                            <div class="flex items-center justify-end mt-4">
                                @if(empty($borrower->applicant_business))
                                    <x-button class="ml-4" id="submit-btn">Save Employment Information</x-button>
                                @else
                                    <x-button class="ml-4" id="submit-btn">Update Employment Information</x-button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>