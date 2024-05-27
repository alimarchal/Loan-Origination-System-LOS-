@props(['link', 'number', 'title', 'imageSrc', 'imageAlt'])

<a href="{{ $link }}" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
    <div class="p-5 flex justify-between">
        <div>
            <div class="text-3xl font-bold leading-8">{{ $number }}</div>
            <div class="mt-1 text-base font-extrabold text-black">{{ $title }}</div>
        </div>
        <img src="{{ $imageSrc }}" alt="{{ $imageAlt }}" class="h-16 w-16">
    </div>
</a>
