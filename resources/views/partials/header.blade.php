<div class="menu-toggle">
    <div class="icon"></div>
</div>
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
    <div class="social-media">
        <div class="social-link-holder"><a href="#">Dribbble</a></div>
        <div class="social-link-holder"><a href="#">Instagram</a></div>
        <div class="social-link-holder"><a href="#">Twitter</a></div>
        <div class="social-link-holder"><a href="#">Facebook</a></div>
        <div class="social-link-holder"><a href="#">Whatsapp</a></div>
    </div>
</div>
<nav class="container-fluid cnav">
    <div class="row">
        <div class="col">
            <div class="logo-holder">
                <a href="{{ route('front.home') }}"><img class="logo" src="{{ asset('images/logo.svg') }}" alt="{{ $setting->website_title }}"></a>
            </div>
        </div>
        <div class="col text-right">
            <div class="">
                
                @if (count($langs) > 0)
                <li class="">
                    <p class=""><i class="fas fa-globe"></i>{{ $currentLang->name }}</p>
                    <div class="">
                        @foreach ($langs as $lang)
                        <a href="{{ route('changeLanguage', $lang->code) }}" class="{{ $lang->name == $currentLang->name ? 'active' : '' }}">{{ $lang->name }}</a>
                        @endforeach
                    </div>
                </li>
                @endif
            </div>
        </div>
    </div>
</nav>