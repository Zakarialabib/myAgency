<div>
    <x-modal wire:model="editModal">
        <x-slot name="title">
            {{ __('Edit Section') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="update">
                <div class="grid grid-cols-2 gap-4 px-2">
                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <x-input type="text" name="title" wire:model="title" placeholder="{{ __('Title') }}"
                            value="{{ old('title') }}" />
                        <x-input-error :messages="$errors->get('title')" for="title" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="page" :value="__('Page')" />
                        <select wire:model="page"
                            class="p-3 leading-5 bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500  lang"
                            name="page">
                            <option value="" selected>{{ __('Select a Page') }}</option>
                            @foreach (\App\Enums\PageType::values() as $value => $name)
                                <option value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('page')" for="page" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="featured_title" :value="__('Featured title')" />
                        <input type="text" name="featured_title" wire:model="featured_title"
                            class="p-3 leading-5 bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                            placeholder="{{ __('Featured title') }}" value="{{ old('featured_title') }}">
                        <x-input-error :messages="$errors->get('featured_title')" for="featured_title" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="subtitle" :value="__('Subtitle')" />
                        <input type="text" name="subtitle" wire:model="subtitle"
                            class="p-3 leading-5 bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                            placeholder="{{ __('Subtitle') }}" value="{{ old('subtitle') }}">
                        <x-input-error :messages="$errors->get('subtitle')" for="subtitle" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="bg_color" :value="__('Background color')" />
                        <input wire:model="bg_color" id="bg_color" type="color">
                        <x-input-error :messages="$errors->get('bg_color')" for="bg_color" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="label" :value="__('Label')" />
                        <x-input wire:model="label" id="label" type="text" />
                        <x-input-error :messages="$errors->get('label')" for="label" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="link" :value="__('Link')" />
                        <x-input wire:model="link" id="link" type="url" />
                        <x-input-error :messages="$errors->get('link')" for="link" class="mt-2" />
                    </div>
                </div>
                <div class="w-full px-2">
                    <x-label for="description" :value="__('Description')" />
                    <x-trix name="description" wire:model="description" class="mt-1" />
                    <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                </div>
                <div class="grid grid-cols-2 gap-4 py-10 px-2">
                    <div class="w-full">
                        <img class="w-52 rounded-full" src="{{ asset('uploads/sections/' . $image) }}" alt="">
                    </div>
                    <div class="w-full">
                        <x-media-upload title="{{ __('Image') }}" name="image" wire:model="image"
                            :file="$image" single types="PNG / JPEG / WEBP" fileTypes="image/*" />
                    </div>
                </div>
                <div class="w-full text-center py-4">
                    <x-button type="submit" primary class="w-full text-center">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-modal>

</div>
