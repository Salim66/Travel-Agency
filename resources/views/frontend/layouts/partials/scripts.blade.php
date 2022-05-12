<script data-cfasync="false" src="{{ asset('frontend') }}/assets/js/email-decode.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/chain_fade.js"></script>
<script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/swiper-bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.fancybox.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/select2.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery-ui.js"></script>

<script src="{{ asset('frontend') }}/assets/js/main.js"></script>

<!-- Toastr JS -->
<script src="{{ asset('frontend/assets/js/toastr.min.js') }}"></script>
<script type="text/javascript">
    @if(Session::has('message'))
        let type = "{{ Session::get('alert-type', 'info') }}"
        switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

            case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
</script>

