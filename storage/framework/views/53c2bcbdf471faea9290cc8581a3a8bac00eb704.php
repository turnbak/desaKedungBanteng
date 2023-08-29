<div class="col-md-3 col-lg-3">
    <div class="box box-info">
        <div class="box-body no-padding">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li class="<?= ($navigasi === 'posyandu') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting')); ?>">Posyandu</a></li>
                </ul>
                <ul class="nav nav-stacked">
                    <li class="<?= ($navigasi === 'kia') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting/kia')); ?>">Kesehatan Ibu dan Anak (KIA)</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Pemantauan</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body no-padding">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li class="<?= ($navigasi === 'pemantauan-bulanan-ibu-hamil') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting/pemantauan_ibu_hamil')); ?>">Bulanan
                            Ibu Hamil</a></li>
                    <li class="<?= ($navigasi === 'pemantauan-bulanan-anak') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting/pemantauan_anak')); ?>">Bulanan Anak 0-2
                            Tahun</a></li>
                    <li class="<?= ($navigasi === 'pemantauan-sasaran-paud') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting/pemantauan_paud')); ?>">Sasaran Paud Anak
                            2-6 tahun</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Rekapitulasi</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body no-padding">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li class="<?= ($navigasi === 'rekapitulasi-hasil-pemantauan-ibu-hamil') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting/rekapitulasi_ibu_hamil')); ?>">3
                            Bulanan Ibu Hamil</a></li>
                    <li class="<?= ($navigasi === 'rekapitulasi-hasil-pemantauan-anak') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting/rekapitulasi_bulanan_anak')); ?>">3
                            Bulanan Anak 0-2 Tahun</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box box-info">
        <div class="box-body no-padding">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li class="<?= ($navigasi === 'scorcard-konvergensi') ? 'active' : ''; ?>"><a href="<?php echo e(site_url('stunting/scorecard_konvergensi')); ?>">Scorecard
                            Konvergensi</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/stunting/navigasi.blade.php ENDPATH**/ ?>