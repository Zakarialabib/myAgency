<x-guest-layout>

    @section('title', __('Home'))

    <div>
        <header class="container-fluid header">
            <div class="mouse-scroll"></div>
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
        </header>
    </div>
    {{-- Services Block --}}
    <div class="container-fluid box-content">
        <div class="flex flex-wrap">
            <div class="my-4 px-4 w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                <div class="boxy c1-color">
                    <div class="row">
                        <div class="col">
                            <h1 class="title">LOGO MARKS &<br>
                                BRANDING</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-5">
                            <div class="text">
                                <ul>
                                    <li>logo marks</li>
                                    <li>Brand strategy</li>
                                    <li>design systems</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-7">
                            <div class="text">
                                <ul>
                                    <li>Brand identity</li>
                                    <li>Brand architecture</li>
                                    <li>Naming & verbal identity</li>
                                    <li>Launch & brand campaigns</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 px-4 w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                <div class="boxy primary-color">
                    <div class="row">
                        <div class="col">
                            <h1 class="title">USER INTERFACES<br>
                                & EXPERIENCES</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-5">
                            <div class="text">
                                <ul>
                                    <li>Digital content</li>
                                    <li>interfaces</li>
                                    <li>product design</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-7">
                            <div class="text">
                                <ul>
                                    <li>USER EXPERIENCE</li>
                                    <li>interactivity</li>
                                    <li>CONTENT PRODUCTION</li>
                                    <li>Checkout optimization</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 px-4 w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                <div class="boxy default-color">
                    <div class="row">
                        <div class="col">
                            <h1 class="title">WEB<br>
                                DEVELOPMENT</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text">
                                <ul>
                                    <li>Platform migrations</li>
                                    <li>HTML5 & CSS</li>
                                    <li>LARAVEL / VUE.JS FRAMEWORKS</li>
                                    <li>Speed and Ui Optimization</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid portfolio">
        <h2 class="lg-text">Portfolio</h2>
        <div class="flex flex-wrap">
            <ul>
                @foreach ($portfolios as $portfolio)
                    <li>
                        <figure class="reveal-effect masker wow" style="visibility: visible;"> <a
                                href="case-single.html" class=""><img
                                    src="{{ asset('images/img3.png') }}" alt="Image" class=""></a>
                        </figure>
                        <div class="caption wow words chars splitting animated">
                            <h3>{{ $portfolio->title }}</h3>
                            <h5>{{ $portfolio->client_name }}</h5>
                            <div class="link">
                                <a href="{{ route('front.portfolioDetails', $portfolio->slug) }}">
                                    VIEW THIS PROJECT
                                </a>
                            </div>
                        </div>
                        <!-- end caption -->
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <div class="container-fluid default-content">
        <div class="flex flex-wrap">
            <div class="col">
                <div class="lg-text">
                    <span>Awwward winning</span><br>
                    <span>london-based product</span><br>
                    <span class="other-color">design studio.</span>
                </div>
                <div class="normal-text">
                    <p>It's a community, an ecosystem of passionate professionals and consulting coming together to help
                        you in the fields of marketing, media buying, design, product development, scalability, and
                        leadership.</p>
                </div>
                <div class="btn-holder">
                    <a href="{{ route('front.about') }}" class="cr-btn primary">more about us</a>
                </div>
            </div>
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

    <script>
        var random, Y, X, Z, RY, RX, RZ, S, pos;
        var concentration = 2000;

        function newX() {
            return Math.floor((Math.random() * concentration) + 1);
        }

        function newY() {
            return Math.floor((Math.random() * concentration) + 1);
        }

        function newZ() {
            return Math.floor((Math.random() * concentration) + 1);
        }

        function newAngle() {
            return Math.floor((Math.random() * 360) + 1);
        }

        $(".light").each(function() {
            Y = 'translateY(' + newY() + 'px) ';
            X = 'translateX(' + newX() + 'px) ';
            Z = 'translateZ(' + newZ() + 'px) ';
            RY = 'rotateY(' + newAngle() + 'deg)';
            RX = 'rotateX(' + newAngle() + 'deg)';
            RZ = 'rotateZ(' + newAngle() + 'deg)';
            S = 'scale(' + Math.floor((Math.random() * 20) + 1) + ')';
            $(this).css('transform', Y + X + Z + RY + RX + RZ);
        });

        $('#scale').click(function(event) {
            $('#space').css('transfom', 'scale(5)');
        });
    </script>

</x-guest-layout>
