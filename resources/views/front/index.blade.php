<x-guest-layout>
    {{-- @section('title', $section->title)
        @section('meta-keywords', $section->title)
        @section('meta-description', Str::limit($section->content, 50, '...')) --}}
    @section('title', __('Home'))

    <div class="">
        <section class="relative bg-black text-white">
            <div id="particles-js"></div>
            <div class="anime max-w-6xl mx-auto px-4 sm:px-6">
                <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                    <div class="text-center pb-12 md:pb-16">
                        <h1
                            class="section-title text-6xl md:text-5xl font-extrabold leading-tighter tracking-tighter mb-4">
                            {{ $section->title }}
                            <p
                                class="h-56 bg-clip-text text-[10rem] text-transparent uppercase bg-gradient-to-r from-green-600 via-green-600 to-black leading-5 py-10">
                                {{ $section->subtitle }}
                                {{-- WeDigitall --}}
                            </p>
                        </h1>
                        <div class="max-w-3xl mx-auto">
                            <p class="text-xl text-gray-600 mb-8" id="section-description">
                                {!! $section->content !!}
                            </p>
                            <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center">
                                <a class="py-5 mt-4 px-4 text-white rounded-full bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:ml-4"
                                    href="#0">
                                    Learn more
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        @if ($section->image)
                            <div class="relative flex justify-center mb-8">
                                <div class="flex flex-col justify-center">
                                    <img alt="{{ $section->title }}" loading="lazy" style="color:transparent"
                                        src="{{ asset('uploads/sections/' . $section->image) }}" width="768"
                                        height="432">
                                </div>
                                <button
                                    class="absolute top-full flex items-center transform -translate-y-1/2 bg-white rounded-full font-medium group p-4 shadow-lg">
                                    <svg class="w-6 h-6 fill-current text-gray-400 group-hover:text-blue-600 shrink-0"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0 2C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12z">
                                        </path>
                                        <path d="M10 17l6-5-6-5z"></path>
                                    </svg>
                                    <span class="text-gray-800 ml-3">Learn about us in this short video (2 min)</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="relative max-w-6xl mx-auto px-4 sm:px-6">
            <div class="pt-12 md:pt-20">
                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                    <h1 class="h2 mb-4">Powerful suite of tools</h1>
                    <p class="text-xl text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.</p>
                </div>
                <div class="md:grid md:grid-cols-12 md:gap-6">
                    <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-7 lg:col-span-6 md:mt-6">
                        <div class="mb-8 md:mb-0">
                            @foreach ($projects as $project)
                                <a class="flex items-center justify-between text-lg p-5 rounded border transition duration-300 ease-in-out mb-3 bg-white shadow-md border-gray-200 hover:shadow-lg"
                                    href="#0">
                                    <div>
                                        <div class="font-bold leading-snug tracking-tight mb-1">{{ $project->title }}
                                        </div>
                                        <div class="text-gray-600">
                                            {!! $project->description !!}
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-center items-center w-8 h-8 bg-white rounded-full shadow flex-shrink-0 ml-3">
                                        @if ($project->image)
                                            <img alt="{{ $project->title }}"
                                                src="{{ asset('uploads/projects/' . $project->image) }}" class="w-3 h-3"
                                                lazy />
                                        @else
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.953 4.29a.5.5 0 00-.454-.292H6.14L6.984.62A.5.5 0 006.12.173l-6 7a.5.5 0 00.379.825h5.359l-.844 3.38a.5.5 0 00.864.445l6-7a.5.5 0 00.075-.534z">
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div
                        class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-5 lg:col-span-6 mb-8 md:mb-0 md:order-1">
                        <div class="relative flex flex-col text-center lg:text-right">
                            <div class="w-full opacity-100 translate-y-0">
                                <div class="relative inline-flex flex-col"><img alt="Features bg" loading="lazy"
                                        decoding="async" data-nimg="1" class="md:max-w-none mx-auto rounded"
                                        style="color: transparent;"
                                        srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Ffeatures-bg.35306e3e.png&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Ffeatures-bg.35306e3e.png&amp;w=1080&amp;q=75 2x"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Ffeatures-bg.35306e3e.png&amp;w=1080&amp;q=75"
                                        width="500" height="462"><img alt="Element" loading="lazy"
                                        decoding="async" data-nimg="1"
                                        class="md:max-w-none absolute w-full left-0 transform animate-float"
                                        style="color: transparent; top: 30%;"
                                        srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Ffeatures-element.1a5bcb68.png&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Ffeatures-element.1a5bcb68.png&amp;w=1080&amp;q=75 2x"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Ffeatures-element.1a5bcb68.png&amp;w=1080&amp;q=75"
                                        width="500" height="44"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto py-12 md:py-20">
            <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20">
                <h2 class="h2 mb-4">Explore the solutions</h2>
                <p class="text-xl text-gray-600">our services section</p>
            </div>
            <div
                class="max-w-sm mx-auto grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-none">
                @foreach ($services as $service)
                    <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">
                        @if ($service->image)
                            <img alt="{{ $service->title }}" src="{{ asset('uploads/services/' . $service->image) }}"
                                class="w-16 h-16 p-1 -mt-1 mb-2" lazy />
                        @else
                            <svg class="w-16 h-16 p-1 -mt-1 mb-2" viewBox="0 0 64 64"
                                xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <rect class="fill-current text-blue-600" width="64" height="64"
                                        rx="32">
                                    </rect>
                                    <g stroke-width="2">
                                        <path class="stroke-current text-blue-300"
                                            d="M34.514 35.429l2.057 2.285h8M20.571 26.286h5.715l2.057 2.285"></path>
                                        <path class="stroke-current text-white" d="M20.571 37.714h5.715L36.57 26.286h8">
                                        </path>
                                        <path class="stroke-current text-blue-300" stroke-linecap="square"
                                            d="M41.143 34.286l3.428 3.428-3.428 3.429"></path>
                                        <path class="stroke-current text-white" stroke-linecap="square"
                                            d="M41.143 29.714l3.428-3.428-3.428-3.429"></path>
                                    </g>
                                </g>
                            </svg>
                        @endif
                        <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">{{ $service->title }}</h4>
                        <p class="text-gray-600 text-center">{!! $service->content !!}</p>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

    @push('styles')
        <style>
            #particles-js {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }

            .anime .section-title {
                display: inline-block;
                line-height: 1em;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script>
            anime.timeline({
                    loop: false
                })
                .add({
                    targets: '.anime .section-title',
                    scale: [14, 1],
                    opacity: [0, 1],
                    easing: "easeOutCirc",
                    duration: 1000,
                    delay: (el, i) => 800 * i
                });
        </script>

        <script>
            particlesJS('particles-js', {
                particles: {
                    number: {
                        value: 160,
                        density: {
                            enable: true,
                            value_area: 800
                        }
                    },
                    color: {
                        value: '#b0f210'
                    },
                    shape: {
                        type: 'circle',
                        stroke: {
                            width: 0,
                            color: '#000000'
                        },
                        polygon: {
                            nb_sides: 5
                        },
                        image: {
                            src: '{{ asset('uploads/sections/particle.png') }}',
                            width: 100,
                            height: 100
                        }
                    },
                    opacity: {
                        value: 0.3,
                        random: false,
                        anim: {
                            enable: false,
                            speed: 1,
                            opacity_min: 0.1,
                            sync: false
                        }
                    },
                    size: {
                        value: 5,
                        random: true,
                        anim: {
                            enable: false,
                            speed: 40,
                            size_min: 0.1,
                            sync: false
                        }
                    },
                    line_linked: {
                        enable: false,
                        distance: 150,
                        color: '#ffffff',
                        opacity: 0.4,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 6,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        bounce: false,
                        attract: {
                            enable: false,
                            rotateX: 600,
                            rotateY: 1200
                        }
                    }
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: {
                        onhover: {
                            enable: true,
                            mode: 'repulse'
                        },
                        onclick: {
                            enable: true,
                            mode: 'push'
                        },
                        resize: true
                    },
                    modes: {
                        grab: {
                            distance: 400,
                            line_linked: {
                                opacity: 1
                            }
                        },
                        bubble: {
                            distance: 400,
                            size: 40,
                            duration: 2,
                            opacity: 8,
                            speed: 3
                        },
                        repulse: {
                            distance: 200,
                            duration: 0.4
                        },
                        push: {
                            particles_nb: 4
                        },
                        remove: {
                            particles_nb: 2
                        }
                    }
                },
                retina_detect: true
            });
        </script>
    @endpush


</x-guest-layout>
