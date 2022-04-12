<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="py-10">
        <div class="w-full">
            <x-label for="language_id" :value="__('Language')" />
            <select wire:model="portfolio.language_id"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 lang"
                name="language_id">
                <option value="" selected>{{ __('Select a Language') }}</option>
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                @endforeach
            </select>
            <x-input-error for="portfolio.language_id" />
        </div>



        <div class="w-full flex flex-wrap">
            <div class="w-1/2 lg:w-1/2 sm:w-full">
            <x-label for="title" :value="__('Title')" />
            <input type="text" wire:model="portfolio.title"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="title" placeholder="{{ __('Title') }}">
            <x-input-error for="portfolio.title" />
        </div>
        <div class="w-1/2 lg:w-1/2 sm:w-full">
            <x-label for="client_name" :value="__('Client Name')" />
            <input type="text" wire:model="portfolio.client_name"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="client_name" placeholder="{{ __('Client Name') }}">
            <x-input-error for="portfolio.client_name" />
        </div>
    </div>
        <div class="w-full">
            <x-label for="service_id" :value="__('Category')" />
            <x-select-list
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                required id="service_id" name="service_id" wire:model="portfolio.service_id" :options="$this->listsForFields['services']" />
            </select>
            <x-input-error for="portfolio.service_id" />
        </div>

        <div class="w-full">
            <x-label for="link" :value="__('Link')" />
            <input type="text" wire:model="portfolio.link" name="link" placeholder="{{ __('Live Link') }}"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500">
            <x-input-error for="portfolio.link" />
        </div>
        <div class="w-full">
            <x-label for="status" :value="__('Status')" />
            <select wire:model="portfolio.status"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="status">
                <option value="0">{{ __('In Progress') }}</option>
                <option value="1" selected>{{ __('Completed') }}</option>
            </select>
            <x-input-error for="portfolio.status" />
        </div>

        <div class="w-full">
            <x-label for="content" :value="__('Description')" />
            <x-input.rich-text wire:model.lazy="portfolio.content" id="description" />
            <x-input-error for="portfolio.content" />
        </div>
        <div class="w-full">
           
                <x-label for="image" :value="__('Gallery')" />
                <x-fileupload wire:model="images" multiple :file="$images" profileClass="w-20 h-20 rounded-full" accept="image/jpg,image/jpeg,image/png" />
                <x-input-error for="images" />
                <p class="help-block text-info">
                    {{ __('Upload 710X400 (Pixel) Size image for best quality.                                                                                                                                                                                                           Only jpg, jpeg, png image is allowed.') }}
                </p>

        </div>
        <div class="w-full flex flex-wrap">
            <div class="w-1/2 lg:w-1/2 sm:w-full">
                <img class="w-80" src="{{ asset('uploads/portfolios/' . $portfolio->featured_image) }}" alt="">
            </div>
            <div class="w-1/2 lg:w-1/2 sm:w-full">
                <x-label for="featured_image" :value="__('Featured Image')" />
                <x-fileupload wire:model="featured_image" :file="$featured_image" accept="image/jpg,image/jpeg,image/png" />
                <x-input-error for="featured_image" />
                <p class="help-block text-info">
                    {{ __('Upload 710X400 (Pixel) Size image for best quality.                                                                                                                                                                                                  Only jpg, jpeg, png image is allowed.') }}
                </p>
            </div>
        </div>

        <div class="w-full">
            <x-label for="meta_keywords" :value="__('Meta Keywords')" />
            <input type="text" wire:model="portfolio.meta_keywords"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                data-role="tagsinput" name="meta_keywords" placeholder="{{ __('Meta Keywords') }}">
            <x-input-error for="portfolio.meta_keywords" />
        </div>
        <div class="w-full">
            <x-label for="meta_description" :value="__('Meta Description')" />
            <textarea class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                wire:model="portfolio.meta_description" name="meta_description"
                placeholder="{{ __('Meta Description') }}" rows="4">{{ old('meta_description') }}</textarea>
            <x-input-error for="portfolio.meta_description" />
        </div>
        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.portfolios.index') }}"
                class="leading-4 md:text-sm sm:text-xs bg-gray-400 text-black hover:text-blue-800 hover:bg-gray-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
