<div class="relative bg-black">
    <div class="max-w-screen-xl mx-auto py-5 px-4 sm:px-6 lg:py-6 lg:px-8">
        <div class="flex flex-wrap -mx-3 overflow-hidden sm:-mx-3 md:-mx-4 lg:-mx-3 xl:-mx-3">
            <div
                class="my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-full md:my-4 md:px-4 md:w-1/3 lg:my-3 lg:px-3 lg:w-1/3 xl:my-3 xl:px-3 xl:w-1/3 text-center">
                <p class="flex justify-center">
                    <a href="/">
                        <img src="{{ asset('uploads/' . config('settings.site_logo')) }}" class="block h-16 w-10/12">
                    </a>
                </p>
                <p class="mt-8 w-full text-white text-center text-base leading-8">
                    {{ config('settings.company_address') }}
                </p>
                <div class="flex flex-wrap gap-5 w-full p-5">
                    @if (config('settings.social_facebook') != null)
                        <a href="{{ config('settings.social_facebook') }}" target="_blank"
                            class="text-white hover:text-blue-500"><span
                                class="sr-only">{{ __('Facebook') }}</span>
                            <svg fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif
                    @if (config('settings.social_instagram') != null)
                        <a href="{{ config('settings.social_instagram') }}" target="_blank"
                            class="ml-6 text-white hover:text-blue-500"><span
                                class="sr-only">{{ __('Instagram') }}</span> <svg fill="currentColor"
                                viewBox="0 0 24 24" class="h-6 w-6">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif
                    @if (config('settings.social_twitter') != null)
                        <a href="{{ config('settings.social_twitter') }}" target="_blank"
                            class="ml-6 text-white hover:text-blue-500"><span class="sr-only">Twitter</span> <svg
                                fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                    @endif
                    @if (config('settings.social_linkedin') != null)
                        <a href="{{ config('settings.social_linkedin') }}" target="_blank"
                            class="ml-6 text-white hover:text-blue-500"><span class="sr-only">Linkedin</span>
                            <svg fill="currentColor" viewBox="0 0 28 28" class="h-6 w-6">
                                <path
                                    d="M25.424,15.887v8.447h-4.896v-7.882c0-1.979-0.709-3.331-2.48-3.331c-1.354,0-2.158,0.911-2.514,1.803  c-0.129,0.315-0.162,0.753-0.162,1.194v8.216h-4.899c0,0,0.066-13.349,0-14.731h4.899v2.088c-0.01,0.016-0.023,0.032-0.033,0.048  h0.033V11.69c0.65-1.002,1.812-2.435,4.414-2.435C23.008,9.254,25.424,11.361,25.424,15.887z M5.348,2.501  c-1.676,0-2.772,1.092-2.772,2.539c0,1.421,1.066,2.538,2.717,2.546h0.032c1.709,0,2.771-1.132,2.771-2.546  C8.054,3.593,7.019,2.501,5.343,2.501H5.348z M2.867,24.334h4.897V9.603H2.867V24.334z" />
                            </svg>
                        </a>
                    @endif
                    @if (config('settings.social_whatsapp') != null)
                        <a href="https://wa.me/{{ config('settings.social_whatsapp') }}" target="_blank"
                            class="ml-6 text-white hover:text-blue-500"><span
                                class="sr-only">{{ __('Whatsapp') }}</span>
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="h-6 w-6">
                                <path
                                    d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z" />
                            </svg>
                        </a>
                    @endif
                    @if (config('settings.company_phone') != null)
                        <a href="tel:{{ config('settings.company_phone') }}" target="_blank"
                            class="ml-6 text-white hover:text-blue-500"><span
                                class="sr-only">{{ __('Phone') }}</span><svg fill="none" viewBox="0 0 24 24"
                                class="h-6 w-6" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </a>
                    @endif
                    @if (config('settings.company_email_address') != null)
                        <a href="mailto::{{ config('settings.company_email_address') }}" target="_blank"
                            class="ml-6 text-white hover:text-blue-500"><span
                                class="sr-only">{{ __('Email') }}</span><svg fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
            <div
                class="my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-full md:my-4 md:px-4 md:w-1/3 lg:my-3 lg:px-3 lg:w-1/3 xl:my-3 xl:px-3 xl:w-1/3 text-center">
                <div class="text-center relative">
                    <ul class="mt-4 inline-block align-middle">
                        <li class=""><a href=" #"
                                class="text-base leading-3 text-white hover:text-blue-500">
                                {{ __('Home') }}
                            </a></li>
                        {{-- <li class="mt-4">
                            <a class="text-base leading-3 text-white hover:text-blue-500"
                                href="{{ route('page.index') }}">{{ __('Pages') }}</a>
                        </li>
                        <li class="mt-4">
                            <a class="text-base leading-3 text-white hover:text-blue-500"
                                href="{{ route('blog.index') }}">{{ __('Blog') }}</a>
                        </li> --}}
                        <li class="mt-4"><a href="#contact"
                                class="text-base leading-3 text-white hover:text-blue-500">
                                {{ __('Contact') }}
                            </a></li>
                    </ul>
                </div>
            </div>
            <div
                class="my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-full md:my-4 md:px-4 md:w-1/3 lg:my-3 lg:px-3 lg:w-1/3 xl:my-3 xl:px-3 xl:w-1/3 text-center">
                <ul class="mt-4 inline-block align-middle">
                    @guest
                        <li class=""><a href=" {{ route('register') }}"
                                class="text-base leading-3 text-white hover:text-blue-500">
                                {{ __('Register') }}
                            </a>
                        </li>
                        <li class="mt-4"><a href="{{ route('login') }}"
                                class="text-base leading-3 text-white hover:text-blue-500">
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endguest
                    @auth
                        @if (auth()->user()->isAdmin())
                            <li class="">
                                <a class="text-base leading-3 text-white hover:text-blue-500"
                                    href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="mt-4">
                                <a class="text-base leading-3 text-white hover:text-blue-500" href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
    <div class="mt-12 border-t border-zinc200 pt-8">
        <p class="text-base text-white text-center leading-8">
            {{ config('settings.footer_copyright_text') }} ©
            <span id="get-current-year">{{ date('Y') }}</span>
        </p>
    </div>
</div>
