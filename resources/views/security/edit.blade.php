<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Edit Security
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

                        <h2 class="text-2xl mt-4 text-center my-2 uppercase underline font-bold text-red-700">Security Information</h2>
                        <x-validation-errors class="mb-4 mt-4" />
                        <form method="POST" action="{{ route('security.update', [$borrower->id, $security->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <!-- Form fields for Security -->
                                <div>
                                    <x-label for="security_type" value="Security Type" />
                                    <x-input id="security_type" class="block mt-1 w-full" type="text" name="security_type" :value="old('security_type', $security->security_type)" />
                                </div>

                                <div>
                                    <x-label for="value_of_gold_ornaments_value" value="Value of Gold Ornaments" />
                                    <x-input id="value_of_gold_ornaments_value" class="block mt-1 w-full" type="number" step="0.01" min="0" name="value_of_gold_ornaments_value" :value="old('value_of_gold_ornaments_value', $security->value_of_gold_ornaments_value)" />
                                </div>

                                <div>
                                    <x-label for="gross_weight_of_gold" value="Gross Weight of Gold" />
                                    <x-input id="gross_weight_of_gold" class="block mt-1 w-full" type="number" step="0.001" min="0" name="gross_weight_of_gold" :value="old('gross_weight_of_gold', $security->gross_weight_of_gold)" />
                                </div>

                                <div>
                                    <x-label for="gold_bag_seal_no" value="Gold Bag Seal Number" />
                                    <x-input id="gold_bag_seal_no" class="block mt-1 w-full" type="number" min="0" name="gold_bag_seal_no" :value="old('gold_bag_seal_no', $security->gold_bag_seal_no)" />
                                </div>

                                <div>
                                    <x-label for="market_value" value="Market Value" />
                                    <x-input id="market_value" class="block mt-1 w-full" type="number" step="0.01" min="0" name="market_value" :value="old('market_value', $security->market_value)" />
                                </div>

                                <div>
                                    <x-label for="forced_sales_value_fsv" value="Forced Sales Value (FSV)" />
                                    <x-input id="forced_sales_value_fsv" class="block mt-1 w-full" type="number" step="0.01" min="0" name="forced_sales_value_fsv" :value="old('forced_sales_value_fsv', $security->forced_sales_value_fsv)" />
                                </div>

                                <div>
                                    <x-label for="ownership" value="Ownership" />
                                    <x-input id="ownership" class="block mt-1 w-full" type="text" name="ownership" :value="old('ownership', $security->ownership)" />
                                </div>

                                <div>
                                    <x-label for="lien_ac_no" value="Lien Account Number" />
                                    <x-input id="lien_ac_no" class="block mt-1 w-full" type="text" name="lien_ac_no" :value="old('lien_ac_no', $security->lien_ac_no)" />
                                </div>

                                <div>
                                    <x-label for="lien_title" value="Lien Title" />
                                    <x-input id="lien_title" class="block mt-1 w-full" type="text" name="lien_title" :value="old('lien_title', $security->lien_title)" />
                                </div>

                                <div>
                                    <x-label for="lien_bank_branch" value="Lien Bank Branch" />
                                    <x-input id="lien_bank_branch" class="block mt-1 w-full" type="text" name="lien_bank_branch" :value="old('lien_bank_branch', $security->lien_bank_branch)" />
                                </div>

                                <div>
                                    <x-label for="lien_amount" value="Lien Amount" />
                                    <x-input id="lien_amount" class="block mt-1 w-full" type="number" step="0.01" min="0" name="lien_amount" :value="old('lien_amount', $security->lien_amount)" />
                                </div>

                                <div>
                                    <x-label for="pledge_tdr_ssc_dsc_cert_no" value="Pledge TDR/SSC/DSC Cert Number" />
                                    <x-input id="pledge_tdr_ssc_dsc_cert_no" class="block mt-1 w-full" type="text" name="pledge_tdr_ssc_dsc_cert_no" :value="old('pledge_tdr_ssc_dsc_cert_no', $security->pledge_tdr_ssc_dsc_cert_no)" />
                                </div>

                                <div>
                                    <x-label for="pledge_date_of_issuance" value="Pledge Date of Issuance" />
                                    <x-input id="pledge_date_of_issuance" class="block mt-1 w-full" type="date" name="pledge_date_of_issuance" :value="old('pledge_date_of_issuance', $security->pledge_date_of_issuance)" />
                                </div>

                                <div>
                                    <x-label for="pledge_issuing_office" value="Pledge Issuing Office" />
                                    <x-input id="pledge_issuing_office" class="block mt-1 w-full" type="text" name="pledge_issuing_office" :value="old('pledge_issuing_office', $security->pledge_issuing_office)" />
                                </div>

                                <div>
                                    <x-label for="pledge_amount" value="Pledge Amount" />
                                    <x-input id="pledge_amount" class="block mt-1 w-full" type="text" name="pledge_amount" :value="old('pledge_amount', $security->pledge_amount)" />
                                </div>

                                <div>
                                    <x-label for="remarks" value="Remarks" />
                                    <textarea id="remarks" class="block mt-1 w-full" name="remarks">{{ old('remarks', $security->remarks) }}</textarea>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4" id="submit-btn">Update Security</x-button>
                            </div>
                        </form>

                        <a href="{{ route('security.index', $borrower->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
