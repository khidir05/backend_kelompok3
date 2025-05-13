<?php ?>
<h2>Edit Staff</h2>
<form action="/staff/update/<?= $staff['NIP'] ?>" method="post">
    Nama: <input type="text" name="nama" value="<?= $staff['nama'] ?>" required><br>
    Jabatan: <input type="text" name="jabatan" value="<?= $staff['jabatan'] ?>" required><br>
    <button type="submit">Update</button>
</form>