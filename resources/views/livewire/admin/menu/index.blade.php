<div>
    <section class="py-3 px-4">
        <div class="flex flex-wrap items-center justify-between">
            <div class="mb-5 lg:mb-0">
                <h2 class="mb-1 text-2xl font-bold">
                    {{ __('Menu') }}
                </h2>
                <div class="flex items-center">
                    <a class="flex items-center text-sm text-gray-500" href="{{ route('admin.dashboard') }}">
                        <span class="inline-block mr-2">
                            <svg class="h-4 w-4 text-gray-500" viewBox="0 0 16 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.6666 5.66667L9.66662 1.28333C9.20827 0.873372 8.6149 0.646725 7.99996 0.646725C7.38501 0.646725 6.79164 0.873372 6.33329 1.28333L1.33329 5.66667C1.0686 5.9034 0.857374 6.1938 0.713683 6.51854C0.569993 6.84328 0.497134 7.1949 0.499957 7.55V14.8333C0.499957 15.4964 0.763349 16.1323 1.23219 16.6011C1.70103 17.0699 2.33692 17.3333 2.99996 17.3333H13C13.663 17.3333 14.2989 17.0699 14.7677 16.6011C15.2366 16.1323 15.5 15.4964 15.5 14.8333V7.54167C15.5016 7.18797 15.4282 6.83795 15.2845 6.51474C15.1409 6.19152 14.9303 5.90246 14.6666 5.66667V5.66667ZM9.66662 15.6667H6.33329V11.5C6.33329 11.279 6.42109 11.067 6.57737 10.9107C6.73365 10.7545 6.94561 10.6667 7.16662 10.6667H8.83329C9.0543 10.6667 9.26626 10.7545 9.42255 10.9107C9.57883 11.067 9.66662 11.279 9.66662 11.5V15.6667ZM13.8333 14.8333C13.8333 15.0543 13.7455 15.2663 13.5892 15.4226C13.4329 15.5789 13.221 15.6667 13 15.6667H11.3333V11.5C11.3333 10.837 11.0699 10.2011 10.6011 9.73223C10.1322 9.26339 9.49633 9 8.83329 9H7.16662C6.50358 9 5.8677 9.26339 5.39886 9.73223C4.93002 10.2011 4.66662 10.837 4.66662 11.5V15.6667H2.99996C2.77894 15.6667 2.56698 15.5789 2.4107 15.4226C2.25442 15.2663 2.16662 15.0543 2.16662 14.8333V7.54167C2.16677 7.42335 2.19212 7.30641 2.24097 7.19865C2.28982 7.09089 2.36107 6.99476 2.44996 6.91667L7.44996 2.54167C7.60203 2.40807 7.79753 2.33439 7.99996 2.33439C8.20238 2.33439 8.39788 2.40807 8.54996 2.54167L13.55 6.91667C13.6388 6.99476 13.7101 7.09089 13.7589 7.19865C13.8078 7.30641 13.8331 7.42335 13.8333 7.54167V14.8333Z"
                                    fill="currentColor"></path>
                            </svg></span>
                        <span>{{ __('Home') }}</span>
                    </a>
                    <span class="inline-block mx-4">
                        <svg class="h-2 w-2 text-gray-500" viewBox="0 0 6 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.23242 9.3689C1.06762 9.36887 0.906542 9.31997 0.769534 9.2284C0.632526 9.13683 0.525742 9.0067 0.462684 8.85445C0.399625 8.7022 0.383124 8.53467 0.415263 8.37304C0.447403 8.21141 0.526741 8.06294 0.643249 7.9464L3.58916 5L0.643224 2.05364C0.486959 1.89737 0.399171 1.68543 0.39917 1.46444C0.399169 1.24345 0.486957 1.03151 0.64322 0.875249C0.799483 0.718985 1.01142 0.631196 1.23241 0.631195C1.4534 0.631194 1.66534 0.718982 1.82161 0.875245L5.35676 4.41084C5.43416 4.48819 5.49556 4.58005 5.53745 4.68114C5.57934 4.78224 5.6009 4.8906 5.6009 5.00003C5.6009 5.10946 5.57934 5.21782 5.53745 5.31891C5.49556 5.42001 5.43416 5.51186 5.35676 5.58922L1.82161 9.12478C1.74432 9.20229 1.65249 9.26375 1.55137 9.30564C1.45026 9.34754 1.34186 9.36903 1.23242 9.3689Z"
                                fill="currentColor"></path>
                        </svg></span>
                    <a class="flex items-center text-sm" href="{{ URL::Current() }}">
                        <span class="inline-block mr-2">
                            <svg class="h-4 w-4 text-indigo-500" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.99992 10.8333H1.66659C1.44557 10.8333 1.23361 10.9211 1.07733 11.0774C0.921049 11.2337 0.833252 11.4457 0.833252 11.6667V18.3333C0.833252 18.5544 0.921049 18.7663 1.07733 18.9226C1.23361 19.0789 1.44557 19.1667 1.66659 19.1667H4.99992C5.22093 19.1667 5.43289 19.0789 5.58917 18.9226C5.74545 18.7663 5.83325 18.5544 5.83325 18.3333V11.6667C5.83325 11.4457 5.74545 11.2337 5.58917 11.0774C5.43289 10.9211 5.22093 10.8333 4.99992 10.8333ZM4.16658 17.5H2.49992V12.5H4.16658V17.5ZM18.3333 7.50001H14.9999C14.7789 7.50001 14.5669 7.5878 14.4107 7.74408C14.2544 7.90036 14.1666 8.11233 14.1666 8.33334V18.3333C14.1666 18.5544 14.2544 18.7663 14.4107 18.9226C14.5669 19.0789 14.7789 19.1667 14.9999 19.1667H18.3333C18.5543 19.1667 18.7662 19.0789 18.9225 18.9226C19.0788 18.7663 19.1666 18.5544 19.1666 18.3333V8.33334C19.1666 8.11233 19.0788 7.90036 18.9225 7.74408C18.7662 7.5878 18.5543 7.50001 18.3333 7.50001ZM17.4999 17.5H15.8333V9.16667H17.4999V17.5ZM11.6666 0.83334H8.33325C8.11224 0.83334 7.90028 0.921137 7.744 1.07742C7.58772 1.2337 7.49992 1.44566 7.49992 1.66667V18.3333C7.49992 18.5544 7.58772 18.7663 7.744 18.9226C7.90028 19.0789 8.11224 19.1667 8.33325 19.1667H11.6666C11.8876 19.1667 12.0996 19.0789 12.2558 18.9226C12.4121 18.7663 12.4999 18.5544 12.4999 18.3333V1.66667C12.4999 1.44566 12.4121 1.2337 12.2558 1.07742C12.0996 0.921137 11.8876 0.83334 11.6666 0.83334ZM10.8333 17.5H9.16658V2.50001H10.8333V17.5Z"
                                    fill="currentColor"></path>
                            </svg></span>
                        <span>{{ __('Menu') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-card>
        <div class="flex flex-wrap">
            <div class="w-1/4 p-4 ">
                <x-button type="button" wire:click="predefinedMenu" primary class="w-full flex justify-center"
                    wire:loading.attr="disabled">
                    {{ __('Add Predefined Menu') }}
                </x-button>
                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" :errors="$errors" />
                <div class="border border-gray-300 rounded-md shadow-sm py-2 w-full">
                    <form wire:submit.prevent="store" class="grid grid-cols gap-2 px-4">
                        <div class="w-full">
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                wire:model.lazy="name" />
                            <x-input-error :messages="$errors->get('menu.name')" for="name" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-label for="type" :value="__('Type')" />
                            <select id="type" class="block mt-1 w-full" name="type" wire:model.lazy="type">
                                <option value="">{{ __('Select Type') }}</option>
                                @foreach (\App\Enums\MenuType::cases() as $case)
                                    <option value="{{ $case->value }}"
                                        @if ($type === $case->value) selected @endif>
                                        {{ __($case->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('menu.type')" for="type" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-label for="placement" :value="__('Placement')" />
                            <select id="placement" class="block mt-1 w-full" name="placement"
                                wire:model.lazy="placement">
                                <option value="">{{ __('Select Placement') }}</option>
                                @foreach (\App\Enums\MenuPlacement::cases() as $case)
                                    <option value="{{ $case->value }}"
                                        @if ($placement === $case->value) selected @endif>
                                        {{ __($case->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('menu.placement')" for="placement" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-label for="label" :value="__('Label')" />
                            <x-input id="label" class="block mt-1 w-full" type="text" name="label"
                                wire:model.lazy="label" />
                            <x-input-error :messages="$errors->get('menu.label')" for="label" class="mt-2" />
                        </div>

                        <div class="w-full">
                            <x-label for="url" :value="__('URL')" />
                            <x-input id="url" class="block mt-1 w-full" type="text" name="url"
                                wire:model.lazy="url" />
                            <x-input-error :messages="$errors->get('menu.url')" for="url" class="mt-2" />
                        </div>

                        <div class="w-full">
                            <x-label for="parent_id" :value="__('Parent ID')" />
                            <select id="parent_id" class="block mt-1 w-full" name="parent_id"
                                wire:model.lazy="parent_id">
                                <option value="">None</option>
                                @foreach ($this->menus as $menuItem)
                                    <option value="{{ $menuItem['id'] }}">{{ $menuItem['name'] }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('menu.parent_id')" for="parent_id" class="mt-2" />
                        </div>

                        <div class="w-full">
                            <x-label for="new_window" :value="__('New Window')" />
                            <label class="flex items-center mt-2">
                                <input id="new_window" name="new_window" type="checkbox" class="form-checkbox"
                                    wire:model.lazy="new_window">
                                <span class="ml-2">{{ __('New Window') }}</span>
                            </label>
                            <x-input-error :messages="$errors->get('menu.new_window')" for="new_window" class="mt-2" />
                        </div>


                        <div class="w-full py-4">
                            <x-button primary type="submit" wire:loading.attr="disabled" class="w-full">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-3/4 p-4" x-data="{ sortable: null }" x-init="sortable = new Sortable($refs.menuList, {
                handle: '.drag-handle',
                animation: 150,
                onEnd: function(e) {
                    const items = Array.from(e.to.children);
                    const ids = items.map(item => item.dataset.id);
                    @this.updateMenuOrder(ids);
                }
            })">
                <div class="flex justify-center space-x-2 mb-4">
                    @foreach (\App\Enums\MenuPlacement::cases() as $case)
                        <x-button type="button" wire:click="filterByPlacement('{{ $case->value }}')"
                            :class="$placement === $case->value
                                ? 'bg-blue-500 text-white'
                                : 'bg-transparent text-blue-500 border border-blue-500'" outline>
                            {{ __($case->name) }}
                        </x-button>
                    @endforeach
                    <x-button type="button" wire:click="filterByPlacement('')"
                        class="bg-blue-500 text-white' : 'bg-transparent text-blue-500 border border-blue-500"
                        primary-outline>
                        Clear
                    </x-button>
                </div>
                <div class="border border-gray-200 rounded-md shadow-sm mb-2 p-2 w-full" x-ref="menuList">
                    @forelse($menus as $index => $menu)
                        <div class="border border-gray-300 rounded-md shadow-sm mb-2 p-2 w-full"
                            wire:loading.class.delay="opacity-50" wire:key="menu-{{ $index }}"
                            data-id="{{ $menu['id'] }}" x-data="{ isMenuOpen: false }">
                            <div class="flex justify-between ">
                                <div class="flex gap-4">
                                    <div class="drag-handle cursor-move">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </div>
                                    <button @click="isMenuOpen = !isMenuOpen">
                                        <i class="fa"
                                            :class="{
                                                'fa-caret-up': isMenuOpen,
                                                'fa-caret-down': !isMenuOpen
                                            }"
                                            aria-hidden="true">
                                        </i>
                                    </button>
                                </div>
                                <button @click="isMenuOpen = !isMenuOpen">
                                    <h3 class="text-center">{{ $menu['name'] }}</h3>
                                </button>
                                <button type="button" class="text-red-500 px-2"
                                    wire:click="delete({{ $menu['id'] }})" danger><i
                                        class="fas fa-trash-alt"></i></button>
                            </div>

                            <div x-show="isMenuOpen"
                                x-transition:enter="transition ease-out duration-300 transform origin-top"
                                x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                x-transition:leave="transition ease-in duration-200 opacity-0 transform origin-top"
                                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                x-transition:leave-end="-translate-y-4 scale-95">
                                <form wire:submit.prevent="update({{ $menu['id'] }})">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="w-full">
                                            <x-label for="name" :value="__('Name')" />
                                            <x-input id="name{{ $index }}" class="block mt-1 w-full"
                                                type="text" name="name"
                                                wire:model.lazy="menus.{{ $index }}.name" />
                                            <x-input-error :messages="$errors->get('menu.name')" for="name" class="mt-2" />
                                        </div>
                                        {{-- @dd($menu) --}}
                                        <div class="w-full">
                                            <x-label for="type" :value="__('Type')" />
                                            <select id="type{{ $index }}" class="block mt-1 w-full"
                                                name="type" wire:model.lazy="menus.{{ $index }}.type">
                                                <option value="">{{ __('Select Type') }}</option>
                                                @foreach (\App\Enums\MenuType::cases() as $case)
                                                    <option value="{{ $case->value }}"
                                                        @if ($menu['type'] === $case->value) selected @endif>
                                                        {{ __($case->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('menu.type')" for="type" class="mt-2" />
                                        </div>
                                        <div class="w-full">
                                            <x-label for="placement" :value="__('Placement')" />
                                            <select id="placement{{ $index }}" class="block mt-1 w-full"
                                                name="placement"
                                                wire:model.lazy="menus.{{ $index }}.placement">
                                                <option value="">{{ __('Select Placement') }}</option>
                                                @foreach (\App\Enums\MenuPlacement::cases() as $case)
                                                    <option value="{{ $case->value }}"
                                                        @if ($menu['placement'] === $case->value) selected @endif>
                                                        {{ __($case->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('menu.placement')" for="placement" class="mt-2" />
                                        </div>

                                        <div class="w-full">
                                            <x-label for="label" :value="__('Label')" />
                                            <x-input id="label{{ $index }}" class="block mt-1 w-full"
                                                type="text" name="label"
                                                wire:model.lazy="menus.{{ $index }}.label" />
                                            <x-input-error :messages="$errors->get('menu.label')" for="label" class="mt-2" />
                                        </div>

                                        <div class="relative w-full" x-data="{ isOpen: false }">
                                            <x-label for="url" :value="__('URL')" />
                                            <div class="relative">
                                                <x-input id="url" class="block mt-1 w-full" type="text"
                                                    name="url" wire:model.lazy="url" />
                                                <div
                                                    class="absolute right-0 top-0 h-full w-8 flex items-center justify-center">
                                                    <button @click="isOpen = !isOpen" type="button"
                                                        class="text-gray-500 focus:outline-none">
                                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
                                                x-transition:enter-start="opacity-0 transform scale-95"
                                                x-transition:enter-end="opacity-100 transform scale-100"
                                                x-transition:leave="transition ease-in duration-300"
                                                x-transition:leave-start="opacity-100 transform scale-100"
                                                x-transition:leave-end="opacity-0 transform scale-95"
                                                @click.away="isOpen = false"
                                                class="absolute w-full mt-2 bg-white shadow-lg rounded-md overflow-y-auto max-h-60 z-10">
                                                <ul>
                                                    @foreach ($links as $link)
                                                        <li>
                                                            <button
                                                                @click="isOpen = false; $refs.url.focus(); $refs.url.value = '{{ $link }}';
                                                            $wire.set('url', '{{ $link }}')"
                                                                type="button"
                                                                class="w-full px-4 py-2 hover:bg-gray-100 text-left">
                                                                {{ $link }}
                                                            </button>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <x-input-error :messages="$errors->get('menu.url')" for="url" class="mt-2" />
                                        </div>

                                        <div class="w-full">
                                            <x-label for="parent_id" :value="__('Parent ID')" />
                                            <select id="parent_id{{ $index }}" class="block mt-1 w-full"
                                                name="parent_id"
                                                wire:model.lazy="menus.{{ $index }}.parent_id">
                                                <option value="">None</option>
                                                @foreach ($this->menus as $menuItem)
                                                    <option value="{{ $menuItem['id'] }}"
                                                        @if ($menuItem['parent_id'] == $menuItem['id']) selected @endif>
                                                        {{ $menuItem['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('menu.parent_id')" for="parent_id" class="mt-2" />
                                        </div>

                                        <div class="w-full">
                                            <x-label for="new_window" :value="__('New Window')" />
                                            <label class="flex items-center mt-2">
                                                <input id="new_window{{ $index }}" name="new_window"
                                                    type="checkbox" class="form-checkbox"
                                                    wire:model.lazy="new_window">
                                                <span class="ml-2">{{ __('New Window') }}</span>
                                            </label>
                                            <x-input-error :messages="$errors->get('menu.new_window')" for="new_window" class="mt-2" />
                                        </div>
                                        <p class="float-right">
                                            <x-button type="button" wire:click="update({{ $menu['id'] }})"
                                                primary>
                                                {{ __('Edit') }}
                                            </x-button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">{{ __('No menus found') }}.</p>
                    @endforelse
                </div>
            </div>
    </x-card>
</div>
