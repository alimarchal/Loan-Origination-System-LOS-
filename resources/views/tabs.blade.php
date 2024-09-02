<div class="border-b border-gray-200 dark:border-gray-700 print:hidden">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">

        @if($borrower->loan_sub_category?->name == "Advance Salary")
            @include('layouts.loan-tabs.salary')
        @else

        @endif


    </ul>
</div>
