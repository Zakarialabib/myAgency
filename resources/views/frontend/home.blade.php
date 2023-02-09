<x-guest-layout>

    @section('title', $section->title )
    @section('meta-keywords', $section->title )
    @section('meta-description',  Str::limit($section->content, 50, '...') )

    <div>
        <header class="container-fluid header"
        style="background-image: url({{ asset('/uploads/sections/' . $section->image) }});background-size: cover;">
            <div class="mouse-scroll"></div>
            @if (empty($section))
                <div class="row">
                    <div class="col">
                        <div class="extra-lg-text">
                            <span>user-centric</span><br>
                        <span>experiences</span><br>
                        <span>that actually</span><br>
                        <span class="other-color">work</span>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <div class="flex-grow">
                        <div class="lg-text">
                            <span>{{ $section->title }}</span>
                            <span class="other-color">{{ $section->subtitle }}</span>
                        </div>
                        <div class="normal-text">
                            <p>{!! $section->content !!}</p>
                        </div>
                    </div>
                </div>
            @endif
        </header>
    </div>
    {{-- Services Block --}}
    <div class="container-fluid portfolio ">
        <div class="pb-24 flex flex-wrap">

            @foreach ($services as $service)
                <div class="my-4 px-4 sm:w-full md:w-full lg:w-full xl:w-1/3">
                    <div class="boxy primary-color"
                        style="background-image: url({{ asset('uploads/services/' . $service->image) }});">
                        <div class="row">
                            <div class="col">
                                <h1 class="title">{{ $service->title }}</h1>
                            </div>
                        </div>
                        <div class="service-line"></div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-5">
                                <div class="text">
                                    <ul>
                                        {!! $service->content !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- <h2 class="lg-text">Portfolio</h2> --}}
        <div class="flex flex-wrap">
            <ul>
                @foreach ($portfolios as $portfolio)
                    <li>
                        <figure class="reveal-effect masker wow" style="visibility: visible;"> <a
                                href="{{ route('front.portfolioDetails', $portfolio->slug) }}"
                                class=""><img src="{{ asset('images/img3.png') }}" alt="Image"
                                    class=""></a>
                        </figure>
                        <div class="caption wow words chars splitting animated">
                            <h3>{{ $portfolio->title }}</h3>
                            <h5>{{ $portfolio->client_name }}</h5>
                            <div class="link">
                                <a href="{{ route('front.portfolioDetails', $portfolio->slug) }}">
                                    {{__('VIEW THIS PROJECT')}}
                                </a>
                            </div>
                        </div>
                        <!-- end caption -->
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container-fluid clients-section">
        <div class="flex flex-wrap">
            <div class="col">
                <div class="lg-text">
                    <span>Trusted by top-tier</span><br>
                    <span>Companies, Agencies,</span><br>
                    <span>National Institutions, and more...</span>
                </div>
                {{-- <div class="normal-text">
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising<br> pain
                        was born and I will give you a complete account of the system.</p>
                </div> --}}
                <div class="clients-logos">
                    <div class="logo-holder"><img src="{{ asset('images/client1.png') }}" alt=""></div>
                    <div class="logo-holder"><img src="{{ asset('images/client2.png') }}" alt=""></div>
                    <div class="logo-holder"><img src="{{ asset('images/client3.png') }}" alt=""></div>
                    <div class="logo-holder"><img src="{{ asset('images/client4.png') }}" alt=""></div>
                    <div class="logo-holder"><img src="{{ asset('images/client5.png') }}" alt=""></div>
                    <div class="logo-holder"><img src="{{ asset('images/client6.png') }}" alt=""></div>
                    <div class="logo-holder"><img src="{{ asset('images/client7.png') }}" alt=""></div>
                    <div class="logo-holder"><img src="{{ asset('images/client8.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid other-content">
        <div class="flex flex-wrap">
            <div class="col">
                <div class="lg-text">have a project<br>for us?</div>
                <div class="normal-text">
                    <p>Contact us and we’ll send you the brief form to fill.<br>
                        Then we’ll contact you within 24 hours.</p>
                </div>
                <div class="btn-holder">
                    <a href="#" class="cr-btn ex-padding">let’s cre8</a>
                </div>
            </div>
        </div>
    </div>


    {{-- <livewire:front.contact-form /> --}}

</x-guest-layout>
