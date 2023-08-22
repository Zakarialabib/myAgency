<div>
    <x-modal wire:model="createModal">
        <x-slot name="title">
            {{ __('Create Service') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form enctype="multipart/form-data" wire:submit="submit">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-label for="type" :value="__('Type')" />
                        <select wire:model="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                            <option value="" selected>{{ __('Type') }}</option>
                            <option value="digital">{{ __('Digital') }}</option>
                            <option value="learning">{{ __('Learning') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" for="type" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <input type="text" name="title" wire:model="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            placeholder="{{ __('Title') }}" value="{{ old('title') }}">
                        <x-input-error :messages="$errors->get('title')" for="title" class="mt-2" />
                    </div>
                </div>

                <div class="w-full">
                    <x-label for="content" :value="__('Description')" />
                    <x-trix name="createContent" wire:model="content" class="mt-1" />
                    <x-input-error :messages="$errors->get('content')" for="content" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-media-upload title="{{ __('Image') }}" name="image" wire:model="image" :file="$image"
                        single types="PNG / JPEG / WEBP" fileTypes="image/*" />
                </div>

                <div class="text-center py-4">
                    <x-button type="submit" primary>
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-modal>
</div>
