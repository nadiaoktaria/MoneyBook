<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Pemasukan</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>
	
<div class="page-inner mt--5">
    <form id="form_add_pemasukan" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="row mt--2">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Transaksi Pemasukan</div>
                    </div>
                    <div class="card-body">
                        <div class ="chart-dashboardx ">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kategori : <span class="text-danger">*</span> </label>
                                <select class="form-control" name="kategori" id="kategori" >
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $list) { ?>
                                    <option value="<?= $list->id_kategori_pemasukan ?>"><?= $list->nama_kategori ?></option>
                                <?php } ?>
                                </select>
                            </div>				
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nominal : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="nominal" id="nominal" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Catatan : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Masukan Catatan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="hidden" name="edit_transPemasukan" id="edit_trans_pemasukan" value="Edit" readonly>
                        <input class="btn btn-primary" type="text" name="add_transPemasukan" id="add_trans_pemasukan" value="Tambah" readonly>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">History Peasukan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_pemasukan" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
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