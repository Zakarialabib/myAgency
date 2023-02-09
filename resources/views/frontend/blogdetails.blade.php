<x-guest-layout>
    @section('title', $blog->title )
    @yield('meta-keywords', "$blog->meta_keywords")
    @yield('meta-description', "$blog->meta_description")

    <!--====== BLOG Start ======-->
    <header class="container-fluid header"
    style="background-color:{{ $theme_color }};">
        <div class="row">
            <div class="col">
                <div class="xl:text-5xl lg:text-4xl md:text-4xl sm:text-3xl lg-text">
                    <span>{{ $blog->title }}</span>
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
