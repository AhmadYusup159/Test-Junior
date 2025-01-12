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
        <form action="<?php echo site_url('Data/SaveData') ?>" method="post">

            <div class="mb-3">
                <?php foreach ($produk as $item): ?>
                    <input type="hidden" name="nama_produk[]" value="<?= $item['nama_produk'] ?>" class="form-control">
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <?php foreach ($produk as $item): ?>
                    <input type="hidden" name="kategori[]" value="<?= $item['kategori'] ?>" class="form-control">
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <?php foreach ($produk as $item): ?>
                    <input type="hidden" name="harga[]" value="<?= $item['harga'] ?>" class="form-control">
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <?php foreach ($produk as $item): ?>
                    <input type="hidden" name="status[]" value="<?= $item['status'] ?>" class="form-control">
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>