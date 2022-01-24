<h3 class="mb-5 text-center">Halaman Register</h3>
<form action="<?= base_url('auth/registration') ?>" method="post" class="mb-3">
  <div class="mb-3 row">
    <label for="nama" class="col-sm-3 col-form-label">
      Nama
    </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nama" name="nama" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="username" class="col-sm-3 col-form-label">
      Username
    </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="username" name="username" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-3 col-form-label">
      Password
    </label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword" name="password" />
    </div>
  </div>
  <div class="mb-3 row">
    <label for="role_id" class="col-sm-3 col-form-label">
      Role
    </label>
    <div class="col-sm-9">
      <select class="form-select" name="role_id">
        <option selected>Daftar sebagai..</option>
        <option value="1">Guru</option>
        <option value="2">Siswa</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
      <button type="submit" class="btn btn-primary">
        Submit
      </button>
    </div>
  </div>
</form>
<p class="text-center">
  Sudah punya akun?
  <a href="<?= base_url('auth') ?>">Login</a>
</p>