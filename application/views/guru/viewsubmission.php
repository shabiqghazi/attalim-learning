<table class="table table-sm">
  <tbody>
    <tr>
      <th scope="row">Judul</th>
      <td><?= $tugas_selesai['judul'] ?></td>
    </tr>
    <tr>
      <th scope="row">Deskripsi</th>
      <td><?= $tugas_selesai['deskripsi'] ?></td>
    </tr>
    <tr>
      <th scope="row">Deadline</th>
      <td><?= date('d-m-Y H:i', $tugas_selesai['deadline']) ?></td>
    </tr>
    <tr>
      <th scope="row">Keterangan</th>
      <td><?= $tugas_selesai['keterangan'] ?></td>
    </tr>
  </tbody>
</table>
<hr>
<h3>Jawaban <?= $tugas_selesai['nama'] ?></h3>
<table class="table table-sm">
  <tbody>
    <tr>
      <th scope="row">Teks</th>
      <td><?= $tugas_selesai['teks'] ?></td>
    </tr>
    <tr>
      <th scope="row">Waktu Selesai</th>
      <td><?= date('d-m-Y H:i', $tugas_selesai['waktu_selesai']) ?></td>
    </tr>
    <tr>
      <th scope="row">File</th>
      <td><a href="<?= base_url('resource/siswa/tugas-selesai/') . $tugas_selesai['filename'] ?>"><?= $tugas_selesai['ori_filename'] ?></a></td>
    </tr>
  </tbody>
</table>