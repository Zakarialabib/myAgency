
@props(['file', 'multiple' => false, 'single' => false, 'preview' => false])

<div x-data="{ isUploading: false, progress: 0 }">
    <label class="block mt-4 text-sm">
        <div
            class="w-full p-2 bg-gray-100 border border-zinc-300 border-dashed rounded"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
        >
            <input
                type="file"
                class="hidden"
                accept="{{ $rules ?? '' }}"
                @if ($multiple)
                    multiple
                @endif
                wire:model="{{ $attributes->wire('model')->value }}"
            />

            @if ($multiple && is_array($file))
                @foreach ($file as $tempFile)
                    <div class="flex items-center space-x-4 py-2">
                        <img src="{{ $tempFile->temporaryUrl() }}" class="w-20 h-20" />
                        <div class="font-light text-gray-500">
                            <p>Type: {{ Str::upper($tempFile->extension()) }}</p>
                            <p>Filename: {{ $tempFile->getClientOriginalName() }}</p>
                        </div>
                    </div>
                @endforeach
            @endif

            @if ($single && $file)
                <div class="flex items-center space-x-4">
                    <img src="{{ is_string($file) ? asset('images/services/' . $file) : $file->temporaryUrl() }}" class="w-20 h-20" />
                    <div class="font-light text-gray-500">
                        <p>Type: {{ is_string($file) ? 'Image' : Str::upper($file->extension()) }}</p>
                        <p>Filename: {{ is_string($file) ? $file : $file->getClientOriginalName() }}</p>
                    </div>
                </div>
            @endif

            <div
                class="relative leading-tight bg-white hover:bg-gray-100 cursor-pointer inline-flex items-center transition duration-500 ease-in-out group overflow-hidden border-2 w-full pl-3 pr-4 py-2 border-dashed"
                x-bind:class="{ 'opacity-50': isUploading }"
            >
                <p class="flex items-center text-sm font-light text-gray-400">
                    <i class="fa fa-upload w-6 h-6 p-1 mr-3 text-gray-500 border rounded-full shadow"></i>
                    {{ __('Upload a file or Image') }} | {{ $types ?? 'Any File' }}
                </p>
                <div x-show="isUploading">
                    <progress
                        max="100"
                        x-bind:value="progress"
                        class="w-full h-1 overflow-hidden bg-red-500 rounded"
                    ></progress>
                </div>
                <div
                    class="absolute inset-0 h-full flex items-center justify-center pointer-events-none"
                    x-bind:class="{ 'opacity-0': !isUploading, 'opacity-100': isUploading }"
                >
                    <i class="fa fa-spinner fa-spin w-6 h-6 text-gray-500"></i>
                </div>
            </div>
        </div>
        @error($attributes->wire('model')->value)
            <span class="mt-1 text-xs text-red-700">{{ $message }}</span>
        @enderror
    </label>
</div>
