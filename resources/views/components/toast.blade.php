@if (session()->has('success'))
<script>
    $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Success',
        body: "{{ session('massage') }}"
    });

    setTimeout(() => {
        $('.toasts-top-right').remove();
    }, 3000);
</script>

@elseif (session()->has('danger'))
<script>
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        body: "{{ session('massage') }}"
    })
</script>
@endif
