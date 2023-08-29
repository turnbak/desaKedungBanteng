<div class="tab-pane" id="template-surat">

    <?php echo $__env->make('admin.pengaturan_surat.kembali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box-body">
        <div>
            <?php if(can('u')): ?>
                <input type="text" class="hidden" name="url_surat" value="<?php echo e($suratMaster->url_surat); ?>" />
                <label class="control-label" for="nama">Unggah Template Format Surat</label>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="file_path" name="surat">
                    <input type="file" class="hidden" id="file" name="surat">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info" id="file_browser"><i
                                class="fa fa-search"></i>&nbsp;Browse</button>
                        <?php if($suratMaster->url_surat_sistem): ?>
                            <a href="<?php echo e(base_url($suratMaster->url_surat_sistem)); ?>" class="btn btn-success" title="Unduh Template Sistem"
                                target="_blank"><i class="fa fa-download"></i>&nbsp;Template Sistem</a>
                        <?php endif; ?>
                        <?php if($suratMaster->url_surat_desa): ?>
                            <a href="<?php echo e(base_url($suratMaster->url_surat_desa)); ?>" class="btn btn-warning" title="<?php echo e(SebutanDesa('Unduh Template [Desa]')); ?> "
                                target="_blank"><i class="fa fa-download"></i>&nbsp;<?php echo e(SebutanDesa('Template [Desa]')); ?> </a>
                        <?php endif; ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="tab-pane" id="form-isian">

    <?php echo $__env->make('admin.pengaturan_surat.kembali', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box-body">
        <h5><i class="fa fa-info-circle"></i> <strong>Kode Isian Format Surat <?php echo e($suratMaster->nama); ?></strong></h5>
        <hr>
        <div class="row">
            <div class="col-sm-7">
                <p>
                    Kode isian pada tabel di bawah dapat dimasukkan ke dalam template/Format RTF Ekspor Dok untuk jenis
                    surat ini.
                </p>
                <p>
                    Pada waktu mencetak surat Ekspor Dok memakai template itu, kode isian di bawah akan diganti dengan
                    data yang diisi pada form isian untuk jenis surat ini.
                </p>
            </div>
            <div class="col-sm-5">
                <table class="table table-bordered table-hover">
                    <thead class="bg-gray disabled color-palette">
                        <tr>
                            <th>KODE</th>
                            <th>DATA DI FORM ISIAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $suratMaster->kode_isian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kode => $keterangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td style="padding-top : 10px;padding-bottom : 10px; ">[form_<?php echo e($kode); ?>]</td>
                                <td><?php echo e($keterangan); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="padat" colspan="2">Data tidak tersedia</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan_surat/rtf.blade.php ENDPATH**/ ?>