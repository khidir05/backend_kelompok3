<?php // app/Views/jurusan/edit.php ?>
<h2>Edit Jurusan</h2>
<form action="/jurusan/update/<?= $jurusan['id_jurusan'] ?>" method="post">
    Nama Jurusan: <input type="text" name="nama" value="<?= $jurusan['nama'] ?>" required><br>
    <button type="submit">Update</button>
</form>