<div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <x-table>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th>{{ __('Language') }}</x-table.th>
            <x-table.th>{{ __('Status') }}</x-table.th>
            <x-table.th>{{ __('Default') }}</x-table.th>
            <x-table.th>{{ __('Actions') }}</x-table.th>
        </x-slot>
        <x-table.tbody>
            @if (!empty($languages))

                @foreach ($languages as $language)
                    <x-table.tr >
                        <x-table.td>#</x-table.td>
                        <x-table.td>{{ $language['name'] }}</x-table.td>
                        <x-table.td>
                            <span
                            class="badge text-white bg-{{ $language['is_active'] == true ? 'green-500' : 'red-500' }}">
                            {{ $language['is_active'] == true ? __('Active') : __('Inactive') }}
                            </span>
                        </x-table.td>
                        <x-table.td>
                            <span
                            class="badge text-white bg-{{ $language['is_default'] == true ? 'green-500' : 'yellow-500' }}">
                            {{ $language['is_default'] == true ? __('Yes') : __('No') }}
                            </span>
                        </x-table.td>
                        <x-table.td>
                            @if ($language['is_default'] == false)
                                <a class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer bg-green-500 text-white"
                                    title="{{ __('Set as Default') }}"
                                    wire:click="onSetDefault( {{ $language['id'] }} )">{{ __('Set as Default') }}</a>
                            @endif
                            <button class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300" type="button"
                            wire:click="confirm('delete', {{ $language['id'] }})" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                            </button>
                            <a class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300"
                                    wire:click="sync({{ $language['id'] }})">
                                    {{ __('Sync') }}
                            </a>
                        </x-table.td>
                    </x-table.tr>
                @endforeach

            @else

                <x-table.tr>
                    <x-table.td class="">{{ __('No record found') }}</x-table.td>
                </x-table.tr>

            @endif

        </x-table.tbody>
    </x-table>

    <!-- Begin::Add New Language -->

    {{-- <livewire:admin.translations.add-new-language /> --}}

    <!-- End::Add New Language -->
    
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
            if (!confirm("{{ __('Are you sure') }}")) {
                return
            }
            @this[e.callback](...e.argv)
        })
    </script>
@endpush
