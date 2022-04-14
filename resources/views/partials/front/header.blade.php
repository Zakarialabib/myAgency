<div class="menu-toggle">
    <div class="icon"></div>
</div>
<div class="follow-us"> FOLLOW US </div>
<div class="main-menu">
    <div class="contant-info">
        <div><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></div>
        <div>{{ $setting->phone_number }}</div>
    </div>
    <div class="menu-links">
        <ul>
            <li><a href="{{ route('front.home') }}">Home</a></li>
            <li><a href="{{ route('front.about') }}">About</a></li>
            <li><a href="{{ route('front.portfolio') }}">Work</a></li>
            <li><a href="{{ route('front.blogs') }}">Blog</a></li>
            <li><a href="{{ route('front.contact') }}">Contact</a></li>
        </ul>
    </div>
</div>
<nav class="container-fluid cnav">
    <div class="flex flex-wrap">
        <div class="flex-grow">
            <div class="logo-holder">
                <a href="{{ route('front.home') }}"><img class="logo" src="{{ asset('images/logo.svg') }}" alt="{{ $setting->website_title }}"></a>
            </div>
        </div>
        <div class="flex-grow text-right">
            <div class="right_header_languages">
                <a href="#" class="languages">
                    <img src="{{flagImageUrl(\Illuminate\Support\Facades\App::getLocale())}}">
                    @if(count($langs) > 1)
                        <x-heroicon-o-chevron-down class="flex-shrink-0 w-5 h-5 text-white" />
                    @endif
                </a>
                @if(count($langs) > 1)
                    <ul>
                        @foreach($langs as $lang)
                            @if(\Illuminate\Support\Facades\App::getLocale() !== $lang->code)
                                <li><a href="{{route('changeLanguage', $lang->code)}}" title="{{$lang->name}}"><img src="{{flagImageUrl($lang->code)}}">{{$lang->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</nav>