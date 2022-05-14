<!-- Vendor JS -->
<script src="{{ asset('backend') }}/js/vendors.min.js"></script>
</script>	<script src="{{ asset('/') }}/../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="{{ asset('/') }}/../assets/icons/feather-icons/feather.min.js"></script>
<script src="{{ asset('/') }}/../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
<script src="{{ asset('/') }}/../assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="{{ asset('/') }}/../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

<script src="{{ asset('../assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

<!-- CDEditor -->
<script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
<script src="{{ asset('backend/js/pages/editor.js') }}"></script>

<!-- Sunny Admin App -->
<script src="{{ asset('backend') }}/js/template.js"></script>
<script src="{{ asset('backend') }}/js/pages/dashboard.js"></script>

<!-- Toastr JS -->
<script src="{{ asset('backend/js/toastr.min.js') }}"></script>
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

<script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script>
<script src="{{ asset('backend') }}/js/custom/custom.js"></script>
