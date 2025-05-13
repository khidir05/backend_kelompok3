<?php ?>
<h2>Edit Prodi</h2>
<form action="/prodi/update/<?= $prodi['id_prodi'] ?>" method="post">
    Nama Prodi: <input type="text" name="nama" value="<?= $prodi['nama'] ?>" required><br>
    ID Jurusan: <input type="number" name="id_jurusan" value="<?= $prodi['id_jurusan'] ?>" required><br>
    <button type="submit">Update</button>
</form>