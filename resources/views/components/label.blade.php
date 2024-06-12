@props(['value',  'required' => false])

<label {{ $attributes->merge(['class' =>  'block font-bold text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
    @if ($required)
        <span class="text-red-700">*</span>
    @endif
</label>
