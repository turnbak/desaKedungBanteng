<div class="modal fade in" id="profil_pengguna">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Pengaturan Pengguna</h4>
            </div>
            <?php echo $__env->make('admin.profil.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php echo $__env->make('admin.layouts.components.sweetalert2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/validasi.js')); ?>"></script>
    <script>
        $('document').ready(function() {

            $("#validate_user").validate();

            setTimeout(function() {
                $('#pass_baru1').rules('add', {
                    equalTo: '#pass_baru'
                })
            }, 500);

            $('#file_browser_user').click(function(e) {
                e.preventDefault();
                $('#file_user').click();
            });

            $('#file_user').change(function() {
                $('#file_path_user').val($(this).val());
            });

            $('#file_path_user').click(function() {
                $('#file_browser_user').click();
            });

            $('#verif_telegram').click(function() {
                Swal.fire({
                    title: 'Mengirim OTP',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                $.ajax({
                        url: '<?php echo e(route('user_setting.kirim_otp_telegram')); ?>',
                        type: 'Post',
                        data: {
                            'sidcsrf': getCsrfToken(),
                            'id_telegram': $('#id_telegram').val()
                        },
                    })
                    .done(function(response) {
                        if (response.status == true) {
                            Swal.fire({
                                title: 'Masukan Kode OTP',
                                input: 'text',
                                inputPlaceholder: 'Masukan Kode OTP',
                                inputValidator: (value) => {
                                    if (isNaN(value)) {
                                        return 'Kode OTP harus berupa angka'
                                    }
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Kirim',
                                cancelButtonText: 'Tutup',
                                showLoaderOnConfirm: true,
                                preConfirm: (otp) => {
                                    const formData = new FormData();
                                    formData.append('sidcsrf', getCsrfToken());
                                    formData.append('id_telegram', response.data);
                                    formData.append('otp', otp);

                                    return fetch(
                                            `<?php echo e(route('user_setting.verifikasi_telegram')); ?>`, {
                                                method: 'POST',
                                                body: formData,
                                            }).then(response => {
                                            if (!response.ok) {
                                                throw new Error(response.statusText)
                                            }
                                            return response.json()
                                        })
                                        .catch(error => {
                                            Swal.showValidationMessage(
                                                `Request failed: ${error}`
                                            )
                                        })
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    if (result.value.status == true) {
                                        $('.close').trigger("click"); //close modal
                                        Swal.fire({
                                            icon: 'success',
                                            title: result.value.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: result.value.message
                                        })
                                    }
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.messages,
                            })
                        }
                    })
                    .fail(function(e) {
                        Swal.fire({
                            icon: 'error',
                            text: e.statusText,
                        })
                    });
            });

            $('#id_telegram').change(function(event) {
                $('input[name="telegram_verified_at"]').val('')
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/profil/pengaturan_pengguna.blade.php ENDPATH**/ ?>