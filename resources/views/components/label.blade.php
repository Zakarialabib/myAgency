@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-zinc700']) }}>
    {{ $value ?? $slot }}
</label>
