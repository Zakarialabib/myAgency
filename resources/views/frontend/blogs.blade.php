<x-guest-layout>
    {{-- @section('meta-keywords', "$seo->blog_meta_key")
@section('meta-description', "$seo->blog_meta_desc") --}}

    <header class="container-fluid header">
        <div class="row">
            <div class="col">
                <div class="lg-text">
                    <span>SPARK TIPS</span><br>
                    <span>DESIGN & BUSINESS</span><br>
                    <span class="other-color">SPARKBLOG</span>
                </div>
                <div class="normal-text">
                    <p>You can call it an extra arm that support you with insightful ideas,<br>about business, design,
                        productivity, design or even personal<br> development for business people.</p>
                </div>
            </div>
        </div>
    </header>

    <!--====== BLOG STANDARD PART START ======-->
    <div class="container-fluid blog-section">
        {{-- <div class="row">
            <div class="col">
                <div class="col-lg-8"> --}}
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
                    @else
                    no blog
                    
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
