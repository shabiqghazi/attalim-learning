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
<h4 class="mb-3">Jawabanmu</h4>
<?= form_open_multipart('siswa/tugas/submit/' . $tugas['tugas_id']); ?>
<div class="col-md-9">
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-3 col-form-label">Teks</label>
    <div class="col-sm-9">
      <textarea type="text" class="form-control" id="deskripsi" rows="10" name="teks"></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label for="file" class="col-sm-3 col-form-label">File</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="file" name="file">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
<form>