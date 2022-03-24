<footer class="block mx-auto p-4 w-full">
    <hr class="mb-4 border-b-1 border-slate-200">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
        <div class="w-full md:w-5/12 px-4">
            <div class="text-zinc500 text-sm font-semibold py-1 text-center md:text-left">
                {{ config('settings.footer_copyright_text') }} ©
                <span id="get-current-year">{{ date('Y') }}</span> # HOTECH & SOFT #
            </div>

        </div>
    </div>
</footer>
