<?php $__currentLoopData = $list_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pengaturan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($pengaturan->jenis != 'upload' && in_array($pengaturan->kategori, $pengaturan_kategori)): ?>
        <div class="form-group" id="form_<?php echo e($pengaturan->key); ?>">
            <label class="col-sm-12 col-md-3" for="nama"><?php echo e($pengaturan->judul); ?></label>
            <?php if($pengaturan->jenis == 'option' || $pengaturan->jenis == 'boolean'): ?>
                <div class="col-sm-12 col-md-4">
                    <select <?php echo $pengaturan->attribute
                        ? str_replace('class="', 'class="form-control input-sm select2 required ', $pengaturan->attribute)
                        : 'class="form-control input-sm select2 required"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>">
                        <?php $__currentLoopData = $pengaturan->option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?= ($pengaturan->value == $key) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php elseif($pengaturan->jenis == 'datetime'): ?>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input <?php echo $pengaturan->attribute
                            ? str_replace('class="', 'class="form-control input-sm pull-right tgl_1 ', $pengaturan->attribute)
                            : 'class="form-control input-sm pull-right tgl_1"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>"
                            type="text" value="<?php echo e($pengaturan->value); ?>">
                    </div>
                </div>
            <?php elseif($pengaturan->jenis == 'textarea'): ?>
                <div class="col-sm-12 col-md-4">
                    <textarea <?php echo $pengaturan->attribute
                        ? str_replace('class="', 'class="form-control input-sm ', $pengaturan->attribute)
                        : 'class="form-control input-sm"'; ?> name="<?php echo e($pengaturan->key); ?>" placeholder="<?php echo e($pengaturan->keterangan); ?>"
                        rows="7"><?php echo e($pengaturan->value); ?> </textarea>
                </div>
            <?php else: ?>
                <div class="col-sm-12 col-md-4">
                    <input <?php echo $pengaturan->attribute
                        ? str_replace('class="', 'class="form-control input-sm ', $pengaturan->attribute)
                        : 'class="form-control input-sm"'; ?> id="<?php echo e($pengaturan->key); ?>" name="<?php echo e($pengaturan->key); ?>"
                        type="text" value="<?php echo e($pengaturan->value); ?>" />
                </div>
            <?php endif; ?>
            <label class="col-sm-12 col-md-5 pull-left" for="nama"><?php echo $pengaturan->keterangan; ?></label>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan/form.blade.php ENDPATH**/ ?>