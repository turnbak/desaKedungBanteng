<?php if($kategori && can('u', $controller)): ?>
<div class="modal fade" id="pengaturan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"> Pengaturan <?php echo e(ucwords($kategori)); ?></h4>
      </div>
      
      <?php echo $__env->make('admin.pengaturan.modal_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
  </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan/pengaturan_modal.blade.php ENDPATH**/ ?>