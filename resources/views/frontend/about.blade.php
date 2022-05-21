<x-guest-layout>

    @section('title', {{$sectiontitle->title}} )
    @section('meta-keywords', {{$sectiontitle->title}} )
    @section('meta-description', {{ Str::limit($sectiontitle->content, 50, '...') }})

    <header class="container-fluid header"
    style="background-image: url({{ asset('/uploads/sectiontitles/' . $sectiontitle->image) }});background-size: cover;">
        @if (empty($sectiontitle))
            <div class="row">
                <div class="col">
                    <div class="extra-lg-text">
                        <span>perfection is</span><br>
                        <span>not a myth</span><br>
                        <span class="other-color">check our</span><br>
                        <span class="other-color">work.</span>
                    </div>
                </div>
            </div>
        @else
            <div>
                <div class="flex-grow">
                    <div class="lg-text">
                        <span>{{ $sectiontitle->title }}</span>
                        <span class="other-color">{{ $sectiontitle->subtitle }}</span>
                    </div>
                    <div class="normal-text">
                        <p>{!! $sectiontitle->content !!}</p>
                    </div>
                </div>
            </div>
        @endif
    </header>
    <div class="container-fluid process-section">
        @foreach ($abouts as $about)
            <div>
                <div class="flex-grow">
                    <div class="lg-text"><span class="other-color">{{ $about->title }}</span></div>
                    <div class="normal-text">
                        <p>
                            {!! $about->content !!}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="flex flex-wrap">
            <div class="md:w-1/3 px-2">
                <div class="text-box">
                    <div class="title">Discovery</div>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                        born and I will give you a complete account of the</p>
                </div>
            </div>
            <div class="md:w-1/3 px-2">
                <div class="text-box">
                    <div class="title">Planning</div>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                        born and I will give you a complete account of the</p>
                </div>
            </div>
            <div class="md:w-1/3 px-2">
                <div class="text-box">
                    <div class="title">Prototype</div>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                        born and I will give you a complete account of the</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="md:w-1/3 px-2">
                <div class="text-box">
                    <div class="title">Design</div>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                        born and I will give you a complete account of the</p>
                </div>
            </div>
            <div class="md:w-1/3 px-2">
                <div class="text-box">
                    <div class="title">Development</div>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                        born and I will give you a complete account of the</p>
                </div>
            </div>
            <div class="md:w-1/3 px-2">
                <div class="text-box">
                    <div class="title">Delivery</div>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                        born and I will give you a complete account of the</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid team-section">
        @if(empty($sectiontitle_1))
        <div>
            <div class="flex-grow">
                <div class="extra-lg-text">
                    <span>behind every</span><br>
                    <span>great project,</span><br>
                    <span>cre8 team!</span>
                </div>
            </div>
        </div>
        @else
            <div>
                <div class="flex-grow">
                    <div class="lg-text">
                        <span>{{ $sectiontitle_1->title }}</span>
                        <span class="other-color">{{ $sectiontitle_1->subtitle }}</span>
                    </div>
                    <div class="normal-text">
                        <p>{!! $sectiontitle_1->content !!}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="team-photos">
            <div class="team-photos-holder">
                @forelse ($teams as $team)
                <div class="photo-holder">
                    <img src="{{ asset('uploads/teams/' . $team->image) }}" alt="">
                    <div class="bg-indigo-500 mx-6 py-3 -mt-10 relative z-10 rounded-xl">
                        <h3 class="text-center text-white text-xl">{{$team->name}}</h3>
                    </div>
                </div>
                @empty
                <div class="photo-holder">
                    <img src="images/team1.png" alt="">
                    <div class="bg-indigo-500 mx-6 py-7 -mt-12 relative z-10 rounded-xl">
                        <h3 class="text-center text-white text-xl">Cole Erickson</h3>
                    </div>
                </div>
                <div class="photo-holder"><img src="images/team2.png" alt="">
                    <div class="bg-indigo-500 mx-6 py-7 -mt-12 relative z-10 rounded-xl">
                        <h3 class="text-center text-white text-xl">Cole Erickson</h3>
                    </div>
                </div>
                <div class="photo-holder"><img src="images/team3.png" alt="">
                    <div class="bg-indigo-500 mx-6 py-7 -mt-12 relative z-10 rounded-xl">
                        <h3 class="text-center text-white text-xl">Cole Erickson</h3>
                    </div>
                </div>
                <div class="photo-holder"><img src="images/team4.png" alt="">
                    <div class="bg-indigo-500 mx-6 py-7 -mt-12 relative z-10 rounded-xl">
                        <h3 class="text-center text-white text-xl">Cole Erickson</h3>
                    </div>
                </div>
                <div class="photo-holder"><img src="images/team5.png" alt="">
                    <div class="bg-indigo-500 mx-6 py-7 -mt-12 relative z-10 rounded-xl">
                        <h3 class="text-center text-white text-xl">Cole Erickson</h3>
                    </div>
                </div>
                <div class="photo-holder"><img src="images/team6.png" alt="">
                    <div class="bg-indigo-500 mx-6 py-7 -mt-12 relative z-10 rounded-xl">
                        <h3 class="text-center text-white text-xl">Cole Erickson</h3>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="container-fluid jobs-section padding-for-team no-padding-bottom">
        <div class="flex flex-wrap">
            <div class="flex-grow">
                <div class="lg-text"><span class="other-color">job openings</span></div>
            </div>
        </div>
        <div class="flex flex-wrap job-box-row">
            <div class="lg:w-9/12 sm:w-3/5">
                <div class="job-box">
                    <div class="title">Frontend developer</div>
                    <div class="subtitle">Remote</div>
                </div>
            </div>
            <div class="lg:w-1/4 sm:w-2/5">
                <div class="btn-holder">
                    <a href="#" class="cr-btn black ex-padding">Apply Now</a>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap job-box-row">
            <div class="lg:w-9/12 sm:w-3/5">
                <div class="job-box">
                    <div class="title">UX Researcher</div>
                    <div class="subtitle">Remote</div>
                </div>
            </div>
            <div class="lg:w-1/4 sm:w-2/5">
                <div class="btn-holder">
                    <a href="#" class="cr-btn black ex-padding">Apply Now</a>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap job-box-row">
            <div class="lg:w-9/12 sm:w-3/5">
                <div class="job-box">
                    <div class="title">UI Designer</div>
                    <div class="subtitle">London, UK</div>
                </div>
            </div>
            <div class="lg:w-1/4 sm:w-2/5">
                <div class="btn-holder">
                    <a href="#" class="cr-btn black ex-padding">Apply Now</a>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap job-box-row">
            <div class="lg:w-9/12 sm:w-3/5">
                <div class="job-box">
                    <div class="title">Client service agent</div>
                    <div class="subtitle">London, UK</div>
                </div>
            </div>
            <div class="lg:w-1/4 sm:w-2/5">
                <div class="btn-holder">
                    <a href="#" class="cr-btn black ex-padding">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid clients-section">
        <div class="flex flex-wrap">
            <div class="flex-grow">
                <div class="lg-text">
                    <span>DELIGHTING OUR</span><br>
                    <span>CLIENTS IS OUR</span><br>
                    <span>MISSION.</span>
                </div>
                <div class="normal-text">
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising<br> pain
                        was
                        born and I will give you a complete account of the system.</p>
                </div>
                <div class="clients-logos">
                    <div class="logo-holder"><img src="images/client1.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client2.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client3.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client4.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client5.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client6.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client7.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client8.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
