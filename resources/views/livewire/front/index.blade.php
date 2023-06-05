<div>
    <div class="relative mx-auto mb-5">
        <div class="w-full mx-auto bg-gray-900">
            @foreach ($this->sliders as $slider)
                <div class="relative">
                    <div class="absolute inset-0 bg-black opacity-75" style="background-color:{{ $slider->bg_color }}">
                    </div>
                    <div class="flex flex-wrap -mx-4 py-20 px-4"
                        style="background-image: url({{ $slider->getFirstMediaUrl('local_files') }});background-size: cover;background-position: center;">
                        <div class="w-full px-10 lg:mb-5 sm:mb-2 z-50">
                            <div class="lg:py-5 py-10 text-white px-2">
                                <h5 class="xl:text-2xl md:text-xl sm:text-md font-bold mb-2">
                                    {{ $slider->subtitle }}
                                </h5>
                                <h2
                                    class="max-w-5xl text-2xl font-bold leading-none tracking-tighter text-neutral-600 md:text-5xl lg:text-6xl lg:max-w-7xl">
                                    {{ $slider->title }}
                                </h2>
                                <p class="text-md font-medium my-4">
                                    {{ $slider->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pb-24 pt-10 px-10 bg-redBrick-600">
            <h3
                class="xl:text-5xl md:text-2xl sm:text-lg text-white hover:text-redBrick-500 uppercase py-6 text-center font-bold mb-2 cursor-pointer py-10">
                {{ __('Upcoming Races') }}
            </h3>
            <div class="mb-10 space-y-10">
                @forelse ($this->races as $race)
                    <div
                        class="flex flex-wrap items-center bg-gray-50 pt-5 pb-15 rounded-lg w-full px-4 md:-mx-4 shadow-2xl transition duration-300 ease-in-out delay-200 transform bg-white shadow-2xl md:hover:translate-x-0 md:hover:translate-y-8">
                        <div class="w-full lg:w-1/3 h-full mb-6 flex justify-center">
                            <a href="{{ route('front.raceDetails', $race->slug) }}">
                                <img class="object-cover object-center w-full rounded-xl h-72 lg:h-96"
                                    src="{{ $race->getFirstMediaUrl('local_files') }}" alt="{{ $race->name }}">
                            </a>
                            <a href="{{ route('front.raceDetails', $race->slug) }}"
                                class="cursor-pointer absolute bottom-5 inline-flex items-center md:text-lg bg-redBrick-600 py-6 px-8 front-bold rounded-full text-white hover:bg-redBrick-800 hover:text-redBrick-200 focus:bg-redBrick-800 font-semibold">
                                <span class="mr-3">{{ __('Check race') }}</span>
                                <svg width="8" height="10" viewbox="0 0 8 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.94667 4.74665C7.91494 4.66481 7.86736 4.59005 7.80666 4.52665L4.47333 1.19331C4.41117 1.13116 4.33738 1.08185 4.25617 1.04821C4.17495 1.01457 4.08791 0.997253 4 0.997253C3.82246 0.997253 3.6522 1.06778 3.52667 1.19331C3.46451 1.25547 3.4152 1.32927 3.38156 1.41048C3.34792 1.4917 3.33061 1.57874 3.33061 1.66665C3.33061 1.84418 3.40113 2.01445 3.52667 2.13998L5.72667 4.33331H0.666667C0.489856 4.33331 0.320286 4.40355 0.195262 4.52858C0.070238 4.6536 0 4.82317 0 4.99998C0 5.17679 0.070238 5.34636 0.195262 5.47138C0.320286 5.59641 0.489856 5.66665 0.666667 5.66665H5.72667L3.52667 7.85998C3.46418 7.92196 3.41458 7.99569 3.38074 8.07693C3.34689 8.15817 3.32947 8.24531 3.32947 8.33331C3.32947 8.42132 3.34689 8.50846 3.38074 8.5897C3.41458 8.67094 3.46418 8.74467 3.52667 8.80665C3.58864 8.86913 3.66238 8.91873 3.74361 8.95257C3.82485 8.98642 3.91199 9.00385 4 9.00385C4.08801 9.00385 4.17514 8.98642 4.25638 8.95257C4.33762 8.91873 4.41136 8.86913 4.47333 8.80665L7.80666 5.47331C7.86736 5.40991 7.91494 5.33515 7.94667 5.25331C8.01334 5.09101 8.01334 4.90895 7.94667 4.74665Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="w-full lg:w-1/2 md:px-4 py-10">

                            <p class="block mb-4 leading-6 text-gray-800 hover:text-gray-900 font-bold hover:underline">
                                {{ $race->date }}
                            </p>
                            <a class="inline-block mb-4 text-2xl font-medium leading-6 text-gray-800 hover:text-gray-900 font-bold hover:underline"
                                href="{{ route('front.raceDetails', $race->slug) }}">{{ $race->name }}</a>
                            <div class="mb-4">
                                <span class="text-sm md:text-base font-medium text-gray-500">Race Location:</span>
                                <span class="text-base md:text-lg">{{ $race?->location->name }}</span>
                            </div>

                            <div class="mb-4">
                                <span class="text-sm md:text-base font-medium text-gray-500">Category:</span>
                                <span class="text-base md:text-lg">{{ $race?->category->name }}</span>
                            </div>

                            <div class="mb-4">
                                <span class="text-sm md:text-base font-medium text-gray-500">Number of Days:</span>
                                <span class="text-base md:text-lg">{{ $race->number_of_days }}</span>
                            </div>

                            <div class="mb-4">
                                <span class="text-sm md:text-base font-medium text-gray-500">Number of Racers:</span>
                                <span class="text-base md:text-lg">{{ $race->number_of_racers }}</span>
                            </div>

                            <div class="mb-4">
                                <span class="text-sm md:text-base font-medium text-gray-500">Price:</span>
                                <span class="text-base md:text-lg">{{ $race->price }} DH</span>
                            </div>

                            @if ($race->social_media)
                                <div class="mb-4">
                                    <x-theme.social-media-icons :socialMedia="$race->social_media" />
                                </div>
                            @else
                                <p class="block text-base md:text-lg text-gray-400">No social media available.</p>
                            @endif

                            @if ($race->course)
                                <div class="mb-7">
                                    <ul>
                                        @foreach (json_decode($race->course) as $key => $course)
                                            <li class="text-base inline-flex gap-2 md:text-lg">
                                                <span
                                                    class="text-xs uppercase px-[10px] py-[5px] tracking-widest whitespace-nowrap inline-block rounded-md bg-redBrick-500 hover:bg-redBrick-800 text-white">
                                                    {{ ucfirst($key) }}
                                                    </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <p class="block text-base md:text-lg text-gray-400">No course details available.</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-50 py-10 mb-10 rounded-lg w-full px-4 md:-mx-4 shadow-2xl">
                        <h3 class="text-3xl text-center font-bold font-heading text-blue-900">
                            {{ __('No Races found') }}
                        </h3>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="h-screen bg-gray-100 text-black px-10 py-10 ">
            <h5 class="xl:text-3xl md:text-xl sm:text-lg uppercase pb-4 text-center font-bold mb-2 cursor-pointer">
                {{ __('Races Locations') }}
            </h5>
            <hr>
            <div class="grid lg:grid-cols-3 md:grid-cols-3 md:grid-cols-2 gap-6 mt-4">
                @foreach ($this->raceLocations as $raceLocation)
                    <div
                        class="flex flex-col h-max justify-between items-center rounded-xl bg-gray-50 shadow-xl transition duration-300 ease-in-out delay-200 transform bg-white shadow-2xl md:hover:translate-x-0 md:hover:-translate-y-4">
                        <img class="opacity-75 rounded w-full h-auto"
                            src="{{ $raceLocation->getFirstMediaUrl('local_files') }}" />
                        <p class="relative z-50 text-3xl font-semibold text-center py-4 tracking-tight text-black px-4">
                            {{ $raceLocation->name }}
                        </p>
                        <p class="relative w-full text-lg sm:text-sm z-50 font-medium text-center py-4 px-2 text-black">
                            {{ $raceLocation->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        @livewire('front.resources')

        @if (count($this->featuredProducts) > 0)
            <div class="bg-gray-100 py-10">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold mb-8 hover:bg-text-700">
                        <a href="https://www.example-store.com" target="_blank" rel="noopener">
                            {{ __('Visit Store') }}
                        </a>
                    </h2>

                    <p class="text-center text-gray-700 mb-6">Gear up for success! Visit our online store to explore a
                        wide
                        range of high-quality products designed for endurance athletes.</p>

                    <hr>
                    <!-- Optional: Featured Products Section -->
                    <div class="mt-10">
                        <h3 class="text-2xl font-semibold mb-4">{{ __('Featured Products') }}</h3>

                        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">
                            @foreach ($this->featuredProducts as $product)
                                <x-product-card :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="px-5 py-12 lg:px-16 bg-gray-50">
            <h5 class="xl:text-3xl md:text-xl sm:text-lg uppercase pb-4 text-center font-bold mb-2 cursor-pointer">
                {{ __('Sponsors') }}
            </h5>
            <div class="flex flex-wrap justify-center gap-8 -mx-2">
                @foreach ($this->sponsors as $sponsor)
                    <div class="w-1/2 md:w-1/3 lg:w-1/6 py-4 space-y-4">
                        <div class="group relative">
                            <img class="mx-auto w-56 h-auto my-4 rounded-xl filter grayscale transition duration-300 hover:grayscale-0"
                                src="{{ $sponsor->getFirstMediaUrl('local_files') }}" alt="{{ $sponsor->name }}">
                            <p
                                class="text-center text-sm px-4 mb-4 absolute bottom-0 left-0 w-full text-white text-opacity-0 group-hover:text-opacity-100 transition-opacity duration-300 cursor-pointer">
                                {{ $sponsor->name }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if (count($this->sections) > 0)
            <div class="py-5 px-4 mx-auto bg-gray-100">
                <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 w-full py-10">
                    @foreach ($this->sections as $section)
                        <div class="px-3 mb-6">
                            <div class="relative h-full text-center pt-16 bg-white">
                                <div class="pb-12 border-b">
                                    <h3 class="mb-4 text-xl font-bold font-heading">{{ $section->title }}</h3>
                                    @if ($section->subtitle)
                                        <p>{{ $section->subtitle }}</p>
                                    @endif
                                </div>
                                <div class="py-5 px-4 text-center">
                                    <p class="text-lg text-gray-500">
                                        {!! $section->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
