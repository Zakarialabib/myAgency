<footer class="container-fluid footer">
    <div class="row">
        <div class="col">
            <div class="lg-text">
                <span>100% satisfication.</span><br>
                <span>let’s create</span>
            </div>
            <div class="normal-text">
                <p>{{ $setting->footer_text }}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="contact-info-holder">
                <div class="title">Call us</div>
                <div class="contact-info">{{ $setting->phone_number }}</div>
            </div>
        </div>
        <div class="col">
            <div class="contact-info-holder">
                <div class="title">E-mail</div>
                <div class="contact-info"><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></div>
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