<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>HTML Table</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produk)): ?>
                <?php foreach ($produk as $item): ?>
                    <tr>
                        <td><?= $item['no'] ?></td>
                        <td><?= $item['id_produk'] ?></td>
                        <td><?= $item['nama_produk'] ?></td>
                        <td><?= $item['kategori'] ?></td>
                        <td><?= number_format($item['harga'], 0, ',', '.') ?></td>
                        <td><?= $item['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Tidak ada data produk tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>