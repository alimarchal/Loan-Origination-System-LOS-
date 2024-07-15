<x-app-layout>
    @push('header') @endpush
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight">
                Obligor Score Card
            </h2>
            @include('back-navigation')
        </div>
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