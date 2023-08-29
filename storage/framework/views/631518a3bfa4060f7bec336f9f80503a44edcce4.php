<header class="main-header">
  <a href="<?php echo e(route('/')); ?>" target="_blank" class="logo">
    <span class="logo-mini"><b>SID</b></span>
    <span class="logo-lg"><b>OpenSID</b></span>
  </a>

  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <?php if($is_mobile = $ci->agent->is_mobile()): ?>
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Selengkapnya...</a>
          <ul class="dropdown-menu">
            <li>
              <ul class="menu">
        <?php endif; ?>
        <?php if($notif['langganan']): ?>
          <li>
            <a href="<?php echo e(route('pelanggan')); ?>">
              <i class="fa <?php echo e($notif['langganan']['ikon']); ?> fa-lg" title="Status Langganan <?php echo e($notif['langganan']['masa']); ?> hari" style="color: <?php echo e($notif['langganan']['warna']); ?>"></i>&nbsp;
              <?php if($notif['langganan']['status'] > 2): ?>
                <span class="badge" id="b_langganan"></span>
              <?php endif; ?>
              <?php if($is_mobile): ?>
                <span>Status Langganan</span>
              <?php endif; ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if(in_array('343', array_column($modul, 'id')) && can('b', 'opendk_pesan')): ?>
          <li class="komunikasi-opendk">
            <a href="<?php echo e(route('opendk_pesan.clear')); ?>">
              <i class="fa fa-university fa-lg" title="Komunikasi OpenDK"></i>&nbsp;
              <?php if($notif['opendkpesan']): ?>
                <span class="badge" id="b_opendkpesan"><?php echo e($notif['opendkpesan']); ?></span>
              <?php endif; ?>
              <?php if($is_mobile): ?>
                <span>Komunikasi OpenDK</span>
              <?php endif; ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if(can('b', 'permohonan_surat_admin')): ?>
          <li>
            <a href="<?php echo e(route('permohonan_surat_admin')); ?>">
              <i class="fa fa-print fa-lg" title="Cetak Surat"></i>&nbsp;
              <?php if($notif['surat']): ?>
                <span class="badge" id="b_permohonan_surat"><?php echo e($notif['surat']); ?></span>
              <?php endif; ?>
              <?php if($is_mobile): ?>
                <span>Cetak Surat</span>
              <?php endif; ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if(can('b', 'komentar')): ?>
          <li>
            <a href="<?php echo e(route('komentar')); ?>">
              <i class="fa fa-commenting-o fa-lg" title="Komentar"></i>&nbsp;
              <?php if($notif['komentar']): ?>
                <span class="badge" id="b_komentar"><?php echo e($notif['komentar']); ?></span>
              <?php endif; ?>
              <?php if($is_mobile): ?>
                <span>Komentar</span>
              <?php endif; ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if(can('b', 'mailbox')): ?>
          <li>
            <a href="<?php echo e(route('mailbox')); ?>">
              <i class="fa fa-envelope-o fa-lg" title="Pesan Masuk"></i>&nbsp;
              <?php if($notif['inbox']): ?>
                <span class="badge" id="b_inbox"><?php echo e($notif['inbox']); ?></span>
              <?php endif; ?>
              <?php if($is_mobile): ?>
                <span>Pesan Masuk</span>
              <?php endif; ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if(can('b', 'keluar') && (setting('verifikasi_kades') || setting('verifikasi_sekdes'))): ?>
          <li>
            <a href="<?php echo e(route('keluar.clear.masuk')); ?>">
              <span><i class="fa fa-bell-o fa-lg" title="Permohonan Surat"></i>&nbsp;</span>
              <?php if($notif['permohonansurat']): ?>
                <span class="badge" id="permohonan"><?php echo e($notif['permohonansurat']); ?></span>
              <?php endif; ?>
              <?php if($is_mobile): ?>
                <span>Permohonan Surat</span>
              <?php endif; ?>
            </a>
          </li>
        <?php endif; ?>
        <?php if($ci->agent->is_mobile()): ?>
              </ul>
            </li>
          </ul>
        </li>
        <?php endif; ?>

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo e(AmbilFoto($auth->foto)); ?>" class="user-image" alt="User Image"/>
            <span class="hidden-xs"><?php echo e($auth->nama); ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo e(AmbilFoto($auth->foto)); ?>" class="img-circle" alt="User Image"/>
              <p>
                <small>Anda Masuk Sebagai</small>
                <?php echo e($auth->nama); ?>

              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#"  class="btn bg-maroon btn-sm" data-remote="false" data-toggle="modal" data-target="#profil_pengguna">Profil</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo e(route('siteman.logout')); ?>" class="btn bg-maroon btn-sm">Keluar</a>
              </div>
            </li>
          </ul>
          <li>
            <a href="#" data-toggle="control-sidebar" title="Informasi"><i class="fa fa-question-circle fa-lg"></i></a>
          </li>
          <?php if($kategori && can('u', $controller)): ?>
          <li>
            <a href="#" data-remote="false" data-toggle="modal" data-target="#pengaturan">
              <span><i class="fa fa-gear"></i>&nbsp;</span>
            </a>
          </li>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/layouts/partials/header.blade.php ENDPATH**/ ?>