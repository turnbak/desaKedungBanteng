<div class="tab-pane active" id="pengaturan-umum">
    <div class="box-header with-border">
        <a href="<?php echo e(route('surat_master')); ?>"
            class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
            <i class="fa fa-arrow-circle-left"></i>Kembali ke Daftar Surat
        </a>
        <?php if(setting('tte') && ($suratMaster->jenis == 3 || $suratMaster->jenis == 4)): ?>
            <br/><br/>
            <div class="alert alert-info alert-dismissible">
                <h4><i class="icon fa fa-info"></i> Info !</h4>
                Jika surat ingin dikirim ke kecamatan, letakan kode [qrcode_bsre_kecamatan] pada tempat yang ingin ditempelkan QRCode Kecamatan.
            </div>
        <?php endif; ?>
    </div>
    <div class="box-body form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label" for="kode_surat">Kode/Klasifikasi Surat</label>
            <div class="col-sm-7">
                <select class="form-control input-sm select2-tags required" id="kode_surat" name="kode_surat">
                    <?php if(empty($suratMaster->kode_surat)): ?>
                        <option value="">-- Pilih Kode/Klasifikasi Surat --</option>
                    <?php else: ?>
                        <option value="<?php echo e($suratMaster->kode_surat); ?>"><?php echo e($suratMaster->kode_surat); ?></option>
                        <?php endif; ?>
                        <?php $__currentLoopData = $klasifikasiSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->kode); ?>" <?= ($item->kode === $suratMaster->kode_surat) ? 'selected' : ''; ?>>
                                <?php echo e($item->kode . ' - ' . $item->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Layanan</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <span class="input-group-addon input-sm">Surat</span>
                        <input type="text" class="form-control input-sm nama_terbatas required" id="nama"
                            name="nama" placeholder="Nama Layanan" value="<?php echo e($suratMaster->nama); ?>" />
                    </div>
                </div>
            </div>
            <?php if(strpos($form_action, 'insert') !== false && is_null($suratMaster->template)): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="nama">Pemohon Surat</label>
                    <div class="col-sm-3">
                        <select class="form-control input-sm" id="pemohon_surat" name="pemohon_surat">
                            <option value="warga" selected>Warga</option>
                            <option value="non_warga">Bukan Warga</option>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="nama">Masa Berlaku Default</label>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="number" class="form-control input-sm" id="masa_berlaku" name="masa_berlaku"
                                onchange="masaBerlaku()" value="<?php echo e($suratMaster->masa_berlaku ?? 1); ?>">
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control input-sm" id="satuan_masa_berlaku" name="satuan_masa_berlaku">
                                <?php $__currentLoopData = $masaBerlaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kode_masa => $judul_masa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kode_masa); ?>" <?= ($suratMaster->satuan_masa_berlaku === $kode_masa) ? 'selected' : ''; ?>><?php echo e($judul_masa); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <label class="text-muted text-red">Isi 0 jika tidak digunakan dan maksimal 31.</label>
                </div>
            </div>

            <?php if($orientations): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Orientasi Kertas</label>
                    <div class="col-sm-7">
                        <select class="form-control input-sm select2-tags required" name="orientasi">
                            <?php $__currentLoopData = $orientations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>" <?= (($suratMaster->orientasi ?? $default_orientations) === $value) ? 'selected' : ''; ?>>
                                    <?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($orientations): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Ukuran Kertas</label>
                    <div class="col-sm-7">
                        <select class="form-control input-sm select2-tags required" name="ukuran">
                            <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>" <?= (($suratMaster->ukuran ?? $default_sizes) === $value) ? 'selected' : ''; ?>>
                                    <?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($margins): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Margin Kertas</label>
                    <div class="col-sm-7">
                        <div class="row">
                            <?php $__currentLoopData = $margins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6">
                                    <div class="input-group" style="margin-top: 3px; margin-bottom: 3px">
                                        <span class="input-group-addon input-sm"><?php echo e(ucwords($key)); ?></span>
                                        <input type="number" class="form-control input-sm required" min="0"
                                            name="<?php echo e($key); ?>" min="0" max="10" step="0.01" style="text-align:right;"
                                            value="<?php echo e($value); ?>">
                                        <span class="input-group-addon input-sm">cm</span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(! in_array($suratMaster->jenis, [1, 2])): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Lampiran</label>
                    <div class="col-sm-7">
                        <select class="form-control input-sm select2" name="lampiran">
                            <option value="">Tidak Ada</option>
                            <?php $__currentLoopData = $daftar_lampiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>" <?= ($suratMaster->lampiran === $value) ? 'selected' : ''; ?>>
                                    <?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($format_nomor)): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Format Nomor Surat</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-sm" name="format_nomor" placeholder="Format Nomor Surat" value="<?php echo e($format_nomor); ?>">
                    </div>
                </div>
            <?php endif; ?>

            <?php if($qrCode): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="mandiri">Tampilkan QR Code</label>
                    <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                        <label id="n1"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= ($suratMaster->qr_code) ? 'active' : ''; ?>">
                            <input id="q1" type="radio" name="qr_code" class="form-check-input" type="radio"
                                value="1" <?= ($suratMaster->qr_code) ? 'checked' : ''; ?> autocomplete="off">Ya
                        </label>
                        <label id="n2"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= (!$suratMaster->qr_code) ? 'active' : ''; ?>">
                            <input id="q2" type="radio" name="qr_code" class="form-check-input" type="radio"
                                value="0" <?= (!$suratMaster->qr_code) ? 'checked' : ''; ?> autocomplete="off">Tidak
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($header)): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="mandiri">Tampilkan Header</label>
                    <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                        <label id="n1"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= ($header) ? 'active' : ''; ?>">
                            <input id="q1" type="radio" name="header" class="form-check-input" type="radio"
                                value="1" <?= ($header) ? 'checked' : ''; ?> autocomplete="off">Ya
                        </label>
                        <label id="n2"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= (!$header) ? 'active' : ''; ?>">
                            <input id="q2" type="radio" name="header" class="form-check-input" type="radio"
                                value="0" <?= (!$header) ? 'checked' : ''; ?> autocomplete="off">Tidak
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($footer)): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="mandiri">Tampilkan Footer</label>
                    <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                        <label id="n1"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= ($footer) ? 'active' : ''; ?>">
                            <input id="q1" type="radio" name="footer" class="form-check-input" type="radio"
                                value="1" <?= ($footer) ? 'checked' : ''; ?> autocomplete="off">Ya
                        </label>
                        <label id="n2"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= (!$footer) ? 'active' : ''; ?>">
                            <input id="q2" type="radio" name="footer" class="form-check-input" type="radio"
                                value="0" <?= (!$footer) ? 'checked' : ''; ?> autocomplete="off">Tidak
                        </label>
                    </div>
                </div>
            <?php endif; ?>


            <div class="form-group">
                <label class="col-sm-3 control-label" for="logo_garuda">Logo Burung Garuda</label>
                <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                    <label id="o1"
                        class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= ($suratMaster->logo_garuda) ? 'active' : ''; ?>">
                        <input id="bg1" type="radio" name="logo_garuda" class="form-check-input" type="radio"
                            value="1" <?= ($suratMaster->logo_garuda) ? 'checked' : ''; ?> autocomplete="off">Ya
                    </label>
                    <label id="o2"
                        class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= (!$suratMaster->logo_garuda) ? 'active' : ''; ?>">
                        <input id="bg2" type="radio" name="logo_garuda" class="form-check-input" type="radio"
                            value="0" <?= (!$suratMaster->logo_garuda) ? 'checked' : ''; ?> autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <?php if(setting('tte')): ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kecamatan">Kirim ke Kecamatan</label>
                    <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                        <label id="n1"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= ($suratMaster->kecamatan) ? 'active' : ''; ?>">
                            <input id="q1" type="radio" name="kecamatan" class="form-check-input" type="radio"
                                value="1" <?= ($suratMaster->kecamatan) ? 'checked' : ''; ?> autocomplete="off">Ya
                        </label>
                        <label id="n2"
                            class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= (!$suratMaster->kecamatan) ? 'active' : ''; ?>">
                            <input id="q2" type="radio" name="kecamatan" class="form-check-input" type="radio"
                                value="0" <?= (!$suratMaster->kecamatan) ? 'checked' : ''; ?> autocomplete="off">Tidak
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="mandiri">Sediakan di Layanan Mandiri</label>
                <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                    <label id="m1"
                        class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= ($suratMaster->mandiri) ? 'active' : ''; ?>">
                        <input id="g1" type="radio" name="mandiri" class="form-check-input" type="radio"
                            value="1" <?= ($suratMaster->mandiri) ? 'checked' : ''; ?> autocomplete="off">Ya
                    </label>
                    <label id="m2"
                        class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label <?= (!$suratMaster->mandiri) ? 'active' : ''; ?>">
                        <input id="g2" type="radio" name="mandiri" class="form-check-input" type="radio"
                            value="0" <?= (!$suratMaster->mandiri) ? 'checked' : ''; ?> autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group" id="syarat"
                <?php echo e(jecho($suratMaster->mandiri, false, 'style="display:none;"')); ?>>
                <label class="col-sm-3 control-label" for="mandiri">Syarat Surat</label>
                <div class="col-sm-7">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th>NO</th>
                                    <th>NAMA DOKUMEN</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                bPaginate: false,
                ajax: "<?php echo e(route('surat_master.syaratsuratdatatables', $suratMaster->id)); ?>",
                columns: [{
                        data: 'ceklist',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'ref_syarat_nama',
                        name: 'ref_syarat_nama',
                        searchable: true,
                        orderable: true
                    },
                ],
                order: [
                    [2, 'asc']
                ]
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan_surat/umum.blade.php ENDPATH**/ ?>