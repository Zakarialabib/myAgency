<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="py-10">

        <div class="w-full row">
            <x-label for="language_id" :value="__('Language')" />
            <select
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 lang"
                wire:model="language_id" name="language_id">
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}" {{ $lang->is_default == '1' ? 'selected' : '' }}>
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('language_id'))
                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <x-label for="name" :value="__('Name')" />
            <input type="text" wire:model="name"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <p class="text-danger"> {{ $errors->first('name') }} </p>
            @endif
        </div>

        <div class="w-full row">
            <x-label for="serial_number" :value="__('Order')" />
            <input type="text" wire:model="serial_number"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="serial_number" placeholder="{{ __('Order') }}" value="{{ old('serial_number') }}">
            @if ($errors->has('serial_number'))
                <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
            @endif
        </div>

        <div class="w-full row">
            <x-label for="status" :value="__('Status')" />
            <select wire:model="status"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="status">
                <option value="0">{{ __('Unpublish') }}</option>
                <option value="1">{{ __('Publish') }}</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-danger"> {{ $errors->first('status') }} </p>
            @endif
        </div>

        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.bcategories.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-zinc300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
