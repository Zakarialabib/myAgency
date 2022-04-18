<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="
                {{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            <button
                class="text-blue-500 dark:text-zinc-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-zinc-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                type="button" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled"
                {{ $this->selectedCount ? '' : 'disabled' }}>
                <x-heroicon-o-trash class="h-4 w-4" />
            </button>
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <input type="text" wire:model.debounce.300ms="search"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                placeholder="{{ __('Search') }}" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <x-table>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">
                {{ __('Date') }}
                @include('components.table.sort', ['field' => 'created_at'])
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('name')" :direction="$sorts['name'] ?? null">
                {{ __('Name') }}
                @include('components.table.sort', ['field' => 'name'])
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('email')" :direction="$sorts['email'] ?? null">
                {{ __('Email') }}
                @include('components.table.sort', ['field' => 'email'])
            </x-table.th>
            <x-table.th>
                {{ __('Phone') }}
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('status')" :direction="$sorts['status'] ?? null">
                {{ __('Status') }}
                @include('components.table.sort', ['field' => 'status'])
            </x-table.th>
            <x-table.th>
                {{ __('Roles') }}
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>
        </x-slot>
        <x-table.tbody>
            @forelse($users as $user)
                <x-table.tr>
                    <x-table.td>
                        <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                    </x-table.td>
                    <x-table.td>
                        {{ $user->created_at->format('d / m / Y') }}
                    </x-table.td>
                    <x-table.td>
                        <a class="link-light-blue" href="{{ route('admin.users.show', $user) }}">
                            {{ $user->name }}
                        </a>
                    </x-table.td>
                    <x-table.td>
                        <a class="link-light-blue" href="mailto:{{ $user->email }}">
                            {{ $user->email }}
                        </a>
                    </x-table.td>
                    <x-table.td>
                        {{ $user->phone }}
                    </x-table.td>
                    <x-table.td>
                        <livewire:toggle-button :model="$user" field="status" key="{{ $user->id }}" />
                    </x-table.td>
                    <x-table.td>
                        @foreach ($user->roles as $key => $entry)
                            <span class="text-xs font-semibold inline-block py-1 px-2 rounded last:mr-0 mr-1 text-indigo-600 bg-indigo-200">{{ $entry->title }}</span>
                        @endforeach
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">
                            <a class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300mr-2"
                                href="{{ route('admin.users.show', $user) }}">
                                <x-heroicon-o-eye class="h-4 w-4" />
                            </a>
                            <a class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 mr-2"
                                href="{{ route('admin.users.edit', $user) }}">
                                <x-heroicon-o-pencil-alt class="h-4 w-4" />
                            </a>
                            <button
                                class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300"
                                type="button" wire:click="confirm('delete', {{ $user->id }})"
                                wire:loading.attr="disabled">
                                <x-heroicon-o-trash class="h-4 w-4" />
                            </button>
                        </div>
                    </x-table.td>
                </x-table.tr>
            @empty
                <x-table.tr>
                    <x-table.td colspan="10" class="text-center">
                        {{ __('No entries found.') }}
                    </x-table.td>
                </x-table.tr>
            @endforelse
        </x-table.tbody>
    </x-table>

    <div class="p-4">
        <div class="pt-3">
            @if ($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $users->links() }}
        </div>
    </div>

    <!-- Delete User Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">{{ __('Delete Selected Users') }}</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-zinc-700">{{ __('Are you sure you? This action is irreversible.') }}</div>
            </x-slot>

            <x-slot name="footer">
                <button type="button"
                    class="btn border-zinc-300 text-zinc-700 dark:text-zinc-300 active:bg-zinc-50 dark:active:text-zinc-800 hover:text-zinc500 dark:active:bg-dark-eval-1 active:text-zinc-300 dark:hover:text-zinc-700"
                    wire:click="$set('showDeleteModal', false)">{{ __('Go back') }}</button>

                <button class="btn text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 border-indigo-600"
                    type="submit">{{ __('Delete') }}</button>
            </x-slot>
        </x-modal.confirmation>
    </form>

</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
            if (!confirm("{{ __('Are you sure') }}")) {
                return
            }
            @this[e.callback](...e.argv)
        });
    </script>
@endpush
