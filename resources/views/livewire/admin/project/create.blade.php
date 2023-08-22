<div>
    <!-- Create Modal -->
    <x-modal wire:model="createModal">
        <x-slot name="title">
            {{ __('Create Project') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="submit" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">

                    <div class="">
                        <x-label for="title" :value="__('Title')" />
                        <x-input type="text" wire:model="title" name="title" placeholder="{{ __('Title') }}" />
                        <x-input-error :messages="$errors->get('title')" for="title" class="mt-2" />
                    </div>
                    <div class="">
                        <x-label for="client_name" :value="__('Client Name')" />
                        <x-input type="text" wire:model="client_name" name="client_name"
                            placeholder="{{ __('Client Name') }}" />
                        <x-input-error :messages="$errors->get('client_name')" for="client_name" class="mt-2" />
                    </div>

                    <div class="">
                        <x-label for="service_id" :value="__('Category')" />
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required id="service_id" name="service_id" wire:model="service_id">
                            <option value="" selected>{{ __('Select a Service') }}</option>
                            @foreach ($this->services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('service_id')" for="service_id" class="mt-2" />
                    </div>

                    <div class="">
                        <x-label for="link" :value="__('Link')" />
                        <x-input type="text" wire:model="link" name="link" placeholder="{{ __('Live Link') }}" />
                        <x-input-error :messages="$errors->get('link')" for="link" class="mt-2" />
                    </div>
                </div>
                <div class="w-full">
                    <x-label for="content" :value="__('Content')" />
                    <x-trix name="content" wire:model="content" class="mt-1" />
                    <x-input-error :messages="$errors->get('content')" for="content" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-media-upload title="{{ __('Image') }}" name="image" wire:model="image" :file="$image"
                        single types="PNG / JPEG / WEBP" fileTypes="image/*" />

                </div>
                <div class="w-full">
                    <x-media-upload title="{{ __('Gallery') }}" name="gallery" wire:model="gallery" :file="$gallery"
                        multiple types="PNG / JPEG / WEBP" fileTypes="image/*" />
                </div>

                <div class="w-full">
                    <x-label for="meta_title" :value="__('Meta Keywords')" />
                    <x-input type="text" wire:model="meta_title" name="meta_title"
                        placeholder="{{ __('Meta Keywords') }}" />
                    <x-input-error :messages="$errors->get('meta_title')" for="meta_title" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-label for="meta_description" :value="__('Meta Description')" />
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model="meta_description" name="meta_description" placeholder="{{ __('Meta Description') }}" rows="4">{{ old('meta_description') }}</textarea>
                    <x-input-error :messages="$errors->get('meta_description')" for="meta_description" class="mt-2" />
                </div>

                <div class="w-full text-center py-4">
                    <x-button type="submit" primary>
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-modal>
</div>
