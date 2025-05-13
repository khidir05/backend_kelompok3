<?php ?>
<h2>Data Jurusan</h2>
<a href="/jurusan/create">Tambah Jurusan</a>
<table border="1">
    <tr><th>ID</th><th>Nama</th><th>Aksi</th></tr>
    <?php foreach ($jurusan as $j): ?>
    <tr>
        <td><?= $j['id_jurusan'] ?></td>
        <td><?= $j['nama'] ?></td>
        <td>
            <a href="/jurusan/edit/<?= $j['id_jurusan'] ?>">Edit</a> |
            <a href="/jurusan/delete/<?= $j['id_jurusan'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
