@if($borrower->loan_sub_category?->id === 1)
    @include('checklist.consumer-advance-salary')
@elseif($borrower->loan_sub_category?->id === 2)
    hello
@endif