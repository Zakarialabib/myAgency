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
                {{ __('Language') }}
            </x-table.th>
            <x-table.th>
                {{ __('Page') }}
            </x-table.th>
            <x-table.th>
                {{ __('Status') }}
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>

        </x-slot>
        <x-table.tbody>
            @forelse($sectiontitles as $sectiontitle)
                <x-table.tr class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <x-table.td id="accordion-collapse" data-accordion="collapse">
                        <div id="accordion-collapse-heading-{{ $sectiontitle->id }}">
                            <button type="button"
                                class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 mr-2"
                                data-accordion-target="#accordion-collapse-body-{{ $sectiontitle->id }}"
                                aria-expanded="false"
                                aria-controls="accordion-collapse-body-{{ $sectiontitle->id }}">
                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        {{-- <input type="checkbox" value="{{ $sectiontitle->id }}" wire:model="selected"> --}}
                    </x-table.td>
                    <x-table.td>
                        {{ $sectiontitle->title }}
                    </x-table.td>
                    <x-table.td>
                        {{ $sectiontitle->language->name }}
                    </x-table.td>
                    <x-table.td>
                        @if ($sectiontitle->page == \App\Models\Sectiontitle::ABOUT_PAGE)
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">{{ __('About') }}</span>
                        @elseif($sectiontitle->page == \App\Models\Sectiontitle::HOME_PAGE)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">{{ __('Home') }}</span>
                        @elseif($sectiontitle->page == \App\Models\Sectiontitle::TEAM_PAGE)
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">{{ __('Team') }}</span>
                        @elseif($sectiontitle->page == \App\Models\Sectiontitle::BLOG_PAGE)
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">{{ __('Blog') }}</span>
                        @elseif($sectiontitle->page == \App\Models\Sectiontitle::SERVICE_PAGE)
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">{{ __('Service') }}</span>
                        @elseif($sectiontitle->page == \App\Models\Sectiontitle::PORTFOLIO_PAGE)
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-900">{{ __('Portfolio') }}</span>
                        @endif
                    </x-table.td>
                    <x-table.td>
                        <livewire:toggle-button :model="$sectiontitle" field="status" key="{{ $sectiontitle->id }}" />
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">
                            <a class="font-bold border-transparent uppercase justify-center text-xs py-2 px-3 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300 mr-2"
                                href="{{ route('admin.sectiontitles.edit', $sectiontitle) }}">
                                <x-heroicon-o-pencil-alt class="h-4 w-4" />
                            </a>
                            <button
                                class="font-bold border-transparent uppercase justify-center text-xs py-2 px-3 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 ease-linear transition-all duration-150 cursor-pointer text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300 mr-2"
                                type="button" wire:click="confirm('delete', {{ $sectiontitle->id }})"
                                wire:loading.attr="disabled">
                                <x-heroicon-o-trash class="h-4 w-4" />
                            </button>
                            <button
                                class="font-bold  bg-purple-500 border-purple-800 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300 uppercase justify-center text-xs py-2 px-3 rounded shadow hover:shadow-md mr-1 ease-linear transition-all duration-150 cursor-pointer text-white"
                                type="button" wire:click="confirm('clone', {{ $sectiontitle->id }})"
                                wire:loading.attr="disabled">
                                <x-heroicon-o-duplicate class="h-4 w-4" />
                            </button>

                        </div>
                    </x-table.td>
                </x-table.tr>
                <tr id="accordion-collapse-body-{{ $sectiontitle->id }}" class="hidden"
                    aria-labelledby="accordion-collapse-heading-{{ $sectiontitle->id }}">
                    <td colspan="12">
                        <div class="panel-body text-center p-5 flex flex-wrap">
                            <div class="w-1/2">

                                <h1>{{ __('Title') }} : {{ $sectiontitle->title }}</h1>
                                <p>{{ __('Subtitle') }} : {{ $sectiontitle->subtitle }}</p>
                                <p>{{ __('Content') }} : {!! $sectiontitle->content !!}</p>
                                <p>{{ __('Text') }} : {{ $sectiontitle->text }}</p>
                            </div>
                                <div class="w-1/2">
                                <p class="py-4">{{ __('Custom button') }} : </p>
                                    <a class="bg-green-500 py-4 my-4 px-6" href="{{ $sectiontitle->link }}">
                                        {{ $sectiontitle->button }}
                                    </a>
                                
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
            {{ $sectiontitles->links() }}
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
