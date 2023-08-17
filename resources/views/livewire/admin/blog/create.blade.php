<div>
    <!-- Create Modal -->
    <x-modal wire:model="createModal">
        <x-slot name="title">
            {{ __('Create Blog') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="create">
                <div class="grid grid-cols-2 gap-4 px-2">
                    <div>
                        <x-label for="title" :value="__('Name')" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" wire:model="title" />
                        <x-input-error :messages="$errors->get('title')" for="title" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="slug" :value="__('Slug')" />
                        <x-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                            wire:model="slug" />
                        <x-input-error :messages="$errors->get('slug')" for="slug" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="category_id" :value="__('Category')" required />
                        <select name="category_id" id="category_id" wire:model="category_id"
                            class="block bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500">
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach ($this->blog_categories as $index => $category)
                                <option value="{{ $index }}">{{ $category }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" for="category_id" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="meta_title" :value="__('Meta title')" />
                        <x-input id="meta_title" class="block mt-1 w-full" type="text" name="meta_title"
                            wire:model="meta_title" />
                        <x-input-error :messages="$errors->get('meta_title')" for="meta_title" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="meta_description" :value="__('Meta Description')" />
                        <x-input id="meta_description" class="block mt-1 w-full" type="text" name="meta_description"
                            wire:model="meta_description" />
                        <x-input-error :messages="$errors->get('meta_description')" for="meta_description" class="mt-2" />
                    </div>
                </div>

                <div class="w-full px-3 mb-4">
                    <x-label for="description" :value="__('Description')" required />
                    <x-trix name="description" wire:model="description" class="mt-1" />
                    <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                </div>

                <div class="w-full py-2 px-3">
                    <x-media-upload title="{{ __('Image') }}" name="image" wire:model="image" :file="$image"
                        single types="PNG / JPEG / WEBP" fileTypes="image/*" />
                </div>

                <div class="text-center py-4">
                    <x-button primary type="submit" class="w-full" wire:loading.attr="disabled">
                        {{ __('Create') }}
                    </x-button>
                </div>

            </form>
        </x-slot>
    </x-modal>
    <!-- End Create Modal -->
</div>
