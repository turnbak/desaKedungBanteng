<?php echo $__env->make('admin.pengaturan_surat.asset_tinymce', ['height' => 250], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Daftar Surat
        <small><?php echo e($action); ?> Pengaturan Surat</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('surat_master')); ?>">Daftar Surat</a></li>
    <li class="active"><?php echo e($action); ?> Pengaturan Surat</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo form_open($formAksi, ['id' => 'validasi', 'enctype' => 'multipart/form-data']); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#header" data-toggle="tab">Header</a></li>
            <li><a href="#footer" data-toggle="tab">Footer</a></li>
            <li><a href="#alur" data-toggle="tab">Alur Surat</a></li>
            <li><a href="#tte" data-toggle="tab">Pengaturan TTE</a></li>
            <li><a href="#lainnya" data-toggle="tab">Lainnya</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="header">

                <?php echo $__env->make('admin.pengaturan_surat.kembali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label>Tinggi Header Surat</label>
                        <div class="input-group">
                            <input type="number" name="tinggi_header" class="form-control input-sm required" min="0"
                                max="100" step="0.01" value="<?php echo e(setting('tinggi_header')); ?>" />
                            <span class="input-group-addon input-sm">cm</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Template Header Surat</label>
                        <textarea name="header_surat" class="form-control input-sm editor required"><?php echo e(setting('header_surat')); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="footer">

                <?php echo $__env->make('admin.pengaturan_surat.kembali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label>Tinggi Footer Surat</label>
                        <div class="input-group">
                            <input type="number" name="tinggi_footer" class="form-control input-sm required" min="0"
                                max="100" step="0.01" value="<?php echo e(setting('tinggi_footer')); ?>" />
                            <span class="input-group-addon input-sm">cm</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Template Footer Surat</label>
                        <textarea name="<?php echo e(setting('tte') == '1' ? 'footer_surat_tte' : 'footer_surat'); ?>"
                            class="form-control input-sm editor required"><?php echo e(setting('tte') == '1' ? setting('footer_surat_tte') : setting('footer_surat')); ?></textarea>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="alur">

                <?php echo $__env->make('admin.pengaturan_surat.kembali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="box-body">
                    <div class="alert alert-warning alert-dismissible">
                        <h4><i class="icon fa fa-warning"></i> Info Penting!</h4>
                        Menonaktifkan verifikasi akan mempengaruhi log surat maka pastikan bahwa benar surat ingin
                        diarsipkan semua.
                    </div>


                    <div class="form-group">
                        <label>Verifikasi <?php echo e($ref_jabatan->where('id', '=', 2)->first()->nama); ?></label>
                        <div class="input-group col-xs-12 col-sm-8">
                            <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons" style="padding: 0px;">
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('verifikasi_sekdes') == '1') ? 'active' : ''; ?> <?= (!$sekdes) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="verifikasi_sekdes" class="form-check-input" value="1"
                                        autocomplete="off" <?= (setting('verifikasi_sekdes') == '1' && $sekdes) ? 'checked' : ''; ?>
                                        <?= (!$sekdes) ? 'disabled' : ''; ?>>Ya</label>
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('verifikasi_sekdes') == '0') ? 'active' : ''; ?> <?= (!$sekdes) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="verifikasi_sekdes" class="form-check-input" value="0"
                                        autocomplete="off" <?= (setting('verifikasi_sekdes') == '0' && $sekdes) ? 'checked' : ''; ?> <?= (!$sekdes) ? 'disabled' : ''; ?>>Tidak
                                </label>
                            </div>
                        </div>
                        <span class="help-block text-red <?= (!$sekdes) ? 'show' : 'hide'; ?>">User
                            <?php echo e($ref_jabatan->where('id', '=', 2)->first()->nama); ?> belum tersedia</span>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label>Verifikasi <?php echo e($ref_jabatan->where('id', '=', 1)->first()->nama); ?></label>
                        <div class="input-group col-xs-12 col-sm-8">
                            <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons" style="padding: 0px;">
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('verifikasi_kades') == '1') ? 'active' : ''; ?> <?= (setting('tte') == '1' || !$kades) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="verifikasi_kades" class="form-check-input" value="1"
                                        autocomplete="off" <?= (setting('verifikasi_kades') == '1') ? 'checked' : ''; ?>
                                        <?= (setting('tte') == '1' || !$kades) ? 'disabled' : ''; ?>>Ya</label>
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('verifikasi_kades') == '0') ? 'active' : ''; ?> <?= (setting('tte') == '1' || !$kades) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="verifikasi_kades" class="form-check-input" value="0"
                                        autocomplete="off" <?= (setting('verifikasi_kades') == '0') ? 'checked' : ''; ?> <?= (setting('tte') == '1' || !$kades) ? 'disabled' : ''; ?>>Tidak
                                </label>
                            </div>
                        </div>
                        <span class="help-block text-red <?= (!$kades) ? 'show' : 'hide'; ?>">User
                            <?php echo e($ref_jabatan->where('id', '=', 1)->first()->nama); ?> belum tersedia</span>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tte">

                <?php echo $__env->make('admin.pengaturan_surat.kembali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="box-body">
                    <?php if(!$kades): ?>
                        <div class="callout callout-danger">
                            <p>Pengaturan modul TTE hanya bisa aktif jika user <strong>Kepala
                                    <?php echo e(setting('sebutan_desa')); ?></strong> sudah dibuat dan aktif.</p>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <?php if($tte_demo): ?>
                            <div class="alert alert-warning alert-dismissible">
                                <h4><i class="icon fa fa-warning"></i> Info Penting!</h4>
                                Modul TTE ini hanya sebuah simulasi untuk persiapan penerapan TTE di
                                <?= config_item('nama_aplikasi') ?> dan hanya berlaku
                                untuk surat yang menggunakan TinyMCE
                            </div>
                        <?php endif; ?>

                        <div class="alert alert-info alert-dismissible">
                            <h4><i class="icon fa fa-info"></i> Info !</h4>
                            Jika pilihan Visual TTE aktif, Letakan kode [ttd_bsre] pada tempat yang ingin ditempelkan gambar
                            TTD.
                        </div>

                        <label>Aktifkan Modul TTE</label>
                        <div class="input-group col-xs-12 col-sm-8">
                            <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons" style="padding: 0px;">
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('tte') == '1') ? 'active' : ''; ?> <?= (!$kades) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="tte" class="form-check-input" value="1"
                                        autocomplete="off" <?= (setting('tte') == '1') ? 'checked' : ''; ?>
                                        <?= (!$kades) ? 'disabled' : ''; ?>>Ya</label>
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('tte') == '0') ? 'active' : ''; ?> <?= (!$kades) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="tte" class="form-check-input" value="0"
                                        autocomplete="off" <?= (setting('tte') == '0') ? 'checked' : ''; ?>
                                        <?= (!$kades) ? 'disabled' : ''; ?>>Tidak
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>URL API Server TTE</label>
                        <input type="text" name="tte_api" class="form-control input-sm"
                            value="<?php echo e($tte_demo ? site_url() : setting('tte_api')); ?>" <?= (!$kades) ? 'disabled' : ''; ?>>
                    </div>
                    <div class="form-group">
                        <label>Username Login TTE</label>
                        <input type="text" name="tte_username" class="form-control input-sm"
                            value="<?php echo e(setting('tte_username')); ?>" <?= (!$kades) ? 'disabled' : ''; ?>>
                    </div>
                    <div class="form-group">
                        <label>Password Login TTE</label>
                        <input type="password" name="tte_password" class="form-control input-sm"
                            value="<?php echo e(setting('tte_password')); ?>" <?= (!$kades) ? 'disabled' : ''; ?>>
                    </div>

                    <div class="form-group">
                        <label>Visual TTE</label>
                        <div class="input-group col-xs-12 col-sm-8">
                            <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons" style="padding: 0px;">
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('visual_tte') == '1') ? 'active' : ''; ?> <?= (!$kades) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="visual_tte" class="form-check-input" value="1"
                                        autocomplete="off" <?= (setting('visual_tte') == '1') ? 'checked' : ''; ?>
                                        <?= (!setting('tte')) ? 'disabled' : ''; ?>>Ya</label>
                                <label
                                    class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?= (setting('visual_tte') == '0') ? 'active' : ''; ?> <?= (!$kades) ? 'disabled' : ''; ?>">
                                    <input type="radio" name="visual_tte" class="form-check-input" value="0"
                                        autocomplete="off" <?= (setting('visual_tte') == '0') ? 'checked' : ''; ?>
                                        <?= (!setting('tte')) ? 'disabled' : ''; ?>>Tidak
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="visual-tte-form">
                        <div class="form-group">
                            <label>Gambar Visual</label>
                            <div class="input-group input-group-sm  col-md-2 col-sm-12">
                                <img class="img-responsive"
                                    src="<?php echo e(setting('visual_tte_gambar') == null ? asset('assets/images/bsre.png?v', false) : base_url(setting('visual_tte_gambar'))); ?>"
                                    alt="Kantor Desa">
                            </div>
                            <div class="input-group input-group-sm  col-md-2 col-sm-12">
                                <input type="text" class="form-control" id="file_path">
                                <input type="file" id="file" class="hidden" name="visual_tte_gambar">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" id="file_browser"><i
                                            class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group" style="margin-top: 3px; margin-bottom: 3px">
                                    <span class="input-group-addon input-sm">Tinggi</span>
                                    <input type="number" class="form-control input-sm required" name="visual_tte_height"
                                        style="text-align:right;" value="<?php echo e(setting('visual_tte_height')); ?>">
                                    <span class="input-group-addon input-sm">px</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group" style="margin-top: 3px; margin-bottom: 3px">
                                    <span class="input-group-addon input-sm">Lebar</span>
                                    <input type="number" class="form-control input-sm required" name="visual_tte_weight"
                                        style="text-align:right;" value="<?php echo e(setting('visual_tte_weight')); ?>">
                                    <span class="input-group-addon input-sm">px</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>

            <div class="tab-pane" id="lainnya">
                <?php echo $__env->make('admin.pengaturan_surat.kembali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label>Jenis Font Bawaan </label>
                        <div class="row">
                            <div class="col-lg-4 col-md-7 col-sm-12">
                                <select class="select2 form-control" name="font_surat">
                                    <?php $__currentLoopData = $font_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $font): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($font); ?>" <?= ($font == setting('font_surat')) ? 'selected' : ''; ?>>
                                            <?php echo e($font); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        <label>Fomat penomoran surat </label>
                        <input type="text" name="format_nomor_surat" class="form-control input-sm"
                            value="<?php echo e(setting('format_nomor_surat')); ?>">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                    Simpan</button>
            </div>
        </div>
    </div>
    </form>
    <?php echo $__env->make('admin.pengaturan_surat.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(function() {
            ganti_tte();
            ganti_visual();
            $('input[name="tte"]').on('change', function(e) {
                if (!$(this).is(':disabled')) {
                    ganti_tte()
                }
            });

            function ganti_tte() {
                if (!$('input[name="tte"]').is(':disabled')) {
                    var tte = $('input[name="tte"]').filter(':checked').val();
                    if (tte == 1) {
                        $('input[name="tte_api"]').attr("disabled", false);
                        $('input[name="tte_password"]').attr("disabled", false).attr("required", true);
                        $('input[name="tte_username"]').attr("disabled", false).attr("required", true);
                    } else {
                        $('input[name="tte_api"]').attr("disabled", true).attr("required", false);
                        $('input[name="tte_password"]').attr("disabled", true).attr("required", false);
                        $('input[name="tte_username"]').attr("disabled", true).attr("required", false);
                    }
                }
            }

            $('input[name="visual_tte"]').change(function(e) {
                ganti_visual();
            })

            function ganti_visual() {
                if ($('input[name="visual_tte"]').filter(':checked').val() == 1) {
                    $('#visual-tte-form').show();
                } else {
                    $('#visual-tte-form').hide();
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan_surat/pengaturan.blade.php ENDPATH**/ ?>