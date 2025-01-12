<div class="container-fluid pt-5 ps-4 ">

    <h3 class="mb-3">Tambah Produk</h3>
    <form action="<?php echo site_url('Data/SaveInsert') ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <?php echo form_error('nama_produk'); ?>
            <input type="text" name="nama_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <?php echo form_error('kategori'); ?>
            <select name="kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategori as $val) { ?>
                    <option value="<?php echo $val['id_kategori'];  ?>"><?php echo $val['nama_kategori'];  ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <?php echo form_error('harga'); ?>
            <label class="form-label">Harga Produk</label>
            <input type="number" min="0" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status Produk</label>
            <?php echo form_error('status'); ?>
            <select name="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="1">bisa dijual</option>
                <option value="2">tidak bisa dijual</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" href="<?php echo site_url('Data/Index') ?>" class="btn btn-secondary">Batal</a>

    </form>



</div>