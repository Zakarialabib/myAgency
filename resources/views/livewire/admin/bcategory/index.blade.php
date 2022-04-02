<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            <select class="form-control lang" id="languageSelect" data="{{ url()->current() . '?language=' }}">
                @foreach ($langs as $lang)
                    <option value="{{ $lang->code }}"
                        {{ $lang->code == request()->input('language') ? 'selected' : '' }}>{{ $lang->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <div class="my-2 my-md-0">
                <input type="text" wire:model.debounce.300ms="search"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
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
                {{ __('Name') }}
            </x-table.th>
            <x-table.th>
                {{ __('Status') }}
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>

        </x-slot>
        <x-table.tbody>
            @forelse($bcategories as $bcategory)
                <x-table.tr>
                    <x-table.td>
                        <input type="checkbox" value="{{ $bcategory->id }}" wire:model="selected">
                    </x-table.td>
                    <x-table.td>
                        {{ $bcategory->name }}
                    </x-table.td>
                    <x-table.td>
                        @if ($bcategory->status === \App\Models\Bcategory::BCATEGORY_ACITVE)
                            <span class="badge text-white bg-green-500">{{ __('Active') }}</span>
                        @elseif($bcategory->status === \App\Models\Bcategory::BCATEGORY_INACTIVE)
                            <span class="badge text-white bg-red-500">{{ __('Inactive') }}</span>
                        @endif
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">
                            <a class="btn btn-sm text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 mr-2"
                                href="{{ route('admin.bcategories.show', $bcategory) }}">
                                <x-heroicon-o-eye class="h-4 w-4" />
                            </a>
                            <a class="btn btn-sm text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300mr-2"
                                href="{{ route('admin.bcategories.edit', $bcategory) }}">
                                <x-heroicon-o-pencil-alt class="h-4 w-4" />
                            </a>
                            <button
                                class="btn btn-sm text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300"
                                type="button" wire:click="confirm('delete', {{ $bcategory->id }})"
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
            {{ $bcategories->links() }}
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

        // Language filter
        $('#languageSelect').on('change', function() {
            let languageUrl = $(this).attr('data');
            let languageVal = $(this).val();
            languageUrl = languageUrl + languageVal;
            window.location.href = languageUrl;
        })
        $('.languageSelect').on('change', function() {
            let languageUrl = $(this).attr('data');
            let languageVal = $(this).val();
            languageUrl = languageUrl + languageVal;
            window.location.href = languageUrl;
        })
    </script>
@endpush