<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-col my-md-0 my-2">
            <div class="my-2 my-md-0">
                <p class="leading-5 text-black mb-1 text-sm ">
                    {{ __('Show items per page') }}
                </p>
                <select wire:model="perPage" name="perPage"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-32 p-1">
                    @foreach ($paginationOptions as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>

                @if ($this->selected)
                    <x-button danger type="button" wire:click="deleteSelected" class="mx-3">
                        <i class="fas fa-trash-alt"></i>
                    </x-button>
                @endif

            </div>
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <div class="my-2 my-md-0">
                <input type="text" wire:model.debounce.300ms="search"
                    class="p-3 leading-5 bg-white text-gray-500 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    placeholder="{{ __('Search') }}" />
            </div>
        </div>
    </div>

    

    <x-table>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th sortable wire:click="sortBy('title')" :direction="$sorts['title'] ?? null">
                {{ __('Title') }}
                @include('components.table.sort', ['field' => 'title'])
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('slug')" :direction="$sorts['slug'] ?? null">
                {{ __('Slug') }}
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('status')" :direction="$sorts['status'] ?? null">
                {{ __('Status') }}
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>
        </x-slot>
        <x-table.tbody>
            @forelse($pages as $id=>$page)
                <x-table.tr>
                    <x-table.td>
                        {{ $id }}
                    </x-table.td>
                    <x-table.td>
                        {{ $page->title }}
                    </x-table.td>
                    <x-table.td>
                        <a href="{{ route('front.dynamicPage' , $page->slug )}}" target="_blank">
                            {{ $page->slug }}
                        </a>
                    </x-table.td>
                    <x-table.td>
                        <livewire:toggle-button :model="$page" field="status" key="{{ $page->id }}" />
                    </x-table.td>
                    <x-table.td>
                        <x-dropdown
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-32 p-1">
                            <x-slot name="trigger">
                                <button type="button"
                                    class="px-4 text-base font-semibold text-gray-500 hover:text-sky-800">
                                    <i class="fas fa-angle-double-down"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link wire:click="$emit('editModal', {{ $page->id }})"> <i class="fas fa-edit"></i>
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                                <x-dropdown-link wire:click="$emit('deleteModal', {{ $page->id }})"><i class="fas fa-trash-alt"></i>
                                    {{ __('Delete') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
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
            {{ $pages->links() }}
        </div>
    </div>
    
    <livewire:admin.page.edit />

    <livewire:admin.page.create />

</div>
