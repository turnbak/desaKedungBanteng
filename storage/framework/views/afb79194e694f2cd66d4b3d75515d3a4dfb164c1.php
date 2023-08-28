<?php echo form_open_multipart(route('setting.new_update'), 'class="form-group" id="main_setting"'); ?>

<div class="modal-body">
    <?php $__currentLoopData = $list_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pengaturan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($pengaturan->jenis != 'upload' && $pengaturan->kategori == $kategori): ?>
            <div class="form-group" id="form_<?php echo e($pengaturan->key); ?>">
                <label><?php echo e($pengaturan->judul); ?></label>
                <?php if($pengaturan->jenis == 'option' || $pengaturan->jenis == 'boolean'): ?>
                    <select <?php echo $pengaturan->attribute
                        ? str_replace('class="', 'class="form-control input-sm select2 required ', $pengaturan->attribute)
                        : 'class="form-control input-sm select2 required"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>">
                        <?php $__currentLoopData = $pengaturan->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($pengaturan->value == $key) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <?php elseif($pengaturan->jenis == 'datetime'): ?>
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input <?php echo $pengaturan->attribute
                            ? str_replace('class="', 'class="form-control input-sm pull-right tgl_1 ', $pengaturan->attribute)
                            : 'class="form-control input-sm pull-right tgl_1"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>"
                            type="text" value="<?php echo e($pengaturan->value); ?>">
                    </div>
                <?php elseif($pengaturan->jenis == 'unggah'): ?>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" id="file_path"
                            name="<?php echo e($pengaturan->key); ?>">
                        <input type="file" class="hidden" id="file" name="<?php echo e($pengaturan->key); ?>">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-sm" id="file_browser"><i
                                    class="fa fa-search"></i>&nbsp;</button>
                            <a href="<?php echo e(file_exists(FCPATH . $pengaturan->value) ? asset($pengaturan->value, false) : asset('images/kehadiran/bg.jpg')); ?>"
                                class="btn btn-danger btn-sm" title="Lihat Gambar" target="_blank"><i
                                    class="fa fa-eye"></i>&nbsp;</a>
                        </span>
                    </div>
                <?php elseif($pengaturan->jenis == 'textarea'): ?>
                    <textarea <?php echo $pengaturan->attribute
                        ? str_replace('class="', 'class="form-control input-sm ', $pengaturan->attribute)
                        : 'class="form-control input-sm"'; ?> name="<?php echo e($pengaturan->key); ?>" placeholder="<?php echo e($pengaturan->keterangan); ?>"
                        rows="5"><?php echo e($pengaturan->value); ?></textarea>
                <?php else: ?>
                    <input <?php echo $pengaturan->attribute
                        ? str_replace('class="', 'class="form-control input-sm ', $pengaturan->attribute)
                        : 'class="form-control input-sm"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>"
                        type="text" value="<?php echo e($pengaturan->value); ?>" />
                <?php endif; ?>
                <label><code><?php echo $pengaturan->keterangan; ?></code></label>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<div class="modal-footer">
    <button type="reset" class="btn btn-social btn-danger btn-sm pull-left" data-dismiss="modal"><i
            class="fa fa-times"></i> Tutup</button>
    <button type="submit" class="btn btn-social btn-info btn-sm"><i class="fa fa-check"></i> Simpan</button>
</div>
</form>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/validasi.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $("#main_setting").validate();
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan/modal_form.blade.php ENDPATH**/ ?>