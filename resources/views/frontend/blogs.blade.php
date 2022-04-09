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
                                @foreach ($blogs as $item)
                                    <div class="post-box">

                                        <div class="text-holder">
                                            <a href="{{ route('front.blogdetails', $item->slug) }}"
                                                class="title">{{ Str::title($item->title) }}</a>
                                            <div class="text">{{ __('Read More') }}</div>
                                            <time datetime="{{$item->created_at->format('y-m-d')}}">
                                                {{$item->created_at->diffForHumans()}}
                                            </time> 
                                        </div>

                                        <div class="img-holder">
                                            <img src="{{ asset('assets/front/img/blog/' . $item->image) }}" alt="">
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
                {{-- </div>
            </div>
        </div> --}}
    </div>

    {{-- <div class="section-gap">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-4  order-first order-lg-last">
                    <div class="blog-sidebar">
                        <div class="widget search-widget">
                            <h4 class="widget-title">{{ __('Search Blog') }}</h4>
                            <form
                                action="{{ route('front.blogs', ['category' => request()->input('category'),'month' => request()->input('month'),'year' => request()->input('year')]) }}"
                                method="GET">
                                <div class="input-box">
                                    <input name="category" type="hidden" value="{{ request()->input('category') }}">
                                    <input name="month" type="hidden" value="{{ request()->input('month') }}">
                                    <input name="year" type="hidden" value="{{ request()->input('year') }}">
                                    <input name="term" type="text" placeholder="{{ __('Search Blog') }}..."
                                        value="{{ request()->input('term') }}">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="widget categories-widget">
                            <h4 class="widget-title">{{ __('Categories') }}</h4>

                            <ul>
                                @foreach ($bcategories as $bcategory)
                                    <li><a href="{{ route('front.blogs', ['term' => request()->input('term'),'category' => $bcategory->slug,'month' => request()->input('month'),'year' => request()->input('year')]) }}"
                                            class="@if (request()->input('category') == $bcategory->slug) active @endif">{{ $bcategory->name }}<span>{{ $bcategory->blogs->count() }}</span></a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="widget news-feed-widget">
                            <h4 class="widget-title">{{ __('Latest News') }}</h4>
                            <div class="sidebar-feeds mt-45">

                                <div class="news-feed-items">
                                    @foreach ($latestblogs as $latestblog)
                                        <div class="news-feed-item">
                                            <a href="{{ route('front.blogdetails', $latestblog->slug) }}">
                                                <h4 class="title">
                                                    {{ strlen(strip_tags(Helper::convertUtf8($latestblog->title))) > 50? substr(strip_tags(Helper::convertUtf8($latestblog->title)), 0, 50) . '...': strip_tags(Helper::convertUtf8($latestblog->title)) }}
                                                </h4>
                                            </a>
                                            <span><i
                                                    class="fal fa-calendar-alt"></i>{{ date('d M, Y', strtotime($latestblog->created_at)) }}</span>
                                            <img src="{{ asset('assets/front/img/blog/' . $latestblog->image) }}"
                                                alt="Image">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="widget social-links">
                            <h4 class="widget-title">{{ __('Never Miss News') }}</h4>
                            <ul>
                                @foreach ($socials as $item)
                                    <li><a href="{{ $item->url }}"><i class="{{ $item->icon }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!--====== BLOG STANDARD PART End ======-->
</x-guest-layout>
