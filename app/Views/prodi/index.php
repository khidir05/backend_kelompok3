<?php ?>
<h2>Data Program Studi</h2>
<a href="/prodi/create">Tambah Prodi</a>
<table border="1">
    <tr><th>ID</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr>
    <?php foreach ($prodi as $p): ?>
    <tr>
        <td><?= $p['id_prodi'] ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['jurusan_nama'] ?? 'N/A' ?></td>
        <td>
            <a href="/prodi/edit/<?= $p['id_prodi'] ?>">Edit</a> |
            <a href="/prodi/delete/<?= $p['id_prodi'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>