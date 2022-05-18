<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-gradient-to-r from-purple-800 via-violet-900 to-purple-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-purple-50 text-white font-semibold h-10 px-4 rounded-lg flex items-center justify-center sm:w-auto']) }}>
    {{ $slot }}
</button>
