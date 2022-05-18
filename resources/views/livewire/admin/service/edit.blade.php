<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="py-10" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="w-full">
            <x-label for="language_id" :value="__('Language')" />
            <select wire:model="service.language_id"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500  lang"
                name="language_id">
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="service.language_id" />
        </div>
        <div class="w-full">
            <x-label for="title" :value="__('Title')" />
            <input type="text" name="title" wire:model.lazy="service.title"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                placeholder="{{ __('Title') }}" value="{{ old('title') }}">
            <x-input-error for="service.title" />
        </div>
        <div class="w-full">
            <x-label for="content" :value="__('Description')" />
            <x-input.rich-text wire:model.lazy="service.content" id="description" />
            <x-input-error for="service.content" />
        </div>
        <div class="flex flex-wrap py-10">
            <div class="w-2/5">
                <img class="w-52 rounded-full" src="{{ asset('uploads/services/'.$service->image) }}" alt="">
            </div>
            <div class="w-3/5">
                <x-label for="image" :value="__('Feature Image')" />
                <x-fileupload wire:model="image" :file="$image" accept="image/jpg,image/jpeg,image/png" />
                <p class="help-block text-info">
                    {{ __('Upload 670X418 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
                </p>
                <x-input-error for="service.image" />
            </div>
            <div class="container">
                <label class="inline-flex items-center cursor-pointer">
                    <x-checkbox name="status" id="status" wire:model="service.status"> {{ __('Active') }}</x-checkbox>
                    <x-input-error for="service.status" />
                    <span class="ml-2 text-sm font-semibold text-gray-700">{{ __('Publication Status') }}</span>
                </label>
            </div>
        </div>
        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 text-center">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.services.index') }}"
                class="leading-4 md:text-sm sm:text-xs bg-gray-400 text-black hover:text-blue-800 hover:bg-gray-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>

@push('scripts')
     <!-- Image Upload -->
     <script type="text/javascript"  src="{{ asset('js/image-upload.js') }}"></script>
@endpush