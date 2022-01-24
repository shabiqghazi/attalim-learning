<form action="<?= base_url('guru/tugas/tambah') ?>" method="post">
<div class="col-md-9">
  <div class="row mb-3">
    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="judul" name="judul">
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
    <div class="col-sm-9">
      <textarea type="text" class="form-control" id="deskripsi" rows="10" name="deskripsi"></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label for="deadline" class="col-sm-3 col-form-label">Deadline</label>
    <div class="col-sm-9">
      <input type="datetime-local" class="form-control" id="deadline" name="deadline">
    </div>
  </div>
  <div class="row mb-3">
    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="keterangan" name="keterangan">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-3 col-form-label"></div>
    <div class="col-sm-9">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</form>