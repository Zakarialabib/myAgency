@section('title', __('About List'))

    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="flex-grow text-xl font-bold text-zinc-700 dark:text-zinc-300">
                    {{ __('About list') }}
                </h6>

                <a class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    href="{{ route('admin.about.create') }}">
                    {{ __('Create about') }}
                </a>

            </div>
        </div>
        <div class="p-4">
            <div>
                <div class="flex flex-wrap justify-center">
                    <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
                        <select wire:model="perPage"
                            class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
                            @foreach ($paginationOptions as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <x-select-list
                            class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                            required id="language_id" name="language_id" wire:model="language_id" :options="$this->listsForFields['languages']" />
                    </div>
                    <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
                        <div class="my-2 my-md-0">
                            <input type="text" wire:model.debounce.300ms="search"
                                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                placeholder="{{ __('Search') }}" />
                        </div>
                    </div>
                </div>
                <div wire:loading.delay>
                    Loading...
                </div>

                <x-table>
                    <x-slot name="thead">
                        <x-table.th>#</x-table.th>
                        {{-- <x-table.th sortable wire:click="sortBy('title')" :direction="$sorts['title'] ?? null">
                {{ __('Title') }}
                @include('components.table.sort', ['field' => 'title'])
            </x-table.th> --}}
                        <x-table.th>
                            {{ __('Title') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Image') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Language') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Status') }}
                        </x-table.th>
                        <x-table.th>
                            {{ __('Actions') }}
                        </x-table.th>

                    </x-slot>
                    <x-table.tbody>
                        @forelse($abouts as $about)
                            <x-table.tr>
                                <x-table.td>
                                    <input type="checkbox" value="{{ $about->id }}" wire:model="selected">
                                </x-table.td>
                                <x-table.td>
                                    {{ $about->title }}
                                </x-table.td>
                                <x-table.td>
                                    @if (empty($about->image))
                                        {{ __('No images') }}
                                    @else
                                        <img class="w-52 rounded-full" src="{{ asset('uploads/abouts/' . $about->image) }}"
                                            alt="">
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    {{ $about->language->name }}
                                </x-table.td>
                                <x-table.td>
                                    <livewire:toggle-button :model="$about" field="status" key="{{ $about->id }}" />
                                </x-table.td>
                                <x-table.td>
                                    <div class="inline-flex">

                                        <a class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 mr-2"
                                            href="{{ route('admin.about.show', $about) }}">
                                            <x-heroicon-o-eye class="h-4 w-4" />
                                        </a>
                                        <a class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300mr-2"
                                            href="{{ route('admin.about.edit', $about) }}">
                                            <x-heroicon-o-pencil-alt class="h-4 w-4" />
                                        </a>
                                        <button
                                            class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300"
                                            type="button" wire:click="confirm('delete', {{ $about->id }})"
                                            wire:loading.attr="disabled">
                                            <x-heroicon-o-trash class="h-4 w-4" />
                                        </button>
                                        <button
                                            class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer text-white bg-orange-500 border-orange-800 hover:bg-orange-600 active:bg-orange-700 focus:ring-orange-300"
                                            type="button" wire:click="confirm('clone', {{ $about->id }})"
                                            wire:loading.attr="disabled">
                                            <x-heroicon-o-duplicate class="h-4 w-4" />
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

                <div class="card-body">
                    <div class="pt-3">
                        @if ($this->selectedCount)
                            <p class="text-sm leading-5">
                                <span class="font-medium">
                                    {{ $this->selectedCount }}
                                </span>
                                {{ __('Entries selected') }}
                            </p>
                        @endif
                        {{ $abouts->links() }}
                    </div>
                </div>
            </div>
        </div>
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
