<div>
    <p class="text-center">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </p>
    <form wire:submit="submit">
        <div class="grid gap-2 grid-cols-2 sm:grid-cols-1">
            <div>
                <x-input type="text" wire:model="name" id="name" name="name" placeholder="{{ __('Name') }}"
                    value="{{ old('name') }}" autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" for="name" class="mt-2" />
            </div>
            <div>
                <x-input type="email" wire:model="email" id="email" name="email"
                    placeholder="{{ __('Email') }}" value="{{ old('email') }}" autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" for="email" class="mt-2" />
            </div>
            <div>
                <x-input type="text" wire:model="phone_number" id="phone_number" name="phone_number"
                    placeholder="{{ __('Phone number') }}" value="{{ old('phone_number') }}" autocomplete="mobile" />
                <x-input-error :messages="$errors->get('phone_number')" for="phone_number" class="mt-2" />
            </div>
        </div>
        <p class="py-4">
            <textarea id="message" wire:model="message" name="message" placeholder="Message" value="{{ old('message') }}"
                rows="2"
                class="w-full h-56 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-6 transition-colors duration-200 ease-in-out"></textarea>
            <x-input-error :messages="$errors->get('message')" for="subject" class="mt-2" />
        </p>
        <button
            class="md:text-sm sm:text-xs bg-gradient-to-r from-green-400 to-green-600 text-white hover:text-green-100 hover:from-green-500 hover:to-green-700 active:from-green-600 active:to-green-800 focus:ring-green-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
            <span>
                <div wire:loading wire:target="submit">
                    <x-loading />
                </div>
                <span>{{ __('Send Message') }}</span>
            </span>
        </button>
    </form>
</div>
