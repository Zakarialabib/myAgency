<div>
    <!-- Create Modal -->
    <x-modal wire:model="createModal">
        <x-slot name="title">
            {{ __('Create Blog Category') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="create">
                <div class="grid grid-cols-2 sm:grid-cols-1 gap-4">
                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" wire:model="title" />
                        <x-input-error :messages="$errors->get('title')" for="title" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="meta_title" :value="__('Meta Title')" />
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

                    <div class="col-span-full">
                        <x-label for="description" :value="__('Description')" />
                        <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                            wire:model="description" />
                        <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                    </div>
                </div>

                <div class="w-full py-4 px-é">
                    <x-button primary type="submit" wire:loading.attr="disabled" class="w-full">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-modal>
    <!-- End Create Modal -->
</div>
