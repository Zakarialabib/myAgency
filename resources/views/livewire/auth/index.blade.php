<div>
    <a href="/" class="flex justify-center">
        <x-application-logo class="h-20 text-gray-500" />
    </a>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 py-10 px-5 my-auto" x-data="{ isTab: 'login' }">
            <div class="flex mb-6">
                <button type="button"
                    class="w-1/2 py-2 px-6 text-center text-black hover:bg-blue-600 hover:text-white rounded shadow-md"
                    :class="{ 'bg-blue-600 text-white': isTab === 'login' }" @click="isTab = 'login'">
                    {{ __('Login') }}
                </button>
                <button type="button"
                    class="w-1/2 py-2 px-6 text-center text-black hover:bg-blue-600 hover:text-white rounded shadow-md"
                    :class="{ 'bg-blue-600 text-white': isTab === 'register' }" @click="isTab = 'register'">
                    {{ __('Register') }}
                </button>
            </div>
            <div x-show="isTab === 'login'">
                <h1 class="mb-8 text-4xl md:text-5xl font-bold text-center font-heading">
                    {{ __('Login to your account') }}
                </h1>
                @livewire('auth.login')
            </div>
            <div x-show="isTab === 'register'">
                <h1 class="mb-8 text-4xl md:text-5xl font-bold text-center font-heading">
                    {{ __('Register') }}
                </h1>
                @livewire('auth.register')
            </div>
        </div>

        <div class="lg:w-1/2 sm:w-full relative pb-full md:flex md:pb-0">
            <div style="background-image: url(https://picsum.photos/seed/picsum/1920/1080);"
                class="absolute pin bg-no-repeat md:bg-left w-full h-full bg-center bg-cover"></div>
        </div>
    </div>
</div>
