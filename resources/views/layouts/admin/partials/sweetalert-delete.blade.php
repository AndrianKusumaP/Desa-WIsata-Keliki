<script>
    // Ketika tombol hapus diklik
    $('.btn-delete').click(function(event) {
        let form = $(this).closest("form"); // Ambil form terdekat dari tombol hapus
        event.preventDefault(); // Mencegah form dari submit langsung

        // Tampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data ini?',
            text: "Tindakan ini tidak bisa dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Tidak, Batalkan',
        }).then((result) => {
            // Jika pengguna menekan tombol "Ya, Hapus"
            if (result.isConfirmed) {
                form.submit();  // Kirim form untuk menghapus data
            }
        });
    });
</script>
