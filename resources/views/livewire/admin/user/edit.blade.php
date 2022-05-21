<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
        <div class="flex flex-wrap mb-4">
            <div class="lg:w-1/3 px-2 sm:w-full {{ $errors->has('user.name') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="name">{{ __('Name') }}</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="text" name="name" id="name" required wire:model.defer="user.name">
                <x-input-error for="user.name" />
            </div>
            <div class="lg:w-1/3 px-2 sm:w-full {{ $errors->has('user.email') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="email">{{ __('Email') }}</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="email" name="email" id="email" required wire:model.defer="user.email">
                <x-input-error for="user.email" />
            </div>
        </div>

        <div class="mb-4 {{ $errors->has('user.password') ? 'is-invalid' : '' }}">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="password" name="password" id="password" wire:model.defer="password">
            <x-input-error for="user.password" />
        </div>

        <div class="mb-4 {{ $errors->has('roles') ? 'is-invalid' : '' }}">
            <label class="form-label required" for="roles">{{ __('Roles') }}</label>
            <x-select-list
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']"
                multiple />
            <x-input-error for="roles" />
        </div>

        <div class="float-right p-2 mb-4">
            <button
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 text-center"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.users.index') }}"
                class="leading-4 md:text-sm sm:text-xs bg-gray-400 text-black hover:text-blue-800 hover:bg-gray-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Go back') }}
            </a>
        </div>
    </form>

   

</div>
