@push('css-vendor')
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@push('js-vendor')
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
@endpush

@push('script')
<script>
    $('.datepicker').datetimepicker({
        icons: {
            time: 'far fa-clock'
        },
        format: 'YYYY-MM-DD',
        locale: 'id'
    });

    $('.datetimepicker').datetimepicker({
        icons: {
            time: 'far fa-clock'
        },
        format: 'YYYY-MM-DD HH:mm',
        locale: 'id'
    });
</script>
@endpush
