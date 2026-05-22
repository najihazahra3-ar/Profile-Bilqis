document.querySelectorAll('.delete-form').forEach((form) => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        Swal.fire({
            title: 'Hapus data?',
            text: 'Data yang dihapus tidak bisa dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#df7894',
            cancelButtonColor: '#8b7b81',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
