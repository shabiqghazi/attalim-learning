<div class="col-md-9">
<?= $this->session->flashdata('message') ?>
  <div class="row mb-3">
    <label for="judul" class="col-sm-3 col-form-label">Mata Pelajaran</label>
    <div class="col-sm-9">
      <p><?= $tugas['mapel'] ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-9">
      <p><?= $tugas['judul'] ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
    <div class="col-sm-9">
      <p><?= $tugas['deskripsi'] ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="deadline" class="col-sm-3 col-form-label">Deadline</label>
    <div class="col-sm-9">
      <p><?= date('d-m-Y H:i', $tugas['deadline']) ?></p>
    </div>
  </div>
  <div class="row mb-3">
    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9">
      <p><?= $tugas['keterangan'] ?></p>
    </div>
  </div>
  <div class="row">
    <?php if ($tugas_selesai == false) : ?>
      <a href="<?= base_url('siswa/tugas/submit/' . $tugas['tugas_id']) ?>" class="btn btn-primary">Add Submission</a>
    <?php else : ?>
      <hr>
      <h4 class="mb-3">Jawabanmu</h4>
      <div class="row mb-3">
        <label for="deadline" class="col-sm-3 col-form-label">Teks</label>
        <div class="col-sm-9">
          <p><?= $data_tugasSelesai['teks'] ?></p>
        </div>
      </div>
      <div class="row mb-3">
        <label for="file" class="col-sm-3 col-form-label">file</label>
        <div class="col-sm-9">
          <a href="<?= base_url('resource/siswa/tugas-selesai/') . $data_tugasSelesai['filename'] ?>"><?= $data_tugasSelesai['ori_filename'] ?></a>
        </div>
      </div>
      <div class="row mb-3">
        <label for="deadline" class="col-sm-3 col-form-label">Waktu Selesai</label>
        <div class="col-sm-9">
          <p><?= date('d-m-Y H:i', $data_tugasSelesai['waktu_selesai']) ?></p>
        </div>
      </div>
      <a href="<?= base_url('siswa/tugas/edit/') . $data_tugasSelesai['tugas_id'] ?>" class="btn btn-primary">Edit Submission</a>
      <a href="<?= base_url('siswa/tugas/remove/') . $data_tugasSelesai['tugas_id'] ?>" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin menghapus submission?')">Remove Submission</a>
    <?php endif ?>
  </div>
</div>