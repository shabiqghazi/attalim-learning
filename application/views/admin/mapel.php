<a href="<?= base_url('admin/mapel/tambah') ?>" class="btn btn-primary mb-2">Tambah</a>
<?= $this->session->flashdata('message') ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Guru</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($mapel as $mp) : ?>
      <tr>
        <th scope="row"><?= $no++ ?></th>
        <td><?= $mp['mapel'] ?></td>
        <td><?= $mp['nama'] ?></td>
        <td>
          <a href="<?= base_url('admin/mapel/ubah/') . $mp['mapel_id'] ?>" class="badge bg-success"><i class="fas fa-fw fa-edit"></i></a>
          <a href="<?= base_url('admin/mapel/hapus/') . $mp['mapel_id'] ?>" class="badge bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-fw fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>