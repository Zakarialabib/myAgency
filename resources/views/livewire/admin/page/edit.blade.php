<div>
    <!-- Edit Modal -->
    <x-modal wire:model="editModal">
        <x-slot name="title">
            {{ __('Edit Page') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form wire:submit="update">
                <div class="flex flex-wrap px-4">

                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="title" :value="__('Title')" />
                        <x-input wire:model="title" type="text" />
                        <x-input-error :messages="$errors->get('title')" for="title" class="mt-2" />
                    </div>
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="slug" :value="__('Slug')" />
                        <x-input wire:model="slug" type="text" disabled name="slug" />
                    </div>
                    <div class="w-full px-2">
                        <x-label for="description" :value="__('description')" />
                        <x-trix name="description" wire:model="description" class="mt-1" />
                        <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                    </div>

                    <div class="xl:w-1/2 md:w-1/2 px-3">
                        <x-label for="meta_title" :value="__('Meta title')" />
                        <x-input id="meta_title" class="block mt-1 w-full" type="text" name="meta_title"
                            wire:model="meta_title" />
                        <x-input-error :messages="$errors->get('meta_title')" for="meta_title" class="mt-2" />
                    </div>
                    <div class="xl:w-1/2 md:w-1/2 px-3">
                        <x-label for="meta_description" :value="__('Meta description')" />
                        <x-input id="meta_description" class="block mt-1 w-full" type="text" name="meta_description"
                            wire:model="meta_description" />
                        <x-input-error :messages="$errors->get('meta_description')" for="meta_description" class="mt-2" />
                    </div>
                    <div class="w-full py-2 px-3">
                        <x-media-upload title="{{ __('Image') }}" name="image" wire:model="image" :file="$image"
                            single types="PNG / JPEG / WEBP" fileTypes="image/*" />
                    </div>

                    <div class="text-center py-4">
                        <x-button primary type="submit" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-modal>
    <!-- End Edit Modal -->
</div>
