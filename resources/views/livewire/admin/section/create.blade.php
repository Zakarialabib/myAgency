<div>
    <x-modal wire:model="createModal">
        <x-slot name="title">
            {{ __('Create Section') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="save">
                <div class="grid grid-cols-2 gap-4 px-2">


                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <x-input type="text" name="title" wire:model="title" placeholder="{{ __('Title') }}"
                            value="{{ old('title') }}" />
                        <x-input-error :messages="$errors->get('title')" for="title" class="mt-2" />
                    </div>
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="page" :value="__('Page')" />
                        <select wire:model="section.page"
                            class="p-3 leading-5 bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500  lang"
                            name="page">
                            <option value="" selected>{{ __('Select a Page') }}</option>
                            @foreach (\App\Enums\PageType::values() as $value => $name)
                                <option value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('section.page')" for="section.page" class="mt-2" />
                    </div>


                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="featured_title" :value="__('Featured title')" />
                        <input type="text" name="featured_title" wire:model="section.featured_title"
                            class="p-3 leading-5 bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                            placeholder="{{ __('Featured title') }}" value="{{ old('featured_title') }}">
                        <x-input-error :messages="$errors->get('section.featured_title')" for="section.featured_title" class="mt-2" />
                    </div>
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="subtitle" :value="__('Subtitle')" />
                        <input type="text" name="subtitle" wire:model="section.subtitle"
                            class="p-3 leading-5 bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                            placeholder="{{ __('Subtitle') }}" value="{{ old('subtitle') }}">
                        <x-input-error :messages="$errors->get('section.subtitle')" for="section.subtitle" class="mt-2" />
                    </div>

                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="bg_color" :value="__('Background color')" />
                        <input wire:model="section.bg_color" id="bg_color" type="color">
                        <x-input-error :messages="$errors->get('section.bg_color')" for="section.bg_color" class="mt-2" />
                    </div>
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="label" :value="__('Label')" />
                        <input wire:model="section.label" id="label" type="text">
                        <x-input-error :messages="$errors->get('section.label')" for="section.label" class="mt-2" />
                    </div>
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="link" :value="__('Link')" />
                        <input wire:model="section.link" id="link" type="url">
                        <x-input-error :messages="$errors->get('section.link')" for="section.link" class="mt-2" />
                    </div>
                </div>

                <div class="w-full px-2">
                    <x-label for="description" :value="__('Description')" />
                    <x-trix name="description" wire:model="description" class="mt-1" />
                    <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                </div>

                <div class="w-full px-2">
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
