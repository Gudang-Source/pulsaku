<div class="col-md-12">
    <h3 style="color: black;" class="mt-3">Master Barang</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBarang"> Tambah Barang</button>
    <br><br>
    <table class="table  table-bordered mt-5" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kategori Barang</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $x = 1;
            $no = 1;
            foreach ($barang->result() as $row) { ?>

                <tr>
                    <th scope="row"><?= $x++; ?></th>
                    <td><?= $row->nama_barang ?></td>
                    <td><?= $row->nama_kategori ?></td>
                    <td>Rp. <?= number_format($row->harga_satuan) ?>,-</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditBarang<?= $no++; ?>">Edit</button>
                        <a href="<?= base_url('master/hapus_barang/' . $row->id_barang) ?>"> <button type="button" class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('master/tambah_barang') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kategori</label>
                        <input type="text" class="form-control" id="barang" placeholder="Nama Barang" name="nama_barang">

                        <label for="exampleFormControlInput1">Harga Barang</label>
                        <input type="number" class="form-control" id="harga" placeholder="Harga Barang" name="harga_barang">

                        <label for="exampleFormControlInput1">Kategori Barang</label>
                        <select class="form-control" name="kategori">
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($kategori->result() as $row) { ?>
                                <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$y = 1;
foreach ($barang->result() as $row) {
    $kategori_barang = $row->kategori_barang;
?>


    <div class="modal fade" id="modalEditBarang<?= $y++ ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('master/update_barang/' . $row->id_barang) ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Kategori</label>
                            <input type="text" class="form-control" id="barang" placeholder="Nama Barang" name="nama_barang" value="<?= $row->nama_barang ?>">

                            <label for="exampleFormControlInput1">Harga Barang</label>
                            <input type="number" class="form-control" id="harga" placeholder="Harga Barang" name="harga_barang" value="<?= $row->harga_satuan ?>">

                            <label for="exampleFormControlInput1">Kategori Barang</label>
                            <select class="form-control" name="kategori" required>
                                <option value="">-- Pilih Satu --</option>
                                <?php
                                foreach ($kategori->result() as $row) { ?>
                                    <option <?php if ($kategori_barang == $row->id_kategori) {
                                                echo "selected";
                                            } ?> value="<?php echo $row->id_kategori ?>"><?php echo $row->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $no++;
} ?>