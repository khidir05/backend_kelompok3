<h2>Dashboard Staff - Pengajuan Cuti Mahasiswa</h2>

<h3>Dashboard Staff - Pengajuan yang Sudah Diproses</h3>
<a href="<?= base_url('/dashboard/menunggu') ?>">Lihat Pengajuan Menunggu</a>
<br><br>
<a href="<?= base_url('/dashboard/mahasiswa') ?>">📚 Kelola Mahasiswa</a>
<br><br>
<a href="<?= base_url(relativePath: '/prodi') ?>">Kelola prodi  </a>
<br><br>
<a href="<?= base_url(relativePath: '/jurusan') ?>">Kelola jurusan  </a>
<br><br>
<a href="<?= base_url(relativePath: '/staff') ?>">Kelola staff  </a>
<br><br>
<a href="<?= base_url('/logout') ?>">Logout</a>
<br><br>

<table border="1">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Semester</th>
        <th>Tgl Pengajuan</th>
        <th>Tgl Mulai</th>
        <th>Tgl Selesai</th>
        <th>Alasan</th>
        <th>Status</th>
    </tr>
    <?php foreach ($pengajuan as $p): ?>
    <tr>
        <td><?= $p['NIM'] ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['kelas'] ?></td>
        <td><?= $p['semester'] ?></td>
        <td><?= $p['tgl_pengajuan'] ?></td>
        <td><?= $p['tgl_mulai_cuti'] ?></td>
        <td><?= $p['tgl_selesai_cuti'] ?></td>
        <td><?= $p['alasan'] ?></td>
        <td><?= $p['status_pengajuan'] ?></td>

    </tr>
    <?php endforeach; ?>
</table>

