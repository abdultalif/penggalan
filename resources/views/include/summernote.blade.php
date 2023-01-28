@push('css-vendor')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@push('js-vendor')
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush

@push('script')
<script>
    $('.summernote').summernote({
        fontName: [''],
        height: 200
    });

    // Untuk menghilangkan format tulisan seperti times new roman di summernote
    $('.note-btn-group.note-fontname').remove();
    setTimeout(() => {
        $('.note-btn-group.note-fontname').remove();
    }, 300);
</script>
@endpush
