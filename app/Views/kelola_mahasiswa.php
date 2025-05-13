<h2>Kelola Mahasiswa</h2>
<a href="<?= base_url('/dashboard/dashboardStaff') ?>">⬅️ Kembali ke Dashboard</a>
<br><br>

<a href="<?= base_url('/dashboard/tambahMahasiswa') ?>">➕ Tambah Mahasiswa</a>

<table border="1">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Semester</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($mahasiswa as $m): ?>
    <tr>
        <td><?= $m['NIM'] ?></td>
        <td><?= $m['nama'] ?></td>
        <td><?= $m['kelas'] ?></td>
        <td><?= $m['semester'] ?></td>
        <td><?= $m['status'] ?></td>
        <td>
            <a href="<?= base_url('/dashboard/editMahasiswa/' . $m['NIM']) ?>">✏️ Edit</a> |
            <a href="<?= base_url('/dashboard/hapusMahasiswa/' . $m['NIM']) ?>" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
