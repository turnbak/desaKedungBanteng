<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
<h1>
    Data Terpadu Kesejahteran Sosial <?php echo e(\App\Enums\Dtks\DtksEnum::VERSION_LIST[\App\Enums\Dtks\DtksEnum::VERSION_CODE]); ?>

</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(route('hom_sid')); ?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">DTKS</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="<?php echo e(route('rtm')); ?>" class="btn btn-social btn-default btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class='fa fa-reply'></i>Kelola Rumah Tangga</a>
            <a href="#" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modal-survey"><i class="fa fa-plus"></i> Data Baru</a>
            <a href="#" id="cetak_terpilih" disabled class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" ><i class="fa fa-print "></i> Cetak Prelist Terpilih</a>
            <a href="<?php echo e(route('dtks/ekspor?versi=' . \App\Enums\Dtks\DtksEnum::VERSION_CODE)); ?>" class="btn btn-social btn-sm bg-navy visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-file"></i> Ekspor ke excel</a>
        </div>
        <div class="box-body">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover nowrap" id="tabeldata">
                        <thead class="bg-gray disabled color-palette">
                            <tr>
                                <th rowspan="2"><input type="checkbox" id="checkall" /></th>
                                <th rowspan="2">No</th>
                                <th rowspan="2" class="padat">Aksi</th>
                                <th colspan="6" class="padat" kolom="3,4,5,6,7,8">Kepala Rumah Tangga</th>
                                <th colspan="2" class="padat" kolom="9 & 10">Kepala Keluarga</th>
                                <th rowspan="2" class="padat">Jumlah <br>Anggota</th>
                                <th rowspan="2">Petugas</th>
                                <th rowspan="2">Responden</th>
                                <th rowspan="2">Versi Kuisioner</th>
                                <th rowspan="2">Terakhir diubah</th>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <th nowrap>Nama</th>
                                <th>Jumlah<br>Keluarga</th>
                                <th kolom="5"><?php echo e(ucwords($setting->sebutan_dusun)); ?></th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>NIK</th>
                                <th nowrap>Nama</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </form>

        </div>
    </div>
    <div class="modal fade" id="modal-survey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Data Baru</h4>
                </div>
                <form data-action="<?php echo e(route('dtks.new')); ?>" id="form-new-dtks" method="POST">
                    <div class="modal-body">
                        <div class="col-sm-12">
                            <div class="box" style="border-top:none">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="id_rtm">NIK / Nama Kepala Rumah Tangga</label>
                                        <select class="form-control input-sm select2 required"  id="id_rtm" name="id_rtm" style="width:100%;">
                                            <option option value="">-- Silakan Cari NIK / Nama Kepala Rumah Tangga--</option>
                                            <?php $__currentLoopData = $rtm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($data->id); ?>">NIK :<?php echo e($data->kepalaKeluarga->nik  . ' - ' . $data->kepalaKeluarga->nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-social btn-info btn-sm" id="ok"><i class='fa fa-check'></i> Simpan</button>
                                </div>
                                <div>
                                    <?php echo $__env->make('admin.dtks.info_new_dtks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-social btn-danger btn-sm pull-left" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-confirm-delete-dtks" style="overflow: scroll;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open('', 'class="" id="form-delete-dtks"'); ?>

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle text-red"></i> Konfirmasi</h4>
                    </div>
                    <div class="modal-body btn-info">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-social btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-sign-out"></i> Tutup</button>
                        <button type="submit" class="btn btn-social btn-danger btn-sm" id="okdelete"><i class="fa fa-trash-o"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-cetak-multi-dtks" style="overflow: scroll;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Proses Cetak</h4>
                </div>
                <?php echo form_open(route('dtks/cetak2'), 'method="POST"'); ?>

                    <div class="modal-body">
                        <p class="alert alert-info">
                            Proses cetak dapat memakan waktu cukup lama dan memerlukan halaman ini untuk tetap terbuka
                        </p>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>NIK</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="download_zip" class="btn btn-sm btn-social btn-primary"><i class="fa fa-check"></i> Hanya cetak file yang sudah siap</button>
                        <button type="button" id="batal_cetak" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-ekspor" style="overflow: scroll;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Proses Cetak</h4>
                </div>
                <?php echo form_open(route('dtks/ekspor'), 'method="GET"'); ?>

                    <div class="modal-body">
                        <select name="versi" class="form-control">
                            <?php $__currentLoopData = App\Enums\Dtks\DtksEnum::VERSION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e($key == 1 ? 'disabled' : ''); ?>><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-sm btn-social btn-primary"><i class="fa fa-check"></i> Ekspor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-impor" style="overflow: scroll;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Proses Impor</h4>
                </div>
                <?php echo form_open(route('dtks/impor'), 'method="GET"'); ?>

                    <div class="modal-body">
                        <select name="versi" class="form-control">
                            <?php $__currentLoopData = App\Enums\Dtks\DtksEnum::VERSION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e($key == 1 ? 'disabled' : ''); ?>><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="impor_info"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-sm btn-social btn-primary"><i class="fa fa-check"></i> Impor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php echo $__env->make('admin.layouts.components.ajax_dtks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    $(document).ready(function () {
        let batal_cetak = false;

        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        // Select2 dengan fitur pencarian karena tidak ngeload /js/custom.select2.js
        $('.select2').select2({
            width: '100%',
            dropdownAutoWidth : true
        });

        var TableData = $('#tabeldata').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('dtks.datatables')); ?>",
            columns: [
                { data: 'ceklist', class: 'padat', searchable: false, orderable: false },
                { data: 'DT_RowIndex', class: 'padat', searchable: false, orderable: false },
                { data: 'aksi', class: 'aksi', searchable: false, orderable: false},
                { data: 'nik_krt', name: 'nik_krt', searchable: true, orderable: true },
                { data: 'nama_krt', name: 'nama_krt', searchable: true, orderable: true },
                { data: 'keluarga_count', name: 'keluarga_count', searchable: false, orderable: true },
                { data: 'dusun', name: 'dusun', searchable: true, orderable: true },
                { data: 'rw', name: 'rw', searchable: true, orderable: true },
                { data: 'rt', name: 'rt', searchable: true, orderable: true },
                { data: 'nik_kk', name: 'nik_kk', searchable: true, orderable: true },
                { data: 'nama_kk', name: 'nama_kk', searchable: true, orderable: true },
                { data: function (data) {
                        if (data.anggota_count != null) {
                            return `<a href="<?php echo e(route('dtks.listAnggota')); ?>/${data.id}" title="Lihat Nama Anggota" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Daftar Anggota">${data.anggota_count}</a>`;
                        }
                    }, name: 'anggota_count', searchable: false, orderable: true },
                { data: 'petugas', name: 'nama_petugas_pencacahan', searchable: true, orderable: true },
                { data: 'responden', name: 'nama_responden', searchable: true, orderable: true },
                { data: 'versi_kuisioner', name: 'versi_kuisioner', searchable: false, orderable: true },
                { data: 'updated_at', name: 'updated_at', searchable: true, orderable: true },
            ],
            order: [[ 3, 'asc' ]],
            language: {
                'url': "<?php echo e(asset('bootstrap/js/dataTables.indonesian.lang')); ?>"
            }
        });

        if (hapus == 0) {
            TableData.column(0).visible(false);
        }

        if (ubah == 0) {
            TableData.column(2).visible(false);
        }
        $('#form-new-dtks').one('submit', function(ev){
            ev.preventDefault();
            let id_rtm = $('#id_rtm').val();
            $('#form-new-dtks').attr('action', $('#form-new-dtks').data('action') + '/' + id_rtm);
            $(this).submit();
        });

        let dtks_id = null;
        $(document).on('click', '.btn-hapus', function(){
            dtks_id = $(this).data('id');
        });
        $('#form-delete-dtks').on('submit', function(ev){
            ev.preventDefault();

            let form = $('#form-delete-dtks').serializeArray();
            ajax_save_dtks("<?php echo e(route('dtks.delete')); ?>" + "/" + dtks_id,
                callback_success = function(data){
                    location.reload();
                },
                callback_fail = function(xhr){
                }
            );
            $('#modal-confirm-delete-dtks').modal('hide');
            $('#tabeldata').DataTable().ajax.reload();

        });

        $('#batal_cetak').on('click', function(){
            batal_cetak = true;
            batal_cetak = true;
        });
        $(document).on('click', 'input[type=checkbox]', function(){
            let checked = [];
            $('input[type=checkbox]:checked').each(function(index, el){
                if(el.value != 'on'){
                    checked.push(el.value);

                    let nik = $(el).parentsUntil('tr').parent().find('td:eq(3)').text();
                    $('#modal-cetak-multi-dtks tbody').append('<tr><td>' + nik + '</td><td id="status_' + el.value + '">Menunggu</td></tr>')
                }
            });

            $('#cetak_terpilih').prop('disabled', checked.length == 0);
            $('#cetak_terpilih').attr('disabled', checked.length == 0);
        });

        $('#cetak_terpilih').on('click', function(ev_cetak_terpilih){
            let checked = [];
            $('#modal-cetak-multi-dtks tbody').empty();
            $('input[type=checkbox]:checked').each(function(index, el){
                if(el.value != 'on'){
                    checked.push(el.value);

                    let nik = $(el).parentsUntil('tr').parent().find('td:eq(3)').text();
                    $('#modal-cetak-multi-dtks tbody').append('<tr><td>' + nik + '</td><td id="status_' + el.value + '">Menunggu</td></tr>')
                }
            });
            if(checked.length == 0) {
                return;
            }

            $('#modal-cetak-multi-dtks').modal();

            function ubah_status_file(list){
                list.forEach(element => {
                    if(element.status_file == 0){
                        $(document).find('#status_' + element.id).text('Menunggu');
                    }else{
                        $(document).find('#status_' + element.id).html('<input type="hidden" name="id[]" value="' + element.id + '">Selesai')
                    }
                });
            }

            let callback_fail = function(xhr){
            };
            let callback_success = function(data){
                if(data.message == 'Mengunduh 1 data'){
                    window.open(data.href, '_blank');
                    $(this).prop('disabled', false);
                    $('#modal-cetak-multi-dtks').modal('hide');
                }else if(data.message == 'Proses Data' && ! batal_cetak){
                    ubah_status_file(data.list);
                    ajax_save_dtks("<?php echo e(route('dtks/cetak2')); ?>", {id : checked},
                        callback_success,
                        callback_fail
                    );
                }else if(! batal_cetak) {
                    ubah_status_file(data.list);
                    $('#download_zip').trigger('click');
                }
            };

            batal_cetak = false;
            ajax_save_dtks("<?php echo e(route('dtks/cetak2')); ?>", {id : checked},
                callback_success,
                callback_fail
            );
            //
        });
        $('#modal-impor').on('show.bs.modal', function(){
            $('#impor_info').empty();
            $('#impor_info').load("<?=route('dtks/loadRecentImpor')?>");
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/dtks/index.blade.php ENDPATH**/ ?>