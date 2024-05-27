@if (session('success') || session('error'))

    @if (session('error'))
        <div class="bg-red-500 text-white text-center px-4 py-2">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-500 text-white text-center px-4 py-2">
            {{ session('success') }}
        </div>
    @endif
@endif
