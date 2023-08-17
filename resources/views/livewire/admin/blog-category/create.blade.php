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
                <div class="flex flex-wrap space-y-2 px-2">
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                            wire:model="blogcategory.title" />
                        <x-input-error :messages="$errors->get('blogcategory.title')" for="blogcategory.title" class="mt-2" />
                    </div>
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="language_id" :value="__('Language')" required />
                        <select name="blogcategory.language_id" id="blogcategory.language_id" wire:model="blogcategory.language_id"
                        class="block bg-white text-gray-700 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500">
                        <option value="">{{ __('Select Language') }}</option>
                        @foreach ($this->languages as $index => $lang)
                            <option value="{{ $index }}">{{ $lang }}</option>
                        @endforeach
                    </select>
                        <x-input-error :messages="$errors->get('blogcategory.language_id')" for="blogcategory.language_id" class="mt-2" />
                    </div>

                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="meta_title" :value="__('Meta Title')" />
                        <x-input id="meta_title" class="block mt-1 w-full" type="text" name="meta_title"
                            wire:model="blogcategory.meta_title" />
                        <x-input-error :messages="$errors->get('blogcategory.meta_title')" for="blogcategory.meta_title" class="mt-2" />
                    </div>
                    <div class="lg:w-1/2 sm:w-full px-2">
                        <x-label for="meta_description" :value="__('Meta Description')" />
                        <x-input id="meta_description" class="block mt-1 w-full" type="text" name="meta_description"
                            wire:model="blogcategory.meta_description" />
                        <x-input-error :messages="$errors->get('blogcategory.meta_description')" for="blogcategory.meta_description" class="mt-2" />
                    </div>
                    <div class="w-full px-2">
                        <x-label for="description" :value="__('Description')" />
                        <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                            wire:model="blogcategory.description" />
                        <x-input-error :messages="$errors->get('blogcategory.description')" for="blogcategory.description" class="mt-2" />
                    </div>
                </div>

                <div class="w-full py-4 px-3">
                    <x-button primary type="submit" wire:loading.attr="disabled" class="w-full">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-modal>
    <!-- End Create Modal -->
</div>
