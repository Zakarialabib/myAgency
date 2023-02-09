<x-guest-layout>
@section('title', $section->title )
@section('meta-keywords', $section->title )
@section('meta-description',  Str::limit($section->content, 50, '...') )

    <header class="container-fluid header"
    style="background-image: url({{ asset('/uploads/sections/' . $section->image) }});background-size: cover;">
        @if (empty($section))
        <div class="row">
            <div class="col">
                <div class="xl:text-6xl lg:text-5xl md:text-5xl sm:text-4xl lg-text">
                    <span>perfection is</span><br>
                    <span>not a myth</span><br>
                    <span class="other-color">check our</span><br>
                    <span class="other-color">work.</span>
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
        @endif
    </header>

    <!--====== BLOG STANDARD PART START ======-->
    <div class="container-fluid blog-section">
        <div class="blog-standard">
            @if (count($blogs) == 0)
                <div class="col-md-12">
                    <div class="bg-light py-5">
                        <h3 class="text-center">{{ __('NO BLOG FOUND') }}</h3>
                    </div>
                </div>
            @else
                <div class="row">
                    @forelse ($blogs as $blog)
                        <div class="post-box">
                            <div class="text-holder">
                                <a href="{{ route('front.blogdetails', $blog->slug) }}"
                                    class="title">{{ Str::title($blog->title) }}</a>
                                <div class="text">{{ __('Read More') }}</div>
                                <time datetime="{{ $blog->created_at->format('y-m-d') }}">
                                    {{ $blog->created_at->diffForHumans() }}
                                </time>
                            </div>

                            <div class="img-holder">
                                <img src="{{ asset('uploads/' . $blog->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row mt-30">
            <div class="col-lg-12 text-center">
                <div class="d-inline-block">
                    {{ $blogs->appends(['language' => request()->input('language')])->links() }}
                </div>
            </div>
        </div>
    </div>

    <!--====== BLOG STANDARD PART End ======-->
</x-guest-layout>
