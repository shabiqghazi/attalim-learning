<a href="<?= base_url('guru/materi/tambah') ?>" class="btn btn-primary mb-2">Tambah</a>
<?= $this->session->flashdata('message') ?>
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
    <?php $no = 1; foreach($materi as $m): ?>
    <tr>
        <th scope="row"><?= $no++ ?></th>
        <td><?= $m['mapel'] ?></td>
        <td><?= $m['judul'] ?></td>
        <td><?= $m['keterangan'] ?></td>
        <td><a href="<?= base_url('guru/materi/view/') . $m['materi_id'] ?>" class="badge bg-primary"><i class="fas fa-fw fa-eye"></i></a>
        <a href="<?= base_url('guru/materi/ubah/') . $m['materi_id'] ?>" class="badge bg-success"><i class="fas fa-fw fa-edit"></i></a>
        <a href="<?= base_url('guru/materi/hapus/') . $m['materi_id'] ?>" class="badge bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>