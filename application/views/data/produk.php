<div class="container-fluid pt-5 px-5">
    <h2 class="mb-5">Response Data Produk</h2>

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
                <input type="hidden" name="id_produk[]" value="<?= $item['id_produk'] ?>" class="form-control">
            <?php endforeach; ?>
        </div>
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
        <?php if (!empty($produk)): ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
        <?php endif; ?>
        <a type="button" href="<?php echo site_url('Data/Index') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>