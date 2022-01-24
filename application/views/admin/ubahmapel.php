<form action="<?= base_url('admin/mapel/ubah/') . $mapel['mapel_id'] ?>" method="post" class="col-md-7">
  <div class="mb-3 row">
    <label for="mapel" class="col-sm-3 col-form-label">Mata Pelajaran</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="mapel" name="mapel" value="<?= $mapel['mapel'] ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label class="col-sm-3 col-form-label">Guru</label>
    <div class="col-sm-9">
      <select class="form-select" aria-label="Default select example" name="guru_id">
        <option selected>Pilih guru</option>
        <?php foreach($guru as $g): ?>
        <option value="<?= $g['user_id'] ?>"><?= $g['nama'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9">
      <button type="submit" class="btn-primary btn">Submit</button>
    </div>
  </div>
</form>