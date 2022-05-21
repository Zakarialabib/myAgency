<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="py-10" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="w-full">
            <x-label for="language_id" :value="__('Language')" />
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 lang"
                wire:model="blog.language_id" name="language_id">
                <option value="" selected disabled>{{ __('Select a Language') }}</option>
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <x-label for="title" :value="__('Title')" />
            <input type="text" wire:model.lazy="blog.title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="title" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
            <x-input-error for="blog.title" />
        </div>
        <div class="w-full">
            <x-label for="bcategory_id" :value="__('Category')" />
            <x-select-list
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required id="bcategory_id" name="bcategory_id" wire:model="blog.bcategory_id" :options="$this->listsForFields['bcategories']" />
            <x-input-error for="blog.bcategory_id" />
        </div>
        <div class="w-full">
            <x-label for="content" :value="__('Content')" />
            <x-input.rich-text wire:model.lazy="blog.content" id="description" />
            <x-input-error for="blog.content" />
        </div>
        <div class="w-full">
            <x-label for="meta_keywords" :value="__('Meta Keywords')" />
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                data-role="tagsinput" name="meta_keywords" wire:model.lazy="blog.meta_keywords"
                placeholder="{{ __('Meta Keywords') }}" value="{{ old('meta_keywords') }}">
            <x-input-error for="blog.meta_keywords" />
        </div>
        <div class="w-full">
            <x-label for="meta_description" :value="__('Meta Description')" />
            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="meta_description" wire:model.lazy="blog.meta_description" placeholder="{{ __('Meta Description') }}"
                rows="4">{{ old('meta_description') }}</textarea>
            <x-input-error for="blog.meta_description" />
        </div>
        <div class="w-full">
            <x-label for="image" :value="__('Image')" />
            <x-fileupload wire:model="image" :file="$image" accept="image/jpg,image/jpeg,image/png" />
            <x-input-error for="image" />
            <p class="help-block text-info">
                {{ __('Upload 730X455 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
            </p>
        </div>
        <div class="w-full">
            <x-label for="status" :value="__('Status')" />
            <select wire:model="blog.status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="status">
                <option value="0" selected>{{ __('Unpublish') }}</option>
                <option value="1">{{ __('Publish') }}</option>
            </select>
            <x-input-error for="blog.status" />
        </div>

        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 text-center">{{ __('Save') }}</button>
        </div>
    </form>
</div>

@push('scripts')
     <!-- Image Upload -->
     <script type="text/javascript"  src="{{ asset('js/image-upload.js') }}"></script>
@endpush