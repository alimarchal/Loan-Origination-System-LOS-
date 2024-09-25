<x-app-layout>


        <x-slot name="header">
            <h2 class="text-xl uppercase underline font-bold text-red-700 text-center leading-tight block">
                Obligor Score Card
            </h2>
        </x-slot>


        <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <x-status-message class="mb-4"/>
                <div class="pb-2 lg:pb-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')

                    <div class="relative overflow-x-auto">
                        @if($osf_exist)
                            <form action="{{ route('obligor-score-card.store', $borrower->id) }}" method="POST" id="obligorScoreForm">
                                @csrf
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                    <tr class="bg-bank-green text-white uppercase text-sm">
                                        <th class="py-2 px-2 text-center">ID</th>
                                        <th class="py-2 px-2 text-left">Measurement / Factor</th>
                                        <th class="py-2 px-2 text-left">Description</th>
                                        <th class="py-2 px-2 text-center">Score Available</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-black text-sm leading-normal">
                                    @foreach($obsf as $obligor_factors)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-1 px-2 text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="py-1 px-2 text-left" >
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $obligor_factors->factor }}
                                                </div>
                                            </td>
                                            <td class="py-1 px-2 text-center">
                                                <div class="space-y-2">
                                                    @foreach($obligor_factors->obligor_score_factor_options as $option)
                                                        <div class="flex items-center">
                                                            <input type="radio"
                                                                   id="option_{{ $obligor_factors->id }}_{{ $option->id }}"
                                                                   name="answers[{{ $obligor_factors->id }}]"
                                                                   value="{{ $option->id }}"
                                                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-gray-600"
                                                                   required
                                                            >
                                                            <label for="option_{{ $obligor_factors->id }}_{{ $option->id }}"
                                                                   class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                                {{ $option->options }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>

                                            <td class="py-1 px-2 text-center">
                                                <div class="space-y-2">
                                                    @foreach($obligor_factors->obligor_score_factor_options as $option)
                                                        <div class="text-center">
                                                            {{ $option->score_available }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div>
                                    <x-button type="submit" class="float-right m-4">
                                        Submit Score Card
                                    </x-button>
                                </div>
                            </form>
                        @else
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-bank-green text-white uppercase text-sm">
                                    <th class="py-2 px-2 text-center">ID</th>
                                    <th class="py-2 px-2 text-left">Measurement / Factor</th>
                                    <th class="py-2 px-2 text-left">Description</th>
                                    <th class="py-2 px-2 text-center">Score Gained</th>
                                </tr>
                                </thead>
                                <tbody class="text-black text-sm leading-normal">
                                @foreach($osc as $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-1 px-2 text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="py-1 px-2 text-left" >
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ \App\Models\ObligorScoreCardFactor::find($item->score_card_factor_id)?->factor }}
                                            </div>
                                        </td>
                                        <td class="py-1 px-2 text-left">
                                            <div class="space-y-2">

                                                {{ \App\Models\OscfOpt::find($item->score_card_factor_opt_id)->options }}
                                            </div>
                                        </td>

                                        <td class="py-1 px-2 text-center">
                                            <div class="space-y-2">
                                                <div class="text-center">
                                                    {{ $item->score_gained }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="border-b border-gray-200 hover:bg-gray-100 font-extrabold">
                                    <td class="py-1 px-2 text-right" colspan="3">
                                        Total
                                    </td>
                                    <td class="py-1 px-2 text-center" >
                                        {{ number_format($osc->sum('score_gained'),2) }}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <form action="{{ route('obligor-score-card.destroy', $borrower->id) }}" method="POST" id="obligorScoreForm" onsubmit="return confirm('Do you really want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <div>
                                    <x-button type="submit" class="float-right m-4 bg-red-700 hover:bg-bank-green" >
                                        Delete and Re-Submit
                                    </x-button>
                                </div>
                            </form>
                       @endif


                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-2">
                        <div class="flex items-center justify-left mt-1 mx-2">
                            @can('Inputter')

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

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('obligorScoreForm').addEventListener('submit', function(e) {
        // e.preventDefault();

        let formData = new FormData(this);
        let answers = {};

        for (let [key, value] of formData.entries()) {
            if (key.startsWith('answers[')) {
                let questionId = key.match(/\d+/)[0];
                answers[questionId] = value;
            }
        }

        // Here you can send the answers object to your server
        console.log(answers);

        // Uncomment the line below to submit the form after processing
        // this.submit();
    });
</script>
