<h2>Dashboard Mahasiswa</h2>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<form method="post" action="/dashboard/submit">
    <label>NIM:</label>
    <input type="text" name="NIM" value="<?= $mhs['NIM'] ?>" readonly><br>

    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $mhs['nama'] ?>" readonly><br>

    <label>Kelas:</label>
    <input type="text" name="kelas" value="<?= $mhs['kelas'] ?>" required><br>

    <label>Semester:</label>
    <input type="text" name="semester" value="<?= $mhs['semester'] ?>" required><br>

    <label>Tanggal Mulai Cuti:</label>
    <input type="date" name="tgl_mulai_cuti" required><br>

    <label>Tanggal Selesai Cuti:</label>
    <input type="date" name="tgl_selesai_cuti" required><br>

    <label>Alasan:</label>
    <textarea name="alasan" required></textarea><br><br>

    <button type="submit">Ajukan Cuti</button>
</form>
