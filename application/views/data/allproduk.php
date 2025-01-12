<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <div class="container-fluid pt-5 px-5">
        <h2>HTML Table</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produk)): ?>
                    <?php $no = 1;
                    foreach ($produk as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['nama_produk'] ?></td>
                            <?php
                            $nama_kategori = '';
                            foreach ($kategori as $kate) {
                                if ($kate['id_kategori'] == $item['kategori_id']) {
                                    $nama_kategori = $kate['nama_kategori'];
                                    break;
                                }
                            }
                            ?>
                            <td><?= $nama_kategori ?></td>

                            <td><?= number_format($item['harga'], 0, ',', '.') ?></td>
                            <?php
                            $nama_status = '';
                            foreach ($status as $sta) {
                                if ($sta['id_status'] == $item['status_id']) {
                                    $nama_status = $sta['nama_status'];
                                    break;
                                }
                            }
                            ?>
                            <td><?= $nama_status ?></td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="6">Tidak ada data produk tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>