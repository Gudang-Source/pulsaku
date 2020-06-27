<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <h1 class="navbar-brand">APLIKASI CONTERKU</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(('transaksi')) ?>">Transaksi</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Master
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url('master/master_barang') ?>">Master Barang</a>
                    <a class="dropdown-item" href="<?= base_url('master') ?>">Master Kategori</a>
                    <a class="dropdown-item" href="<?= base_url('user') ?>">Master User</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(('login/keluar')) ?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>