<h3 class="mb-5 text-center">Halaman Login</h3>
<?= $this->session->flashdata('message') ?>
<form action="<?= base_url('auth') ?>" method="post" class="mb-3">
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
  Belum punya akun? <a href="<?= base_url('auth/register') ?>">Register</a>
</p>