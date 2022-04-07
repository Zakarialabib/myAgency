
    @livewireScripts
    
    <script async type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    
    {{-- <!-- Alpinejs -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    <!-- Jquery -->
    <script type="text/javascript"  src="{{ asset('assets/js/jquery.min.js') }}"></script>
    
    <!-- Toastr -->
    <script type="text/javascript"  src="{{ asset('assets/js/toastr.min.js') }}"></script>
    
    <!-- SweetAlert -->
    <script type="text/javascript"  href="{{ asset('assets/js/sweetalert2.min.js') }}" ></script>
    
    <!-- Popper JS -->
    <script type="text/javascript"  src="{{ asset('assets/js/popper.min.js') }}"></script>
    
    <!-- Bootstrap JS -->
    <script type="text/javascript"  src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
    <!-- Custom JS -->
    <script type="text/javascript"  src="{{ asset('assets/js/main.js') }}"></script>
    
    <!-- Trix -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script> --}}

    @stack('scripts')
    
    {{-- @livewireChartsScripts --}}