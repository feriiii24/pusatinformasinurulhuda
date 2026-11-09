<!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="#" >
        <img src="<?php echo e(asset('landing/images/logo/pinha.svg')); ?>" alt="logo"style="width: 125px;" />
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>

        <li class="nav-item nav-item-has-children">
          <a href="<?php echo e(route('dashboard')); ?>" data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
            aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Dashboard</span>
          </a>
          <ul id="ddmenu_1" class="collapse show dropdown-nav">
            <li>
              <a href="<?php echo e(route('dashboard')); ?>" class="active"> Halaman Utama </a>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-item-has-children">
          <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_55" aria-controls="ddmenu_55"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M3.33334 3.35442C3.33334 2.4223 4.07954 1.66666 5.00001 1.66666H15C15.9205 1.66666 16.6667 2.4223 16.6667 3.35442V16.8565C16.6667 17.5519 15.8827 17.9489 15.3333 17.5317L13.8333 16.3924C13.537 16.1673 13.1297 16.1673 12.8333 16.3924L10.5 18.1646C10.2037 18.3896 9.79634 18.3896 9.50001 18.1646L7.16668 16.3924C6.87038 16.1673 6.46298 16.1673 6.16668 16.3924L4.66668 17.5317C4.11731 17.9489 3.33334 17.5519 3.33334 16.8565V3.35442ZM4.79168 5.04218C4.79168 5.39173 5.0715 5.6751 5.41668 5.6751H10C10.3452 5.6751 10.625 5.39173 10.625 5.04218C10.625 4.69264 10.3452 4.40927 10 4.40927H5.41668C5.0715 4.40927 4.79168 4.69264 4.79168 5.04218ZM5.41668 7.7848C5.0715 7.7848 4.79168 8.06817 4.79168 8.41774C4.79168 8.76724 5.0715 9.05066 5.41668 9.05066H10C10.3452 9.05066 10.625 8.76724 10.625 8.41774C10.625 8.06817 10.3452 7.7848 10 7.7848H5.41668ZM4.79168 11.7932C4.79168 12.1428 5.0715 12.4262 5.41668 12.4262H10C10.3452 12.4262 10.625 12.1428 10.625 11.7932C10.625 11.4437 10.3452 11.1603 10 11.1603H5.41668C5.0715 11.1603 4.79168 11.4437 4.79168 11.7932ZM13.3333 4.40927C12.9882 4.40927 12.7083 4.69264 12.7083 5.04218C12.7083 5.39173 12.9882 5.6751 13.3333 5.6751H14.5833C14.9285 5.6751 15.2083 5.39173 15.2083 5.04218C15.2083 4.69264 14.9285 4.40927 14.5833 4.40927H13.3333ZM12.7083 8.41774C12.7083 8.76724 12.9882 9.05066 13.3333 9.05066H14.5833C14.9285 9.05066 15.2083 8.76724 15.2083 8.41774C15.2083 8.06817 14.9285 7.7848 14.5833 7.7848H13.3333C12.9882 7.7848 12.7083 8.06817 12.7083 8.41774ZM13.3333 11.1603C12.9882 11.1603 12.7083 11.4437 12.7083 11.7932C12.7083 12.1428 12.9882 12.4262 13.3333 12.4262H14.5833C14.9285 12.4262 15.2083 12.1428 15.2083 11.7932C15.2083 11.4437 14.9285 11.1603 14.5833 11.1603H13.3333Z" />
              </svg>
            </span>
            <span class="text"> Informasi </span>
          </a>
          <ul id="ddmenu_55" class="collapse dropdown-nav">
            <li>
              <a href="<?php echo e(route('dashboard.informasiumum')); ?>"> Umum </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.informasitertutup')); ?>"> Tertutup </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.informasiakademik')); ?>"> Akademik </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.informasiadministrasi')); ?>"> Administrasi </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.penasantri')); ?>"> Pena Santri </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.informasikegiatan')); ?>"> Kegiatan </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.informasidokumen')); ?>"> Dokumen </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.informasimasyarakat')); ?>"> Masyarakat </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M3.33334 3.35442C3.33334 2.4223 4.07954 1.66666 5.00001 1.66666H15C15.9205 1.66666 16.6667 2.4223 16.6667 3.35442V16.8565C16.6667 17.5519 15.8827 17.9489 15.3333 17.5317L13.8333 16.3924C13.537 16.1673 13.1297 16.1673 12.8333 16.3924L10.5 18.1646C10.2037 18.3896 9.79634 18.3896 9.50001 18.1646L7.16668 16.3924C6.87038 16.1673 6.46298 16.1673 6.16668 16.3924L4.66668 17.5317C4.11731 17.9489 3.33334 17.5519 3.33334 16.8565V3.35442ZM4.79168 5.04218C4.79168 5.39173 5.0715 5.6751 5.41668 5.6751H10C10.3452 5.6751 10.625 5.39173 10.625 5.04218C10.625 4.69264 10.3452 4.40927 10 4.40927H5.41668C5.0715 4.40927 4.79168 4.69264 4.79168 5.04218ZM5.41668 7.7848C5.0715 7.7848 4.79168 8.06817 4.79168 8.41774C4.79168 8.76724 5.0715 9.05066 5.41668 9.05066H10C10.3452 9.05066 10.625 8.76724 10.625 8.41774C10.625 8.06817 10.3452 7.7848 10 7.7848H5.41668ZM4.79168 11.7932C4.79168 12.1428 5.0715 12.4262 5.41668 12.4262H10C10.3452 12.4262 10.625 12.1428 10.625 11.7932C10.625 11.4437 10.3452 11.1603 10 11.1603H5.41668C5.0715 11.1603 4.79168 11.4437 4.79168 11.7932ZM13.3333 4.40927C12.9882 4.40927 12.7083 4.69264 12.7083 5.04218C12.7083 5.39173 12.9882 5.6751 13.3333 5.6751H14.5833C14.9285 5.6751 15.2083 5.39173 15.2083 5.04218C15.2083 4.69264 14.9285 4.40927 14.5833 4.40927H13.3333ZM12.7083 8.41774C12.7083 8.76724 12.9882 9.05066 13.3333 9.05066H14.5833C14.9285 9.05066 15.2083 8.76724 15.2083 8.41774C15.2083 8.06817 14.9285 7.7848 14.5833 7.7848H13.3333C12.9882 7.7848 12.7083 8.06817 12.7083 8.41774ZM13.3333 11.1603C12.9882 11.1603 12.7083 11.4437 12.7083 11.7932C12.7083 12.1428 12.9882 12.4262 13.3333 12.4262H14.5833C14.9285 12.4262 15.2083 12.1428 15.2083 11.7932C15.2083 11.4437 14.9285 11.1603 14.5833 11.1603H13.3333Z" />
              </svg>
            </span>
            <span class="text">Bahan Blank</span>
          </a>
        </li>

        <span class="divider">
          <hr />
        </span>

        <li class="nav-item nav-item-has-children">
          <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1.66666 5.41669C1.66666 3.34562 3.34559 1.66669 5.41666 1.66669C7.48772 1.66669 9.16666 3.34562 9.16666 5.41669C9.16666 7.48775 7.48772 9.16669 5.41666 9.16669C3.34559 9.16669 1.66666 7.48775 1.66666 5.41669Z" />
                <path
                  d="M1.66666 14.5834C1.66666 12.5123 3.34559 10.8334 5.41666 10.8334C7.48772 10.8334 9.16666 12.5123 9.16666 14.5834C9.16666 16.6545 7.48772 18.3334 5.41666 18.3334C3.34559 18.3334 1.66666 16.6545 1.66666 14.5834Z" />
                <path
                  d="M10.8333 5.41669C10.8333 3.34562 12.5123 1.66669 14.5833 1.66669C16.6544 1.66669 18.3333 3.34562 18.3333 5.41669C18.3333 7.48775 16.6544 9.16669 14.5833 9.16669C12.5123 9.16669 10.8333 7.48775 10.8333 5.41669Z" />
                <path
                  d="M10.8333 14.5834C10.8333 12.5123 12.5123 10.8334 14.5833 10.8334C16.6544 10.8334 18.3333 12.5123 18.3333 14.5834C18.3333 16.6545 16.6544 18.3334 14.5833 18.3334C12.5123 18.3334 10.8333 16.6545 10.8333 14.5834Z" />
              </svg>
            </span>
            <span class="text">Kelola Informasi </span>
          </a>
          <ul id="ddmenu_4" class="collapse dropdown-nav">
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.kelolainformasiUmum')); ?>"> Umum </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.kelolainformasiTertutup')); ?>"> Tertutup </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.kelolainformasiakademik')); ?>"> Akademik </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.administrasi')); ?>"> Administrasi </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.kelolainformasiPenasantri')); ?>"> Pena Santri </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.kelolainformasikegiatan')); ?>"> kegiatan </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.kelolainformasidokumen')); ?>"> Dokumen </a>
            </li>
            <li>
              <a href="<?php echo e(route('dashboard.kelolainformasi.kelolainformasimasyarakat')); ?>"> Masyarakat </a>
            </li>
          </ul>
        </li>

        <?php
          $showUsersLink = true;
          $u = auth()->user();
          if ($u && optional($u->role)->name) {
              $rn = strtolower(optional($u->role)->name);
              if ($rn === 'user umum' || $rn === 'user_umum' || $rn === 'user') {
                  $showUsersLink = false;
              }
          }
        ?>

        <?php if($showUsersLink): ?>
        <li class="nav-item">
          <a href="<?php echo e(route('dashboard.kelolapengguna')); ?>">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                <path d="M2 18C2 14 6 12 10 12C14 12 18 14 18 18" stroke="currentColor" stroke-width="1.5" />
              </svg>
            </span>
            <span class="text">kelola Pengguna</span>
          </a>
        </li>
        <?php endif; ?>
        <?php
          // determine if current user can see kelola Unit
          $u = auth()->user();
          $showUnitLink = false;
          if ($u && optional($u->role)->name) {
              $rn = strtolower(optional($u->role)->name);
              if (in_array($rn, ['admin unit','admin_unit','adminunit','admin yayasan','admin_yayasan','adminyayasan','super admin','super_admin','superadmin'])) {
                  $showUnitLink = true;
              }
          }
        ?>

        <?php if($showUnitLink): ?>
        <li class="nav-item">
          <a href="<?php echo e(route('dashboard.kelolaunit')); ?>">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="8" width="18" height="13" stroke="currentColor" stroke-width="1.5" />
                <rect x="6" y="11" width="3" height="3" fill="currentColor" />
                <rect x="15" y="11" width="3" height="3" fill="currentColor" />
                <rect x="6" y="16" width="3" height="3" fill="currentColor" />
                <rect x="15" y="16" width="3" height="3" fill="currentColor" />
                <path d="M12 8V4" stroke="currentColor" stroke-width="1.5" />
                <path d="M9 4H15V8H9V4Z" stroke="currentColor" stroke-width="1.5" />
              </svg>

            </span>
            <span class="text">kelola Unit</span>
          </a>
        </li>
        <?php endif; ?>
        <?php
          $u = auth()->user();
          $showRoleLink = false;
          if ($u && optional($u->role)->name) {
              $rn = strtolower(optional($u->role)->name);
              if (in_array($rn, ['admin yayasan', 'admin_yayasan', 'adminyayasan', 'super admin', 'super_admin', 'superadmin'])) {
                  $showRoleLink = true;
              }
          }
        ?>

        <?php if($showRoleLink): ?>
        <li class="nav-item">
          <a href="<?php echo e(route('dashboard.kelolarole')); ?>">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 1L3 4V10C3 14 6 18 10 19C14 18 17 14 17 10V4L10 1Z" stroke="currentColor"
                  stroke-width="1.5" />
              </svg>
            </span>
            <span class="text">kelola Role</span>
          </a>
        </li>
        <?php endif; ?>

        <span class="divider">
          <hr />
        </span>

        <li class="nav-item">
          <a href="notification.html">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10.8333 2.50008C10.8333 2.03984 10.4602 1.66675 9.99999 1.66675C9.53975 1.66675 9.16666 2.03984 9.16666 2.50008C9.16666 2.96032 9.53975 3.33341 9.99999 3.33341C10.4602 3.33341 10.8333 2.96032 10.8333 2.50008Z" />
                <path
                  d="M17.5 5.41673C17.5 7.02756 16.1942 8.33339 14.5833 8.33339C12.9725 8.33339 11.6667 7.02756 11.6667 5.41673C11.6667 3.80589 12.9725 2.50006 14.5833 2.50006C16.1942 2.50006 17.5 3.80589 17.5 5.41673Z" />
                <path
                  d="M11.4272 2.69637C10.9734 2.56848 10.4947 2.50006 10 2.50006C7.10054 2.50006 4.75003 4.85057 4.75003 7.75006V9.20873C4.75003 9.72814 4.62082 10.2393 4.37404 10.6963L3.36705 12.5611C2.89938 13.4272 3.26806 14.5081 4.16749 14.9078C7.88074 16.5581 12.1193 16.5581 15.8326 14.9078C16.732 14.5081 17.1007 13.4272 16.633 12.5611L15.626 10.6963C15.43 10.3333 15.3081 9.93606 15.2663 9.52773C15.0441 9.56431 14.8159 9.58339 14.5833 9.58339C12.2822 9.58339 10.4167 7.71791 10.4167 5.41673C10.4167 4.37705 10.7975 3.42631 11.4272 2.69637Z" />
                <path
                  d="M7.48901 17.1925C8.10004 17.8918 8.99841 18.3335 10 18.3335C11.0016 18.3335 11.9 17.8918 12.511 17.1925C10.8482 17.4634 9.15183 17.4634 7.48901 17.1925Z" />
              </svg>
            </span>
            <span class="text">Notifications</span>
          </a>
        </li>
      </ul>
    </nav>
  </aside>
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== --><?php /**PATH C:\Users\Danir\pinha\resources\views\dashboard\partials\sidebar.blade.php ENDPATH**/ ?>