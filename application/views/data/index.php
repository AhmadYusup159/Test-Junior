<div class="container-fluid pt-5 ps-4 ">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ammbil Data
    </button>
    <a type="button" href="<?php echo site_url('Data/AddData') ?>" class="btn btn-primary">
        Tambah Data
    </a>
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
        </div>

    <?php endif; ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login Untuk mengambil data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('Data/GetData') ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="text" name="username" class="form-control">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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