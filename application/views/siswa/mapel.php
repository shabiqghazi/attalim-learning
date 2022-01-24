<div class="row">
  <?php foreach($mapel as $mp): ?>
  <div class="col-lg-3 col-md-4 col-sm-6 p-2">
    <a href="<?= base_url('siswa/mapel/view/') . $mp['mapel_id'] ?>" class="text-decoration-none">
    <div class="card border-0 border-start border-3 border-primary shadow pb-3 text-dark">
      <div class="card-body">
        <h5><?= $mp['mapel'] ?></h5>
      </div>
    </div>
    </a>
  </div>
  <?php endforeach ?>
  
</div>