<div class="col-md-12">
    <h3 style="color: black;" class="mt-3">Master User</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah User</button>
    <table class="table mt-3 col-md-7">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama User</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Keterangan</th>
                <th scope="col" width="30%">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $x = 1;
            $no = 1;
            foreach ($user->result() as $row) { ?>
                <tr>
                    <th scope="row"><?= $x++ ?></th>
                    <td><?= $row->nama_user ?></td>
                    <td><?= $row->username ?></td>
                    <td><?= $row->password ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $no++; ?>">Edit</button>
                        <a href="<?= base_url('user/hapus_user/' . $row->id_user) ?>"> <button type="button" class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('user/tambah_user') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama User</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama User" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Level</label>
                        <select class="form-control" name="level">
                            <option value="">Pilih Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$y = 1;
foreach ($user->result() as $row) { ?>

    <div class="modal fade" id="modalEdit<?= $y++; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('user/ubah_user/' . $row->id_user) ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama User</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama User" name="nama" value="<?= $row->nama_user ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= $row->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Password" name="password" value="<?= $row->keterangan ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Level</label>
                            <select class="form-control" name="level">
                                <option value="">Pilih Level</option>
                                <option <?php if ($row->level == 1) {
                                            echo "selected";
                                        } ?> value="1">Admin</option>
                                <option <?php if ($row->level == 2) {
                                            echo "selected";
                                        } ?> value="2">Kasir</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $no++;
} ?>