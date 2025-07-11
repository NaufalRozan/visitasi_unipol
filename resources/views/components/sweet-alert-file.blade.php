<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function validateFileSize(inputId, maxSizeInMB = 2) {
        const fileInput = document.getElementById(inputId);
        const maxSizeInBytes = maxSizeInMB * 1024 * 1024;

        if (fileInput.files.length > 0) {
            const fileSize = fileInput.files[0].size;
            if (fileSize > maxSizeInBytes) {
                showSweetAlert(
                    'Ukuran file terlalu besar!',
                    `Maksimal ukuran file yang diizinkan adalah ${maxSizeInMB}MB.`,
                    'error'
                );
                return false;
            }
        }
        return true;
    }
</script>
