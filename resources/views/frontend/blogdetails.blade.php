<x-guest-layout>
{{--
@yield('meta-keywords', "$blog->meta_keywords")
@yield('meta-description', "$blog->meta_description") 
--}}


    <!--====== BLOG STANDARD PART START ======-->

    <div class="blog-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-dteails-content">
                        <img class="main-image" src="{{ asset('assets/front/img/blog/' . $blog->image) }}" alt="blog">
                        <div class="content">
                            <h3 class="title">{{ $blog->title }}</h3>
                            <ul class="post-meta">
                                <li><i class="fal fa-user"></i> By, Admin</li>
                                <li><i class="fal fa-calendar-alt"></i>
                                    {{ date('d M, Y', strtotime($blog->created_at)) }}</li>
                            </ul>
                            <div>
                                {!! $blog->content !!}
                            </div>

                        </div>
                        <br>
                    </div>
                </div>
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
                </div>
            </div>
        </div>
    </div>

    <!--====== BLOG STANDARD PART End ======-->

</x-guest-layout>
