<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Materi</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; foreach($materi as $m): ?>
    <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $m['mapel'] ?></td>
        <td><?= $m['judul'] ?></td>
        <td><?= $m['keterangan'] ?></td>
        <td><a href="<?= base_url('siswa/materi/view/') . $m['materi_id'] ?>" class="badge bg-primary"><i class="fas fa-fw fa-eye"></i></a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>