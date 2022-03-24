@props(['type' => 'link'])

@if ($type === 'link')
    <a {{ $attributes->merge(['href' => '#', 'class' => 'block w-full px-4 py-2 text-sm leading-5 text-zinc700 hover:bg-zinc100 hover:text-zinc900 focus:outline-none focus:bg-zinc100 focus:text-zinc900']) }} role="menuitem">
        {{ $slot }}
    </a>
@elseif ($type === 'button')
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'block w-full px-4 py-2 text-sm leading-5 text-zinc700 hover:bg-zinc100 hover:text-zinc900 focus:outline-none focus:bg-zinc100 focus:text-zinc900']) }} role="menuitem">
        {{ $slot }}
    </button>
@endif
