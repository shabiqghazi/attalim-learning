<div class="col-md-9">
  <div class="row mb-3">
    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-9">
      <p><?= $materi['mapel'] ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-9">
      <p><?= $materi['judul'] ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
    <div class="col-sm-9">
      <p><?= $materi['deskripsi'] ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9">
      <p><?= $materi['keterangan'] ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-3 col-form-label">File</label>
    <div class="col-sm-9">
      <a href="<?= base_url('resource/guru/materi/') . $materi['filename'] ?>"><?= $materi['ori_filename'] ?></a>
    </div>
  </div>
</div>