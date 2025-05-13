<?php ?>
<h2>Tambah Prodi</h2>
<form action="/prodi/store" method="post">
    Nama Prodi: <input type="text" name="nama" required><br>
    ID Jurusan: <input type="number" name="id_jurusan" required><br>
    <button type="submit">Simpan</button>
</form>