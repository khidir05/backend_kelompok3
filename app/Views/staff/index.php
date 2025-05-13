<?php ?>
<h2>Data Staff</h2>
<a href="/staff/create">Tambah Staff</a>
<table border="1">
    <tr><th>NIP</th><th>Nama</th><th>Jabatan</th><th>Aksi</th></tr>
    <?php foreach ($staff as $s): ?>
    <tr>
        <td><?= $s['NIP'] ?></td>
        <td><?= $s['nama'] ?></td>
        <td><?= $s['jabatan'] ?></td>
        <td>
            <a href="/staff/edit/<?= $s['NIP'] ?>">Edit</a> |
            <a href="/staff/delete/<?= $s['NIP'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
