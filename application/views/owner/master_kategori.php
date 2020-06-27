<div class="col-md-12">
    <h3 style="color: black;" class="mt-3">Master Kategori Barang</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"> Tambah Kategori</button>
    <table class="table mt-3 col-md-6">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col" width="30%">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $x = 1;
            $no = 1;
            foreach ($kategori->result() as $row) { ?>
                <tr>
                    <th scope="row"><?= $x++ ?></th>
                    <td><?= $row->nama_kategori ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $no++; ?>">Edit</button>
                        <a href="<?= base_url('master/hapus_kategori/' . $row->id_kategori) ?>"> <button type="button" class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('master/tambah_kategori') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kategori</label>
                        <input type="text" class="form-control" id="kategori" placeholder="Nama Kategori" name="kategori">
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
foreach ($kategori->result() as $row) { ?>


    <div class="modal fade" id="modalEdit<?= $y++; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('master/edit_kategori/' . $row->id_kategori) ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Kategori</label>
                            <input type="text" class="form-control" id="kategori" placeholder="Nama Kategori" name="kategori" value="<?= $row->nama_kategori ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $no++;
} ?>