<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Tugas</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Deadline</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($tugas as $t): ?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><?= $t['mapel'] ?></td>
      <td><?= $t['judul'] ?></td>
      <td><?= $t['keterangan'] ?></td>
      <td><?= date('d-m-Y H:i', $t['deadline']) ?></td>
      <td><a href="<?= base_url('siswa/tugas/view/') . $t['tugas_id'] ?>" class="badge bg-primary"><i class="fas fa-fw fa-eye"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>