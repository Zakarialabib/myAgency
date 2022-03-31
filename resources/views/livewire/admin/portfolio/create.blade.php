<div>
    <form wire:submit.prevent="submit" class="py-10">
        <div class="w-full row">
            <x-label for="language_id" :value="__('Language')" />
            <select
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 lang"
                name="language_id" id="portfolio_lan">
                <option value="" selected disabled>Select a Language</option>
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('language_id'))
                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
            @endif
        </div>

        <div class="w-full row">
            <x-label for="image" :value="__('Slider Image')" />
            <div class="custom-file h80 drop-img">
                <label class="custom-file-label h80 " for="image">
                    <h5 class="text-center">
                        {{ __('Drop Or Select multiple image at a time') }}</h5>
                </label>
                <input type="file" multiple class="custom-file-input h80" name="image[]" id="image">
            </div>
            @if ($errors->has('image'))
                <p class="text-danger"> {{ $errors->first('image') }} </p>
            @endif
            <p class="help-block text-info">
                {{ __('Upload 710X400 (Pixel) Size image for best quality.                                                                                                                                                                                                           Only jpg, jpeg, png image is allowed.') }}
            </p>
        </div>
        <div class="w-full">
            <x-label for="featured_image" :value="__('Featured Image')" />
            <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
            <div class="custom-file">
                <label class="custom-file-label" for="featured_image">{{ __('Choose Image') }}</label>
                <input type="file" class="custom-file-input up-img" name="featured_image" id="featured_image">
            </div>
            @if ($errors->has('featured_image'))
                <p class="text-danger"> {{ $errors->first('featured_image') }} </p>
            @endif
            <p class="help-block text-info">
                {{ __('Upload 710X400 (Pixel) Size image for best quality.                                                                                                                                                                                                  Only jpg, jpeg, png image is allowed.') }}
            </p>
        </div>

        <div class="w-full">
            <x-label for="title" :value="__('Title')" />
            <input type="text"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="title" placeholder="Title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <p class="text-danger"> {{ $errors->first('title') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="client_name" :value="__('Client Name')" />
            <input type="text"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="client_name" placeholder="Client Name" value="{{ old('client_name') }}">
            @if ($errors->has('client_name'))
                <p class="text-danger"> {{ $errors->first('client_name') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="service_id" :value="__('Category')" />
            <select
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="service_id" id="bcategory_id">
            </select>
            @if ($errors->has('service_id'))
                <p class="text-danger"> {{ $errors->first('service_id') }} </p>
            @endif
        </div>

        <div class="w-full">
            <x-label for="link" :value="__('Link')" />
            <input type="text"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="link" placeholder="Live Link" value="{{ old('link') }}">
            @if ($errors->has('link'))
                <p class="text-danger"> {{ $errors->first('link') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="status" :value="__('Status')" />
            <select
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="status">
                <option value="0">{{ __('In Progress') }}</option>
                <option value="1" selected>{{ __('Completed') }}</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-danger"> {{ $errors->first('status') }} </p>
            @endif
        </div>

        <div class="w-full">
            <x-label for="content" :value="__('Description')" />
            <textarea name="content"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 summernote"
                rows="4" placeholder="{{ __('Description') }}">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <p class="text-danger"> {{ $errors->first('content') }} </p>
            @endif
        </div>

        <div class="w-full">
            <x-label for="meta_keywords" :value="__('Meta Keywords')" />
            <input type="text"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                data-role="tagsinput" name="meta_keywords" placeholder="{{ __('Meta Keywords') }}"
                value="{{ old('meta_keywords') }}">
            @if ($errors->has('meta_keywords'))
                <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="meta_description" :value="__('Meta Description')" />
            <textarea class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="meta_description" placeholder="{{ __('Meta Description') }}"
                rows="4">{{ old('meta_description') }}</textarea>
            @if ($errors->has('meta_description'))
                <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
            @endif
        </div>
        <div class="w-full">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
    </form>
</div>
