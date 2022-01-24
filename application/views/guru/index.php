<?= $this->session->flashdata('message') ?>
<div class="row">
  <div class="col-md-3 p-2">
    <div class="card">
      <div class="card-body">
        <p>Total siswa</p>
        <h1><?= $stats['jml_siswa'] ?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-2">
    <div class="card">
      <div class="card-body">
        <p>Tugas dari anda</p>
        <h1><?= $stats['jml_tugasGuru'] ?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-2">
    <div class="card">
      <div class="card-body">
        <p>Materi dari anda</p>
        <h1><?= $stats['jml_materiGuru'] ?></h1>
      </div>
    </div>
  </div>
</div>