<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



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

    <?php echo form_open($formAction, 'id="validasi" enctype="multipart/form-data"'); ?>

    <input type="hidden" id="id_surat" value="<?php echo e($suratMaster->id); ?>">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="tabs">
            <li class="active"><a href="#pengaturan-umum" data-toggle="tab">Umum</a></li>
            <li><a href="#template-surat" data-toggle="tab">Template</a></li>
            <li><a href="#form-isian" data-toggle="tab">Form Isian</a></li>
        </ul>
        <div class="tab-content">

            <?php echo $__env->make('admin.pengaturan_surat.umum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(in_array($suratMaster->jenis, [1, 2])): ?>
                <?php echo $__env->make('admin.pengaturan_surat.rtf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('admin.pengaturan_surat.tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
                <?php if(in_array($suratMaster->jenis, [1, 2])): ?>
                    <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>Simpan</button>
                <?php else: ?>
                    <button type="submit" name="action" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>Simpan</button>
                    <button id="preview" name="action" value="preview" class="btn btn-social btn-info btn-sm pull-right" style="margin: 0 8px"><i class="fa fa-eye"></i>Lihat hasil surat</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </form>

    <?php echo $__env->make('admin.pengaturan_surat.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            syarat($('input[name=mandiri]:checked').val());
            $('input[name="mandiri"]').change(function() {
                syarat($(this).val());
            });

            $('#preview').click(function() {
                $("#validasi").submit(function() {
                    $("#validasi").attr('target', '_blank');
                    return true;
                });
            });
        });

        function masaBerlaku() {
            var masa_berlaku = $('#masa_berlaku').val();
            if (masa_berlaku < 0) {
                $('#masa_berlaku').val(0);
            } else if (masa_berlaku > 31) {
                $('#masa_berlaku').val(31);
            }
        }

        function syarat(tipe) {
            (tipe == '1' || tipe == null) ? $('#syarat').show(): $('#syarat').hide();
        }

        function reset_form() {
            var mandiri = "<?php echo e($surat_master['mandiri']); ?>";

            $(".tipe").removeClass("active");
            $("input[name=mandiri").prop("checked", false);
            if (mandiri) {
                $("#m1").addClass('active');
                $("#n1").addClass('active');
                $("#o1").addClass('active');
                $("#g1").prop("checked", true);
                $("#q1").prop("checked", true);
                $("#bg1").prop("checked", true);
            } else {
                $("#m2").addClass('active');
                $("#n2").addClass('active');
                $("#o2").addClass('active');
                $("#g2").prop("checked", true);
                $("#q2").prop("checked", true);
                $("#bg2").prop("checked", true);
            }
            syarat($('input[name=mandiri]:checked').val());
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan_surat/form.blade.php ENDPATH**/ ?>