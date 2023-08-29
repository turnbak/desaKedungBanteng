<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
<h1>
  Hubung Warga
  <small>Kirim Pesan Grup</small>
</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('sms')); ?>">Hubung Warga</a></li>
<li class="active">Kirim Pesan Grup</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
  <div class="col-md-3">
    <?php echo $__env->make('admin.sms.navigasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
  <div class="col-md-9">
    <div class="box box-info">
      <div class="box-header with-border">
        <a href="<?php echo e(route('sms/arsip')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
          <i class="fa fa-arrow-circle-left "></i>Kembali ke Hubung Warga
        </a>
      </div>
      <?php echo form_open($formAction, 'id="validasi"'); ?>

        <div class="box-body">
          <div class="form-group">
            <label for="nama">Grup Kontak</label>
            <select class="form-control input-sm select2 required"  id="id_grup" name="id_grup">
              <option value="">Pilih Grup Kontak</option>
              <?php $__currentLoopData = $grupKontak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($grup->id_grup); ?>"><?php echo e($grup->nama_grup); ?> ( <?php echo e($grup->anggota_count); ?> Anggota )</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Subjek Pesan</label>
            <input name="subjek" class="form-control input-sm required" placeholder="Subjek Pesan" maxlength="100"/>
          </div>
          <div class="form-group">
            <label for="isi">Isi Pesan</label>
            <textarea name="isi" class="form-control input-sm required" placeholder="Isi Pesan" rows="5"></textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
          <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
  $(document).ready(function () {
    $('.select2').select2();
  });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/sms/hubung_warga/form.blade.php ENDPATH**/ ?>