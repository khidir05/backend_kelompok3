<h2>Tambah Mahasiswa</h2>
<a href="<?= base_url('/dashboard/mahasiswa') ?>">⬅️ Kembali ke Kelola Mahasiswa</a>
<form method="post" action="<?= base_url('/dashboard/simpanMahasiswa') ?>">
    <p>NIM: <input type="text" name="NIM" required></p>
    <p>Nama: <input type="text" name="nama" required></p>
    <p>Kelas: <input type="text" name="kelas" required></p>
    <p>Semester: <input type="number" name="semester" min="1" required></p>
    <p>Tahun Akademik: <input type="text" name="tahun_akademik" required></p>
    <p>Status:
        <select name="status">
            <option value="aktif">Aktif</option>
            <option value="cuti">Cuti</option>
        </select>
    </p>
    <p>ID Prodi: <input type="text" name="id_prodi" required></p>
    <button type="submit">Simpan</button>
</form>
