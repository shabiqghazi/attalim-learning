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
        <p>Total Guru</p>
        <h1><?= $stats['jml_guru'] ?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-2">
    <div class="card">
      <div class="card-body">
        <p>Total Mata Pelajaran</p>
        <h1><?= $stats['jml_mapel'] ?></h1>
      </div>
    </div>
  </div>
</div>