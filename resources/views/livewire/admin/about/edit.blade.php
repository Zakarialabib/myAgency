<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="py-10" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="w-full">
            <x-label for="language_id" :value="__('Language')" />
            <select wire:model="about.language_id"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500  lang"
                name="language_id">
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="about.language_id" />
        </div>
        <div class="w-full">
            <x-label for="title" :value="__('Title')" />
            <input type="text" name="title" wire:model.lazy="about.title"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                placeholder="{{ __('Title') }}" value="{{ old('title') }}">
            <x-input-error for="about.title" />
        </div>
        <div class="w-full">
            <x-label for="content" :value="__('Description')" />
            <x-input.rich-text wire:model.lazy="about.content" id="description" />
            <x-input-error for="about.content" />
        </div>

        @foreach($inputs as $key => $input)
        <div class="mt-12">
            <div class="w-full">
                <x-label for="inputs_{{$key}}_block_title" :value="__('Block title')" />
                <input  wire:model="inputs.{{ $key }}.block_title" type="text" 
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "/>               
                @error('inputs.'.$key.'.block_title') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="w-full">
                <x-label for="inputs_{{$key}}_block_content" :value="__('Block content')" />
                <input  wire:model="inputs.{{ $key }}.block_content" type="text" 
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "/>               
                @error('inputs.'.$key.'.block_content') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>
            @if($key > 0)
            <div wire:click="removeInput({{$key}})" class="flex items-center justify-end text-red-600 text-sm w-full cursor-pointer">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <p>Remove Input</p>
            </div>
            @endif
        </div>
        @endforeach
    
        <div wire:click="addInput" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
            <p class="ml-2">Add New Input</p>
        </div>

        <div class="flex flex-wrap py-10">
            <div class="w-2/5">
                <img class="w-52 rounded-full" src="{{ asset('uploads/abouts/'.$about->image) }}" alt="">
            </div>
            <div class="w-3/5">
                <x-label for="image" :value="__('Feature Image')" />
                <x-fileupload wire:model="image" :file="$image" accept="image/jpg,image/jpeg,image/png" />
                <p class="help-block text-info">
                    {{ __('Upload 670X418 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
                </p>
                <x-input-error for="about.image" />
            </div>
            <div class="container">
                <label class="inline-flex items-center cursor-pointer">
                    <x-checkbox name="status" id="status" wire:model="about.status"> {{ __('Active') }}</x-checkbox>
                    <x-input-error for="about.status" />
                    <span class="ml-2 text-sm font-semibold text-gray-700">{{ __('Publication Status') }}</span>
                </label>
            </div>
        </div>
        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.about.index') }}"
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