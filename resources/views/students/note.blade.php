<x-app-layout>

    @push('header')
        <script src="https://cdn.tiny.cloud/1/izbyerk8x92uls8z2ulnezm5uaudhf41lw0lebop5ba724o5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
              selector: 'textarea',
              plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
              toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl uppercase text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Notes
        </h2>


        @include('back-navigation')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg  print:shadow-none">

                <x-status-message class="mb-4"/>
                <div class="pb-4 lg:pb-4 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @include('tabs')
                    <div class=" bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">



                        @if($student->notes->isNotEmpty())
                            <ol class="relative border-s border-gray-200 dark:border-gray-700 m-8">
                                @php
                                    $notes = $student->notes->sortByDesc('created_at');
                                    $latestNote = $notes->first();
                                @endphp
                                @foreach($notes as $note)
                                    <li class="mb-10 ms-6">
                                        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                        </span>
                                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $note->user->name }}
                                            @if($note->id === $latestNote->id) <!-- Checks if the current note is the latest -->
                                                <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">Latest</span>
                                            @endif
                                        </h3>
                                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Noted on {{ \Carbon\Carbon::parse($note->created_at)->format('F jS, Y h:i:sa') }}</time>
                                        <div class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                            {!! $note->remarks !!}
                                        </div>
                                        @if(!empty($note->attachment))
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($note->attachment) }}" download="{{$note->attachment}}"
                                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                                <svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                                                    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                Download
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        @endif


                        <x-validation-errors class="mb-4 ml-4 mt-4"/>
                        <form method="post" action="{{ route('admission.submit-note', $student->id) }}" enctype="multipart/form-data" class="print:hidden">

                            @csrf
                            <div class="grid grid-cols-1 mb-8 pb-8 md:grid-cols-1 lg:grid-cols-1 gap-4 mt-4" style="padding-left: 50px!important; padding-right: 50px!important;">

                                <div>
                                    <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail Notes/Remarks</label>
                                    <textarea id="remarks" name="remarks" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                              placeholder="Write your thoughts here..."></textarea>
                                </div>

                                <div>
                                    <x-label for="attachment_one" value="Any Attachment (Scanned Copy)" :required="false"/>
                                    <x-input id="attachment_one" name="attachment_one" class="block mt-1 w-full" type="file"/>
                                </div>

                                <div class="flex items-center justify-end mt-1">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" id="submit-btn">
                                        Submit Remarks
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
