<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            customClass: {
                confirmButton: 'btn-success'
            }
        });
    @endif
</script>
