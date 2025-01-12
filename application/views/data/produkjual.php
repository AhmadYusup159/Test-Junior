<div class="container-fluid pt-5 ps-4 ">
    <div class="mt-3">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th colspan="2">Aksi</th>
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

</div>