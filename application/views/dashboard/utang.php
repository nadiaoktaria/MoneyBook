<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Utang</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
        <div class="alert alert-warning mb-5 mt--3" role="alert">                   
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <b>Note!</b> &nbsp; &nbsp; 
            Jika pengingat <b>Aktif</b> maka dengan otomatis Anda akan menerima <b>Email</b> pengingat utang sesuai dengan <b>Tanggal Tempo</b> pada jam <b>6.00 am</b>. 
        </div>
        
    </div>
</div>

<div class="page-inner mt--5">
        <div class="card mt--2">
            <div class="card-header">
                <div class="row">
                    <button class="btn btn-warning m-2" name="tambah_utang" id="tambah_utang" style="padding:5px 10px 5px 10px;">
                        <span class="btn-label mr-1"><i class="fa fa-plus"></i></span>Catat Utang
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_utang" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Kreditur</th>
                                <th>Jumlah Utang</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Utang</th>
                                <th>Tanggal Tempo</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Pengingat</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="utangAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form_add_utang" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Pencatatan Utang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Kreditur : <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="kreditur" id="kreditur" placeholder="Masukan Kreditur">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Jumlah Utang : <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" data-type="currency" style="text-align: right;" name="jumlah_utang" id="jumlah_utang" placeholder="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Jumlah Bayar : <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" data-type="currency" style="text-align: right;" name="jumlah_bayar" id="jumlah_bayar" placeholder="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Status : <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="status_utang" id="status_utang">
                                            <option value="">Pilih Status</option>
                                            <option value="Belum Lunas">Belum Lunas</option>
                                            <option value="Lunas">Lunas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Tanggal Utang : <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="tanggal_utang" id="tanggal_utang" style="cursor:pointer; background: #fff !important;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Tanggal Tempo : <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="tanggal_tempo" id="tanggal_tempo" style="cursor:pointer; background: #fff !important;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Keterangan : <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Pengingat : <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="pengingat" id="pengingat">
                                            <option value="">Pilih Pengingat</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Pasif">Pasif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="hidden" name="editUtang" id="editUtang" value="Edit" style="padding:9px" size="7" readonly>
                    <input class="btn btn-primary" type="text" name="addUtang" id="addUtang" value="Tambah" style="padding:9px" size="7" readonly>
                </div>
            </div>
        </form>
    </div>
</div>

