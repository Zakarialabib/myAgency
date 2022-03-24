<tr {{ $attributes->merge([
    'class' => 'whitespace-nowrap text-sm text-zinc800',
]) }}>
    {{ $slot }}
</tr>