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
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required id="language_id" name="language_id" wire:model="language_id" :options="$this->listsForFields['languages']" />
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <div class="my-2 my-md-0">
                <input type="text" wire:model.debounce.300ms="search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                {{ __('Language') }}
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('title')" :direction="$sorts['title'] ?? null">
                {{ __('Title') }}
                @include('components.table.sort', ['field' => 'title'])
            </x-table.th>
            <x-table.th>
                {{ __('Image') }}
            </x-table.th>
            <x-table.th>
                {{ __('Status') }}
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>

        </x-slot>
        <x-table.tbody>
            @forelse($services as $service)
                <x-table.tr class="panel-group" id="accordion-{{ $service->id }}" role="tablist" aria-multiselectable="true">
                    <x-table.td id="accordion-collapse-{{ $service->id }}" data-accordion="collapse">
                        <div id="accordion-collapse-heading-{{ $service->id }}">
                            <button type="button"
                                class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 mr-2"
                                data-accordion-target="#accordion-collapse-body-{{ $service->id }}"
                                aria-expanded="false" aria-controls="accordion-collapse-body-{{ $service->id }}">
                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        {{-- <input type="checkbox" value="{{ $service->id }}" wire:model="selected"> --}}
                    </x-table.td>
                    <x-table.td>
                        {{ $service->language->name }} 
                    </x-table.td>
                    <x-table.td>
                        {{ $service->title }}
                    </x-table.td>

                    <x-table.td>
                        <livewire:utils.toggle-button :model="$service" field="status" key="{{ $service->id }}" />
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">
                            <a class="font-bold border-transparent uppercase justify-center text-xs py-2 px-3 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300 mr-2"
                                href="{{ route('admin.services.edit', $service) }}">
                                <x-heroicon-o-pencil-alt class="h-4 w-4" />
                            </a>
                            <button
                                class="font-bold border-transparent uppercase justify-center text-xs py-2 px-3 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300 mr-2"
                                type="button" wire:click="confirm('delete', {{ $service->id }})"
                                wire:loading.attr="disabled">
                                <x-heroicon-o-trash class="h-4 w-4" />
                            </button>
                            <button
                                class="font-bold  bg-purple-500 border-purple-800 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300 uppercase justify-center text-xs py-2 px-3 rounded shadow hover:shadow-md mr-1 ease-linear transition-all duration-150 cursor-pointer text-white"
                                type="button" wire:click="confirm('clone', {{ $service->id }})"
                                wire:loading.attr="disabled">
                                <x-heroicon-o-duplicate class="h-4 w-4" />
                            </button>

                        </div>
                    </x-table.td>
                </x-table.tr>
                <tr id="accordion-collapse-body-{{ $service->id }}" class="hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $service->id }}">
                    <td colspan="12">
                        <div class="panel-body text-center p-5">
                            <h1>{{ $service->title }}</h1>
                            <p>{!! $service->content !!}</p>
                            <div class="container">
                                @if (empty($service->image))
                                    {{ __('No images') }}
                                @else
                                    <img class="w-52 rounded-full"
                                        src="{{ asset('uploads/services/' . $service->image) }}" alt="">
                                @endif
                            </div>

                        </div>
                    </td>
                </tr>
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
            {{ $services->links() }}
        </div>
    </div>
</div>


