<a href="<?= base_url('guru/tugas/tambah') ?>" class="btn btn-primary mb-2">Tambah</a>
<?= $this->session->flashdata('message') ?>
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
    <?php $i = 1; foreach($tugas as $t) : ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $t['mapel'] ?></td>
        <td><?= $t['judul'] ?></td>
        <td><?= $t['keterangan'] ?></td>
        <td><?= date('d-m-Y H:i', $t['deadline']) ?></td>
        <td><a href="<?= base_url('guru/tugas/view/') . $t['tugas_id'] ?>" class="badge bg-primary"><i class="fas fa-fw fa-eye"></i></a>
          <a href="<?= base_url('guru/tugas/ubah/') . $t['tugas_id'] ?>" class="badge bg-success"><i class="fas fa-fw fa-edit"></i></a>
          <a href="<?= base_url('guru/tugas/hapus/') . $t['tugas_id'] ?>" class="badge bg-danger" onclick="return confirm('apakah anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></a>
        </td>
      <?php endforeach ?>
      </tr>
  </tbody>
</table>