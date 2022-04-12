<x-guest-layout>
    {{-- @yield('meta-keywords', "$blog->meta_keywords")
@yield('meta-description', "$blog->meta_description") --}}

    <!--====== BLOG Start ======-->
    <header class="container-fluid header">
        <div class="row">
            <div class="col">
                <div class="lg-text">
                    <span>PRODUCT TIPS</span><br>
                    <span>DESIGN & BUSINESS</span><br>
                    <span class="other-color">cre8 blog</span>
                </div>
                <div class="normal-text">
                    <p>You can call it an extra arm that support you with insightful ideas,<br>about business, design,
                        productivity, design or even personal<br> development for business people.</p>
                </div>
            </div>
        </div>
    </header>
    <article itemscope itemtype="http://schema.org/Article" class="container-fluid post-section">
        <div class="row">
            <div class="col">
                <div class="post-header">
                    <div class="text-holder">
                        <div class="post-info-holder">
                            <div class="link-holder">
                                <a href="{{ route('front.blogs') }}">&#x3C; {{ __('Back') }}</a>
                            </div>
                            <div class="post-info">
                                <div class="date">{{ date('d M, Y', strtotime($blog->created_at)) }}</div>
                                <div class="auther">By, Admin</div>
                            </div>
                        </div>
                        <div class="title">{{ $blog->title }}</div>
                    </div>
                    <div class="img-holder">
                        <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                </div>
                <div class="post-content">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </article>

    <!--====== BLOG End ======-->

</x-guest-layout>
