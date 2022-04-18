    <x-modal wire:model="show">

        <div class="flex justify-between items-center border-b p-2 text-md">
            <h6 class="text-md py-1/5 text-gray-900 font-100">{{ __('Word') }} {{$lang->value}} </h6>
            <button type="button" x-on:click="show = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <form wire:submit.prevent="Editwordmodal">

            <div class="modal-body">
                <div class="form-group ">
                    <label for="inputName" class="control-label font-weight-bold form-title"></label>

                    <input type="text" wire:model="value" class="form-control form-control-lg" name="value"
                        placeholder="@lang('Value')" value="">

                </div>
                <input type="hidden" name="key" wire:model="key">
            </div>
            <div class="flex flex-wrap p-4">
                <button
                    class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                    x-on:click="show = false">
                    {{ __('Go back') }}
                </button>
                <button
                    class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                    <span>
                        <div wire:loading wire:target="Editwordmodal">
                            <x-loading />
                        </div>
                        <span>{{ __('Save') }}</span>
                    </span>
                </button>
            </div>
        </form>
    </x-modal>
