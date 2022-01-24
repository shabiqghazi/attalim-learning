<?= $this->session->flashdata('message') ?>
<div class="row">
  <div class="col-md-3 p-2" style="height:200px">
    <div class="card">
      <div class="card-body">
        <p>Total Mata Pelajaran</p>
        <h1><?= $stats['jml_mapel'] ?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-2" style="height:200px">
    <div class="card">
      <div class="card-body">
        <p>Total tugas dikerjakan</p>
        <div class="h1">
          <h1 class="d-inline"><?= $stats['jml_tugasSelesai'] ?></h1><h4 class="d-inline">/<?= $stats['jml_tugas'] ?></h4>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-2" style="height:200px">
    <div class="card">
      <div class="card-body">
        <p>Total Materi</p>
        <h1><?= $stats['jml_materi'] ?></h1>
      </div>
    </div>
  </div>
</div>