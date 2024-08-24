<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
            Security Information
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4" />
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')

                    <div class="px-6 mb-4 lg:px-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('security.store', $borrower->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Security -->
                                @if(!in_array($borrower->loan_sub_category->name, ["Advance Salary"]))

                                    <div>
                                        <x-label for="value_of_gold_ornaments_value" value="Value of Gold Ornaments" />
                                        <x-input id="value_of_gold_ornaments_value" class="block mt-1 w-full" type="number" step="0.01" min="0" name="value_of_gold_ornaments_value" :value="old('value_of_gold_ornaments_value')" />
                                    </div>

                                    <div>
                                        <x-label for="gross_weight_of_gold" value="Gross Weight of Gold" />
                                        <x-input id="gross_weight_of_gold" class="block mt-1 w-full" type="number" step="0.001" min="0" name="gross_weight_of_gold" :value="old('gross_weight_of_gold')" />
                                    </div>

                                    <div>
                                        <x-label for="gold_bag_seal_no" value="Gold Bag Seal Number" />
                                        <x-input id="gold_bag_seal_no" class="block mt-1 w-full" type="number" min="0" name="gold_bag_seal_no" :value="old('gold_bag_seal_no')" />
                                    </div>

                                    <div>
                                        <x-label for="market_value" value="Market Value" />
                                        <x-input id="market_value" class="block mt-1 w-full" type="number" step="0.01" min="0" name="market_value" :value="old('market_value')" />
                                    </div>

                                    <div>
                                        <x-label for="forced_sales_value_fsv" value="Forced Sales Value (FSV)" />
                                        <x-input id="forced_sales_value_fsv" class="block mt-1 w-full" type="number" step="0.01" min="0" name="forced_sales_value_fsv" :value="old('forced_sales_value_fsv')" />
                                    </div>

                                    <div>
                                        <x-label for="ownership" value="Ownership" />
                                        <x-input id="ownership" class="block mt-1 w-full" type="text" name="ownership" :value="old('ownership')" />
                                    </div>

                                    <div>
                                        <x-label for="lien_ac_no" value="Lien Account Number" />
                                        <x-input id="lien_ac_no" class="block mt-1 w-full" type="text" name="lien_ac_no" :value="old('lien_ac_no')" />
                                    </div>

                                    <div>
                                        <x-label for="lien_title" value="Lien Title" />
                                        <x-input id="lien_title" class="block mt-1 w-full" type="text" name="lien_title" :value="old('lien_title')" />
                                    </div>

                                    <div>
                                        <x-label for="lien_bank_branch" value="Lien Bank Branch" />
                                        <x-input id="lien_bank_branch" class="block mt-1 w-full" type="text" name="lien_bank_branch" :value="old('lien_bank_branch')" />
                                    </div>

                                    <div>
                                        <x-label for="lien_amount" value="Lien Amount" />
                                        <x-input id="lien_amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="lien_amount" :value="old('lien_amount')" />
                                    </div>

                                    <div>
                                        <x-label for="pledge_tdr_ssc_dsc_cert_no" value="Pledge TDR/SSC/DSC Cert Number" />
                                        <x-input id="pledge_tdr_ssc_dsc_cert_no" class="block mt-1 w-full" type="text" name="pledge_tdr_ssc_dsc_cert_no" :value="old('pledge_tdr_ssc_dsc_cert_no')" />
                                    </div>

                                    <div>
                                        <x-label for="pledge_date_of_issuance" value="Pledge Date of Issuance" />
                                        <x-input id="pledge_date_of_issuance" class="block mt-1 w-full" type="date" name="pledge_date_of_issuance" :value="old('pledge_date_of_issuance')" />
                                    </div>

                                    <div>
                                        <x-label for="pledge_issuing_office" value="Pledge Issuing Office" />
                                        <x-input id="pledge_issuing_office" class="block mt-1 w-full" type="text" name="pledge_issuing_office" :value="old('pledge_issuing_office')" />
                                    </div>

                                    <div>
                                        <x-label for="pledge_amount" value="Pledge Amount" />
                                        <x-input id="pledge_amount" class="block mt-1 w-full" type="text" name="pledge_amount" :value="old('pledge_amount')" />
                                    </div>

                                    <div>
                                        <x-label for="remarks" value="Remarks" />
                                        <textarea id="remarks" class="block mt-1 w-full" name="remarks">{{ old('remarks') }}</textarea>
                                    </div>
                                @elseif($borrower->loan_sub_category->name == "Advance Salary")
                                    <div>
                                        <x-label for="security_type" value="Security Type" />
                                        <select name="security_type" id="security_type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                            <option value="">Select an option</option>
                                            @foreach(\App\Models\Status::where('status', 'security_type')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                <option value="{{ $item->name }}" {{ old('security_type') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="amount_field" style="display: none;">
                                        <x-label for="amount" value="Amount" />
                                        <x-input id="amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="amount" :value="old('amount')" />
                                    </div>

                                    <div id="guarantor_field" style="display: none;">
                                        <x-label for="name_of_guarantor" value="Name Of Guarantor" />
                                        <x-input id="name_of_guarantor" class="block mt-1 w-full" type="text" name="name_of_guarantor" :value="old('name_of_guarantor')" />
                                    </div>

                                    <div id="post_dated_cheques_field" style="display: none;">
                                        <x-label for="post_dated_cheques" value="No Of Post Dated Cheques" />
                                        <x-input id="post_dated_cheques" class="block mt-1 w-full" type="number" name="post_dated_cheques" :value="old('post_dated_cheques')" />
                                    </div>

                                    <div id="cheques_obtained_field" style="display: none;">
                                        <x-label for="cheques_obtained" value="Cheques Obtained (Yes/No)" />
                                        <select name="cheques_obtained" id="cheques_obtained" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                            <option value="">Select an option</option>
                                            @foreach(\App\Models\Status::where('status', 'cheques_obtained')->where('loan_sub_category_id', $borrower->loan_sub_category_id)->get() as $item)
                                                <option value="{{ $item->name }}" {{ old('cheques_obtained') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif


                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Save</x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


        @push('modals')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const securityTypeSelect = document.getElementById('security_type');
                    const amountField = document.getElementById('amount_field');
                    const guarantorField = document.getElementById('guarantor_field');
                    const postDatedChequesField = document.getElementById('post_dated_cheques_field');
                    const chequesObtainedField = document.getElementById('cheques_obtained_field');

                    function updateFields() {
                        const selectedValue = securityTypeSelect.value;

                        amountField.style.display = selectedValue === 'Hypothecation of House Hold Item' ? 'block' : 'none';
                        guarantorField.style.display = selectedValue === 'Personal Guarantee' ? 'block' : 'none';
                        postDatedChequesField.style.display = selectedValue === 'Post Dated Cheques' ? 'block' : 'none';
                        chequesObtainedField.style.display = selectedValue === 'Post Dated Cheques' ? 'block' : 'none';
                    }

                    securityTypeSelect.addEventListener('change', updateFields);

                    // Call updateFields initially to set the correct state based on any pre-selected value
                    updateFields();
                });
            </script>
        @endpush
</x-app-layout>
