<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-col my-md-0 my-2">
            <div class="my-2 my-md-0">
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

                @if ($this->selectedCount)
                    <p class="text-sm leading-5">
                        <span class="font-medium">
                            {{ $this->selectedCount }}
                        </span>
                        {{ __('Entries selected') }}
                    </p>
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
            <x-table.th>
                {{ __('Language') }}
            </x-table.th>
            <x-table.th>
                {{ __('Page') }}
            </x-table.th>
            <x-table.th>
                {{ __('Title') }}
            </x-table.th>
            <x-table.th>
                {{ __('Status') }}
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>
        </x-slot>
        <x-table.tbody>
            @forelse($sections as $section)
                <x-table.tr wire:loading.class.delay="opacity-50" wire:key="row-{{ $section->id }}">
                    <x-table.td>
                        <input type="checkbox" value="{{ $section->id }}" wire:model="selected">
                    </x-table.td>

                    <x-table.td>
                        <img src="{{ flagImageUrl($section->language->code) }}">
                    </x-table.td>
                    <x-table.td>
                        {{ $section->page_id }}
                    </x-table.td>

                    <x-table.td>
                        {{ $section->title }}
                    </x-table.td>

                    <x-table.td>
                        <livewire:utils.toggle-button :model="$section" field="status" key="{{ $section->id }}" />
                    </x-table.td>
                    <x-table.td>
                        <div class="flex justify-start space-x-2">
                            <x-button info type="button" wire:click="$emit('editModal', {{ $section->id }})"
                                wire:loading.attr="disabled">
                                <i class="fa fa-pen h-4 w-4"></i>
                            </x-button>
                            <x-button danger type="button" wire:click="$emit('deleteModal', {{ $section->id }})"
                                wire:loading.attr="disabled">
                                <i class="fa fa-trash h-4 w-4"></i>
                            </x-button>
                            <x-button warning type="button" wire:click="confirm('clone', {{ $section->id }})"
                                wire:loading.attr="disabled">
                                {{ __('Clone') }}
                            </x-button>
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
            {{ $sections->links() }}
        </div>
    </div>

    @livewire('admin.section.edit', ['section' => $section])

    <livewire:admin.section.create />
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            window.livewire.on('deleteModal', sectionId => {
                Swal.fire({
                    title: __("Are you sure?"),
                    text: __("You won't be able to revert this!"),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: __("Yes, delete it!")
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit('delete', sectionId)
                    }
                })
            })
        })
    </script>
@endpush
