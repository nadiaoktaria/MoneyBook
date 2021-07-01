<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Profile</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block"
                            src="<?= base_url() ?>assets/img/<?= $pengguna['foto']; ?>"
                            alt="Card image cap" width="180">
                        <h5 class="text-sm-center mt-2 mb-1"><b><?= $pengguna['nama']; ?></b></h5>

                        <div class="location text-sm-center"><i class="icon-envelope mr-1"></i>
                            <?= $pengguna['email']; ?></div>
                        <div class="location text-sm-center"><i class="icon-location-pin mr-1"></i>
                            <?= $pengguna['alamat']; ?></div>
                    </div>
                    <hr>
                    <div class="card-text">
                        <form action="<?= base_url('dashboard/upload_foto_profil') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="upload_foto_profil">

                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="file-upload">Pilih file foto...</label>
                                <input type="file" class="custom-file-input" id="file-upload" name="berkas">
                            </div>
                            <div class="input-group-append" >
                                <button class="btn btn-primary btn-upload" style="padding:0 8px 0 8px; weight:10px; height:calc(2.25rem + 2px)" type="submit">
                                <i class="fa fa-upload p-0 m-0"></i></button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body m-3">
                    <form id="ubah_profil" method="POST" action="<?= base_url('dashboard/ubah_profile') ?>">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="nama" class="form-control"
                                    value="<?= $pengguna['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="email" class="form-control"
                                    value="<?= $pengguna['email']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">No Hp</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="no_hp" class="form-control"
                                    value="<?= $pengguna['no_hp']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="alamat" class="form-control"
                                    value="<?= $pengguna['alamat']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <button type="submit" class="btn btn-primary btn-confirmation px-4 mt-4">Ubah Profil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
