<h2>Edit Mahasiswa</h2>
<a href="<?= base_url('/dashboard/mahasiswa') ?>">⬅️ Kembali ke Kelola Mahasiswa</a>
<form method="post" action="<?= base_url('/dashboard/updateMahasiswa/' . $mahasiswa['NIM']) ?>">
    <p>NIM: <?= $mahasiswa['NIM'] ?></p>
    <p>Nama: <input type="text" name="nama" value="<?= $mahasiswa['nama'] ?>" required></p>
    <p>Kelas: <input type="text" name="kelas" value="<?= $mahasiswa['kelas'] ?>" required></p>
    <p>Semester: <input type="number" name="semester" value="<?= $mahasiswa['semester'] ?>" min="1" required></p>
    <p>Tahun Akademik: <input type="text" name="thn_akademik" value="<?= $mahasiswa['tahun_akademik'] ?>" required></p>
    <p>Status:
        <select name="status">
            <option value="aktif" <?= $mahasiswa['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="cuti" <?= $mahasiswa['status'] == 'cuti' ? 'selected' : '' ?>>Cuti</option>
        </select>
    </p>
    <p>ID Prodi: <input type="text" name="id_prodi" value="<?= $mahasiswa['id_prodi'] ?>" required></p>
    <button type="submit">Update</button>
</form>
