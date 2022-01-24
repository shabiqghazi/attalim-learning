<div class="col-md-3 p-0 m-0">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height:100vh">
    <div class="mx-3 row">
      <div class="col-3 d-flex align-items-center">
        <i class="bi me-2 fas fa-chalkboard-teacher fs-1" width="40" height="32"></i>
      </div>
      <div class="col-9">
        <p class="fs-4 title-font my-0">At-Ta'lim</p>
        <small class="subtitle-font">Online class</small>
      </div>
    </div>
    <hr />
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item mb-2 rounded <?= $title == "Home" ? 'active' : '' ?>">
        <a href="<?= base_url() . ($this->session->userdata('role_id') == 1 ? 'guru' : ($this->session->userdata('role_id') == 2 ? 'siswa' : 'admin')) . '/home' ?>" class="nav-link text-white">
          <i class="fas fa-fw fa-home bi me-2" width="16" height="16"></i>
          Home
        </a>
      </li>
      <?php if ($this->session->userdata('role_id') != 3) : ?>
        <li class="nav-item mb-2 rounded <?= $title == "Tugas" ? 'active' : '' ?>">
          <a href="<?= base_url() . ($this->session->userdata('role_id') == 1 ? 'guru' : 'siswa') . '/tugas' ?>" class="nav-link text-white">
            <i class="fas fa-fw fa-tasks bi me-2" width="16" height="16"></i>
            Tugas
          </a>
        </li>
        <li class="nav-item mb-2 rounded <?= $title == "Materi" ? 'active' : '' ?>">
          <a href="<?= base_url() . ($this->session->userdata('role_id') == 1 ? 'guru' : 'siswa') . '/materi' ?>" class="nav-link text-white">
            <i class="fas fa-fw fa-book bi me-2" width="16" height="16"></i>
            Materi
          </a>
        </li>
        <?php if ($this->session->userdata('role_id') != 1) : ?>
          <li class="nav-item mb-2 rounded <?= $title == "Mata Pelajaran" ? 'active' : '' ?>">
            <a href="<?= base_url() . ($this->session->userdata('role_id') == 1 ? 'guru' : 'siswa') . '/mapel' ?>" class="nav-link text-white">
              <i class="fas fa-fw fa-sticky-note bi me-2" width="16" height="16"></i>
              Mata Pelajaran
            </a>
          </li>
        <?php endif ?>
      <?php else : ?>
        <li class="nav-item mb-2 rounded <?= $title == "Mata Pelajaran" ? 'active' : '' ?>">
          <a href="<?= base_url('admin/mapel') ?>" class="nav-link text-white">
            <i class="fas fa-fw fa-tasks bi me-2" width="16" height="16"></i>
            Mata Pelajaran
          </a>
        </li>
      <?php endif ?>
    </ul>
    <hr />
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url('resource/assets/user_default.png') ?>" alt="" width="32" height="32" class="rounded-circle me-2" />
        <strong><?= $this->session->userdata('nama') ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li>
          <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
            Sign out
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>