<div class="col-md-12">
    <h3 style="color: black;" class="mt-3">Transaksi</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahTransaksi"> Tambah Transaksi</button>
    <br><br>
    <table class="table  table-bordered mt-4" id="transaksitable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Palanggan</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">QTY</th>
                <th scope="col">Total harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $x = 1;
            $no = 1;
            foreach ($list_trans->result() as $row) { ?>
                <tr>
                    <th scope="row"><?= $x++ ?></th>
                    <td><?= $row->nama_pelanggan ?></td>
                    <td><?= $row->nama_barang ?></td>
                    <td>Rp. <?= number_format($row->harga_satuan) ?>,-</td>
                    <td><?= $row->qty ?></td>
                    <td>Rp.
                        <?php
                        $qty = $row->qty;
                        $satuan = $row->harga_satuan;
                        $jumlah = $satuan * $qty;
                        echo number_format($jumlah);
                        ?>,-
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditTransaksi<?= $no++; ?>">Edit</button>
                        <a href="<?= base_url('transaksi/hapus_data/' . $row->id_trans) ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambahTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('transaksi/tambah_data') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="nama_pelanggan">

                        <label for="exampleFormControlInput1">Nama Barang</label>
                        <select class="form-control" name="barang" id="barang">
                            <option value="">-- Pilih barang --</option>
                            <?php foreach ($barang->result() as $row) { ?>
                                <option value="<?= $row->id_barang ?>"><?= $row->nama_barang  ?></option>
                            <?php } ?>
                        </select>

                        <label for="exampleFormControlInput1">QTY</>
                            <input type="number" class="form-control" id="qty" placeholder="QTY" name="qty">
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
foreach ($list_trans->result() as $row) {
    $data_barang = $row->barang;
?>
    <div class="modal fade" id="modalEditTransaksi<?= $y++; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('transaksi/edit_data/' . $row->id_trans) ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="nama_pelanggan" value="<?= $row->nama_pelanggan ?>">

                            <label for="exampleFormControlInput1">QTY</>
                                <input type="number" class="form-control" id="qty" placeholder="QTY" name="qty" value="<?= $row->qty ?>">

                                <label for="exampleFormControlInput1">Nama Barang</label>
                                <select class="form-control" name="barang" id="barang">
                                    <option value="">-- Pilih barang --</option>
                                    <?php foreach ($barang->result() as $row) { ?>
                                        <option <?php if ($data_barang == $row->id_barang) {
                                                    echo "selected";
                                                } ?> value="<?= $row->id_barang ?>"><?= $row->nama_barang  ?></option>
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
}
?>

<datalist id="data_barang">
    <?php
    foreach ($barang->result() as $b) {
        echo "<option value='$b->id_barang'>$b->nama_barang</option>";
    }
    ?>

</datalist>