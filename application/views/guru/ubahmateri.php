<?= form_open_multipart('guru/materi/ubah/' . $materi['materi_id']) ?>
<div class="col-md-9">
  <div class="row mb-3">
    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="judul" name="judul" value="<?= $materi['judul'] ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
    <div class="col-sm-9">
      <textarea type="text" class="form-control" id="deskripsi" rows="10" name="deskripsi"><?= $materi['deskripsi'] ?></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $materi['keterangan'] ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="file" class="col-sm-3 col-form-label">File</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="file" name="file">
      <?= $materi['ori_filename'] ?>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</form>