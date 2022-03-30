<div class="container" style="padding-top: 70px;">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Detail Orang</h2>
            <div class="card border-dark" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['orang']['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $data['orang']['nama']; ?></h6>
                    <p class="card-text"><b>Alamat : </b><?= $data['orang']['alamat']; ?></p>
                    <br><br>
                    <a href="<?= BASE_URL; ?>/orang" class="card-link">kembali ke daftar orang</a>
                </div>
            </div>
        </div>
    </div>
</div>