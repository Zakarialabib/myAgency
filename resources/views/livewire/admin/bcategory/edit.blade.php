<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="py-10">

        <div class="w-full row">
            <x-label for="language_id" :value="__('Language')" />
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lang"
                wire:model="bcategory.language_id" name="language_id">
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="w-full row">
            <x-label for="name" :value="__('Name')" />
            <input type="text" name="name" wire:model.lazy="bcategory.name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 placeholder="{{ __('Name') }}" value="{{ old('name') }}">
            <x-input-error for="bcategory.name" />
        </div>

        <div class="w-full row">
            <x-label for="status" :value="__('Status')" />
            <select name="status" wire:model="bcategory.status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="0">{{ __('Unpublish') }}</option>
                <option value="1">{{ __('Publish') }}</option>
            </select>
            <x-input-error for="bcategory.status" />
        </div>

        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 text-center">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.bcategories.index') }}"
                class="leading-4 md:text-sm sm:text-xs bg-gray-400 text-black hover:text-blue-800 hover:bg-gray-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
