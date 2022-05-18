<footer class="container-fluid footer">
    <div class="row">
        <div class="col">
            <div class="lg-text">
                <span>100% satisfication.</span><br>
                <span>let’s create</span>
            </div>
            <div class="normal-text">
                <p>{{ $footer_text }}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="contact-info-holder">
                <div class="title">Call us</div>
                <div class="contact-info">{{ $phone_number }}</div>
            </div>
        </div>
        <div class="col">
            <div class="contact-info-holder">
                <div class="title">E-mail</div>
                <div class="contact-info"><a href="mailto:{{ $email }}">{{ $email }}</a></div>
                {{-- <div class="social-media">
                    <div class="social-link-holder"><a href="#">Dribbble</a></div>
                    <div class="social-link-holder"><a href="#">Instagram</a></div>
                    <div class="social-link-holder"><a href="#">Twitter</a></div>
                    <div class="social-link-holder"><a href="#">Facebook</a></div>
                    <div class="social-link-holder"><a href="#">Whatsapp</a></div>
                </div> --}}
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('/js/app.js') }}" defer></script>
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/js/vendors.js') }}"></script>

<!-- Toastr -->
{{-- <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script> --}}
<!-- Custom JS -->
{{-- <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>--}}
{{-- <script src="{{ asset('assets/js/popper.min.js') }}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.js" defer></script> --}}
{{-- <script type="text/javascript" src="{{ asset('/js/anime.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/scrollreveal.min.js') }}"></script> --}}


<input type="hidden" id="main_url" value="{{ route('front.home') }}">

@php
$mainbs = [];
$mainbs['is_announcement'] = $is_announcement;
$mainbs['announcement_delay'] = $announcement_delay;
$mainbs = json_encode($mainbs);
@endphp

<script>
    var mainbs = {!! $mainbs !!};

    $(document).ready(function() {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });

    $(window).on('load', function(event) {

        if (mainbs.is_announcement == 1) {
            // trigger announcement banner base on sessionStorage
            let announcement = sessionStorage.getItem('announcement') != null ? false : true;
            // console.log(sessionStorage.getItem('announcement'));
            if (announcement) {
                setTimeout(function() {
                    $('.announcement-banner').trigger('click');
                }, mainbs.announcement_delay * 1000);
            }
        }

    });

    // announcement banner magnific popup
    if (mainbs.is_announcement == 1) {
        $('.announcement-banner').magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            callbacks: {
                open: function() {
                    $.magnificPopup.instance.close = function() {
                        // Do whatever else you need to do here
                        sessionStorage.setItem("announcement", "closed");
                        // console.log(sessionStorage.getItem('announcement'));

                        // Call the original close method to close the announcement
                        $.magnificPopup.proto.close.call(this);
                    };
                }
            }
        });
    }
</script>

{{-- Cookie alert dialog start --}}
{{-- @if ($is_cooki_alert == 1)
		@include('cookieConsent::index')
	@endif --}}
{{-- Cookie alert dialog end --}}
