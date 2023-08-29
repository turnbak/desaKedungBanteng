<?php if(session('success')): ?>
<div id="notifikasi" class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-check"></i> Berhasil</h4>
  <p><?php echo session('success'); ?></p>
</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div id="notifikasi" class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-ban"></i> Gagal</h4>
  <p><?php echo session('error'); ?></p>
</div>
<?php endif; ?>

<?php if(session('warning')): ?>
<div id="notifikasi" class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-warning"></i> Peringatan</h4>
  <p><?php echo session('warning'); ?></p>
</div>
<?php endif; ?>

<?php if(session('information')): ?>
<div id="notifikasi" class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-info"></i> Informasi</h4>
  <p><?php echo session('information'); ?></p>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/layouts/components/notifikasi.blade.php ENDPATH**/ ?>