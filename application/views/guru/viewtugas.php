<table class="table table-sm">
  <tbody>
    <tr>
      <th scope="row">Mata Pelajaran</th>
      <td><?= $tugas['mapel'] ?></td>
    </tr>
    <tr>
      <th scope="row">Judul</th>
      <td><?= $tugas['judul'] ?></td>
    </tr>
    <tr>
      <th scope="row">Deskripsi</th>
      <td><?= $tugas['deskripsi'] ?></td>
    </tr>
    <tr>
      <th scope="row">Deadline</th>
      <td><?= date('d-m-Y H:i', $tugas['deadline']) ?></td>
    </tr>
    <tr>
      <th scope="row">Keterangan</th>
      <td><?= $tugas['keterangan'] ?></td>
    </tr>
  </tbody>
</table>
<hr>
<h3>Submission</h3>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">Waktu Selesai</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;foreach($tugasSelesai as $ts): ?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><?= $ts['nama'] ?></td>
      <td><?= date('d-m-Y H:i', $ts['waktu_selesai']) ?></td>
      <td><a href="<?= base_url('guru/tugas/viewsubmission/'. $ts['tugas_selesai_id'])  ?>" class="badge bg-primary"><i class="fas fa-fw fa-eye"></i></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>