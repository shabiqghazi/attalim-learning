<div class="mb-3">
  <h5>Materi</h5>
  <?php foreach($materi as $m): ?>
  <a href="<?= base_url('siswa/materi/view/') . $m['materi_id'] ?>" class="text-decoration-none"><?= $m['keterangan'] . ' : ' . $m['judul'] ?></a>
  <br>
  <?php endforeach ?>
</div>
<div class="mb-3">
  <h5>Tugas</h5>
  <?php foreach($tugas as $t): ?>
  <a href="<?= base_url('siswa/tugas/view/') . $t['tugas_id'] ?>" class="text-decoration-none"><?= $t['keterangan'] . ' : ' . $t['judul'] ?></a>
  <br>
  <?php endforeach ?>
</div>