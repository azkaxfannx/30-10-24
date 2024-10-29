<!-- app/views/user/index.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Sponsor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar Sponsor Event</h2>
        <a href="/sponsor/create" class="btn btn-primary mb-3">Tambah Sponsor</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Nama Sponsor</th>
                    <th>Kontribusi</th>
                    <th>Jumlah Kontribusi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($sponsors)): ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data sponsor</td>
                </tr>
                <?php else: ?>
                <?php foreach ($sponsors as $index => $sponsor): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($sponsor['nama_event']) ?></td>
                    <td><?= htmlspecialchars($sponsor['nama_sponsor']) ?></td>
                    <td><?= htmlspecialchars($sponsor['kontribusi_sponsor']) ?></td>
                    <td>Rp <?= number_format($sponsor['besaran_kontribusi'], 0, ',', '.') ?></td>
                    <td>
                        <a href="index.php?controller=sponsor&action=edit&id=<?= $sponsor['id'] ?>"
                            class="btn btn-sm btn-warning">Edit</a>
                        <a href="index.php?controller=sponsor&action=delete&id=<?= $sponsor['id'] ?>"
                            class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- <a href="../" class="btn btn-secondary">Kembali</a> -->
    </div>
</body>

</html>