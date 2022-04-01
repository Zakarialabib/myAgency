<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="py-10" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="w-full">
            <x-label for="language_id" :value="__('Language')" />
            <select wire:model="service.language_id"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500  lang"
                name="language_id">
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}" {{ $lang->is_default == '1' ? 'selected' : '' }}>
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="service.language_id" />
        </div>

        <div class="w-full">
            <x-label for="image" :value="__('Feature Image')" />
            <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
            <div class="custom-file">
                <label class="custom-file-label" for="image">{{ __('Choose Image') }}</label>
                <input type="file" class="custom-file-input up-img" name="image" id="image" wire:model="image">
            </div>
            <p class="help-block text-info">
                {{ __('Upload 670X418 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
            </p>
            <x-input-error for="service.image" />
        </div>
        <div class="w-full">
            <x-label for="title" :value="__('Title')" />
            <input type="text" name="title" wire:model="service.title"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                placeholder="{{ __('Title') }}" value="{{ old('title') }}">
            <x-input-error for="service.title" />
        </div>
        <div class="w-full">
            <x-label for="content" :value="__('Description')" />
            <textarea name="content" wire:model="service.content"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500  summernote"
                rows="3" placeholder="{{ __('Description') }}">{{ old('content') }}</textarea>
            <x-input-error for="service.content" />
        </div>
        <div class="w-full">
            <x-label for="status" :value="__('Status')" />
            <select wire:model="service.status" name="status"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 ">
                <option value="0">{{ __('Unpublish') }}</option>
                <option value="1">{{ __('Publish') }}</option>
            </select>
            <x-input-error for="service.status" />
        </div>
        <div class="w-full">

            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

        </div>
    </form>
</div>
