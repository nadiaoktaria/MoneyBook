<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Data Karyawan</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
        <div class="card mt--2">
            <div class="card-header">
                <div class="row">
                    <button class="btn btn-warning m-2" name="tambah_karyawan" id="tambah_karyawan" style="padding:5px 10px 5px 10px;">
                        <span class="btn-label mr-1"><i class="fa fa-plus"></i></span>Tambah Karyawan
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_karyawan" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jabatan</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="KaryawanAdd" tabindex="-1" role="dialog" aria-labelledby="CategoryExpenseModalLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form_add_pemasukan" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Transaksi Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama Karyawan : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Karyawan">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">NIK : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK Karyawan">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jabatan : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukan Jabatan Karyawan">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">No Hp : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan No Hp Karyawan">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Alamat : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat Karyawan">
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="hidden" name="edit_dataKaryawan" id="edit_dataKaryawan" value="Edit" style="padding:9px" size="7" readonly>
                    <input class="btn btn-primary" type="text" name="add_dataKaryawan" id="add_dataKaryawan" value="Tambah" style="padding:9px" size="7" readonly>
                </div>
            </div>
        </form>
    </div>
</div>

