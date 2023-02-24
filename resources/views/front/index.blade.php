<x-guest-layout>
    {{-- @section('title', $section->title)
        @section('meta-keywords', $section->title)
        @section('meta-description', Str::limit($section->content, 50, '...')) --}}
    @section('title', __('Home'))

    <div class="bg-green-100 dark:bg-slate-800">
        <section class="bg-orange-400 dark:bg-slate-800 max-w-full">
            <div class="items-center w-full px-10 py-12 mx-auto md:px-12 lg:px-24">
                <div class="flex flex-wrap items-center mx-auto">
                    <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl sm:flex sm:justify-center">
                        <div>
                            <div class="w-full max-w-lg">
                                @if ($section->image)
                                    <div>
                                        <img src="{{ asset('uploads/sections/' . $section->image) }}"
                                            class="object-cover object-center mx-auto rounded-lg shadow-xl"
                                            alt="{{ $section->title }}" lazy />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center lg:flex-grow lg:w-1/2 md:flex-grow px-5 md:w-full pb-5 sm:w-full xl:mt-0">
                        @if (empty($section))
                            <h1
                                class="text-4xl tracking-tight font-extrabold text-white dark:text-white sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                                <span class="block xl:inline">{{ __('Hi') }} </span>
                                <span class="block text-green-800 dark:text-green-400 xl:inline">
                                    {{ __('Write your content here') }}
                                </span>
                            </h1>
                            <p
                                class="mt-3 max-w-md mx-auto text-lg text-white text-center dark:text-slate-400 sm:text-xl md:mt-5 md:max-w-3xl">
                                {{ __('Tell us your business story here') }}
                            </p>
                        @else
                            <h1
                                class="text-4xl tracking-tight text-white dark:text-white sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                                <span class="block xl:inline font-extrabold">{{ $section->title }}</span>
                                <span class="block text-green-800 dark:text-green-400 xl:inline">
                                    {{ $section->subtitle }}
                                </span>
                            </h1>
                            <div
                                class="mt-3 mx-auto text-md text-center leading-loose text-white dark:text-slate-400 lg:pr-5 sm:text-md md:my-5 ">
                                {!! $section->content !!}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>
        {{-- Services Block --}}
        <div class="dark:bg-slate-900 max-w-full">
            <div class="flex flex-wrap items-center mx-auto px-5 py-16 lg:px-28">
                <div class="w-full lg:max-w-lg lg:w-1/2">
                    <h2 class="text-xl font-semibold text-green-400 dark:text-green-400 uppercase tracking-wide">
                        {{ __('We provide you with') }}</h2>
                    <p class="mt-4 text-lg text-gray-500 dark:text-slate-400">
                        {{-- {{ __('Commercial and logistical solutions, to serve small and large companies, we can facilitate the delivery of your order from our many points of sale and storage over the globe.') }} --}}
                    </p>
                </div>
                <div
                    class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:px-5 xl:pl-24 md:mb-0 xl:mt-0">
                    <div class="flex flex-row-reverse w-full sm:-mx-4 md:-mx-3 lg:-mx-3 xl:-mx-4">
                        @forelse ($services as $service)
                            <div class="w-full">
                                @if ($service->image != null)
                                    <div class="px-10">
                                        <img alt="{{ $service->title }}"
                                            src="{{ asset('uploads/services/' . $service->image) }}"
                                            class="w-full px-4 h-12 shadow-lg" lazy />
                                    </div>
                                @endif
                                <div class="px-2 w-full lg:max-w-lg">
                                    <div class="mt-2 ml-9 text-base text-gray-500 dark:text-slate-400">
                                        {!! $service->content !!}
                                    </div>
                                </div>
                            </div>
                            @empty
                            {{__('Nothing to show')}}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- Services Block End --}}

        {{-- Project Block --}}
        <div class="dark:bg-slate-900 max-w-full">
            <div class="flex flex-wrap items-center mx-auto px-5 py-16 lg:px-28">
                <div class="w-full lg:max-w-lg lg:w-1/2">
                    <h2 class="text-xl font-semibold text-green-400 dark:text-green-400 uppercase tracking-wide">
                        {{ __('Our Work') }}</h2>
                    <p class="mt-4 text-lg text-gray-500 dark:text-slate-400">
                        {{-- {{ __('Commercial and logistical solutions, to serve small and large companies, we can facilitate the delivery of your order from our many points of sale and storage over the globe.') }} --}}
                    </p>
                </div>
                <div
                    class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:px-5 xl:pl-24 md:mb-0 xl:mt-0">
                    <div class="flex flex-row-reverse w-full sm:-mx-4 md:-mx-3 lg:-mx-3 xl:-mx-4">
                        @forelse ($projects as $project)
                            <div class="w-full">
                                @if ($project->image)
                                    <div class="px-10">
                                        <img alt="{{ $project->title }}"
                                            src="{{ asset('uploads/projects/' . $project->image) }}"
                                            class="w-full px-4 h-12 shadow-lg" lazy />
                                    </div>
                                @endif
                                <div class="px-2 w-full lg:max-w-lg">
                                    <div class="mt-2 ml-9 text-base text-gray-500 dark:text-slate-400">
                                        {!! $project->content !!}
                                    </div>
                                </div>
                            </div>
                            @empty
                            {{__('Nothing to show')}}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- Portfolios Block End --}}

    </div>

</x-guest-layout>
