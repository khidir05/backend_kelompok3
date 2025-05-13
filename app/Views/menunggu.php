<h2>Dashboard Staff - Pengajuan Menunggu Persetujuan</h2>
<a href="<?= base_url('/dashboard/dashboardStaff') ?>">Kembali ke Semua Daftar</a>
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
        <th>Aksi</th>
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
        <td>
            <form method="get" action="/dashboard/update-status/<?= $p['id_pengajuan'] ?>/setuju" style="display:inline;">
                <button type="submit">Setuju</button>
            </form>
            <form method="get" action="/dashboard/update-status/<?= $p['id_pengajuan'] ?>/tolak" style="display:inline;">
                <button type="submit">Tolak</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
