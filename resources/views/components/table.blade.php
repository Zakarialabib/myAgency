<div class="w-full mb-5 overflow-hidden rounded">
    <div class="w-full overflow-x-auto">
        <table class="table w-full bg-white dark:bg-dark-eval-1 dark:text-zinc-300 pt-5">
            <x-table.thead>
                {{ $thead }}
            </x-table.thead>

            {{ $slot }}

        </table>
    </div>
</div>

