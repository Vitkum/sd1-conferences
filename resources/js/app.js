import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: form.dataset.confirm,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: form.dataset.yes,
                cancelButtonText: form.dataset.no
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
