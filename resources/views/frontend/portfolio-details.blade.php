<x-guest-layout>
{{-- @section('meta-keywords', "$blog->meta_keywords")
@section('meta-description', "$blog->meta_description") --}}

    <header class="container-fluid header">
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
    </header>

    <div class="container-fluid project-info">
        <div class="row">
            <div class="col">
                <h2></h2>
                <div class="lg-text">
                    <span>{{ $portfolio->title }}</span>
                </div>
                <div class="normal-text">
                    <p>{!! $portfolio->content !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="text-box">
                    <div class="title">{{ __('Client') }}</div>
                    <p>{{ $portfolio->client_name }}</p>
                </div>
            </div>
            @if ($portfolio->link)
                <div class="col-sm-6 col-md-3">
                    <div class="text-box">
                        <div class="title">{{ __('Website') }}</div>
                        <p><a href="{{ $portfolio->link }}">{{ $portfolio->link }}</a></p>
                    </div>
                </div>
            @endif
            <div class="col-sm-6 col-md-3">
                <div class="text-box">
                    <div class="title">Sector</div>
                    <p>{{ $portfolio->service->title }}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="text-box">
                    <div class="title">Deliverables</div>
                    <p>Branding<br>
                        Branding Strategy<br>
                        Naming & verbal identity<br>
                        Launch & brand campaigns</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid project-imgs">
        <div class="row">
            @if ($portfolio_images->count() > 0)
                <div class="col">
                    @foreach ($portfolio_images as $item)
                        <div class="img-holder">
                            <img src="{{ asset('assets/front/img/portfolio/' . $item->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col">
                    <div class="img-holder">
                        <img src="images/project1-img1.png" alt="">
                    </div>
                    <div class="img-holder">
                        <img src="images/project1-img2.png" alt="">
                    </div>
                    <div class="img-holder">
                        <img src="images/project1-img3.png" alt="">
                    </div>
				</div>
            @endif
        </div>
    </div>
    <div class="container-fluid other-content">
        <div class="row">
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

</x-guest-layout>