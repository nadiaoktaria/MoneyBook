<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Piutang</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card mt--2">
        <div class="card-body">
            <div class="col-lg-12 chat-aside border-lg-right pr-0 pl-0">
                <div class="aside-content">
                    <div class="aside-body">
                        <ul class="nav nav-tabs mt-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">
                                    <div><i class="fas fa-angle-double-right mr-1"></i>Piutang</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">
                                    <div><i class="fas fa-angle-double-right mr-1"></i>Debitur</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false">
                                    <div><i class="fas fa-angle-double-right mr-1"></i>History</div>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <div class="table-responsive">
                                    <table id="datatable_piutang" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Status</th>
                                                <th>Debitur</th>
                                                <th>Piutang Awal</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Sisa Piutang</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Piutang</th>
                                                <th>Tanggal Tempo</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="table-responsive">
                                    <table id="datatable_debitur" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
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
                            
                            <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">
                                <div class="table-responsive mt-3">
                                    <table id="datatable_bayar_piutang" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Debitur</th>
                                                <th>Nominal</th>
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
                </div>
            </div>
        </div>                
    </div>
</div>

<div class="modal fade" id="piutangAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form_add_piutang" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Tambah Piutang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Debitur : <span class="text-danger">*</span> </label>
                                <select class="form-control" name="debitur" id="debitur">
                                    <option value="">Pilih Debitur</option>
                                    <?php foreach ($debitur as $list) { ?>
                                        <option value="<?= $list->id_debitur ?>"><?= $list->nama_debitur ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Piutang Awal : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" data-type="currency" style="text-align: right;" name="piutang_awal" id="piutang_awal" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jumlah Bayar : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" data-type="currency" style="text-align: right;" name="jumlah_bayar" id="jumlah_bayar" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tanggal Piutang : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="tanggal_piutang" id="tanggal_piutang" style="cursor:pointer; background: #fff !important;" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tanggal Tempo : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="tanggal_tempo" id="tanggal_tempo" style="cursor:pointer; background: #fff !important;" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Keterangan : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan">
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="hidden" name="editPiutang" id="editPiutang" value="Edit" style="padding:9px" size="7" readonly>
                    <input class="btn btn-primary" type="text" name="addPiutang" id="addPiutang" value="Tambah" style="padding:9px" size="7" readonly>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="debiturAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form_add_debitur" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Tambah Debitur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Debitur">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">No Hp : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan No Hp">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Alamat : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat">
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="hidden" name="editDebitur" id="editDebitur" value="Edit" style="padding:9px" size="7" readonly>
                    <input class="btn btn-primary" type="text" name="addDebitur" id="addDebitur" value="Tambah" style="padding:9px" size="7" readonly>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="bayarPiutang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form_bayar_piutang" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Bayar Piutang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama Debitur: <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="debitur_bayar" id="debitur_bayar" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nominal : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" data-type="currency" style="text-align: right;" name="nominal_bayar" id="nominal_bayar" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tanggal : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="tanggal_bayar" id="tanggal_bayar" style="cursor:pointer; background: #fff !important;" readonly>
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="hidden" name="editpembayaranPiutang" id="editpembayaranPiutang" value="Edit" style="padding:9px" size="7" readonly>
                    <input class="btn btn-primary" type="text" name="pembayaranPiutang" id="pembayaranPiutang" value="Bayar" style="padding:9px" size="7" readonly>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- <div class="row mr-3 ml-3 mb-5" style="border-radius: 2px; background-color: rgba(199,199,199,.2);">
    <div class="col-md-3 mt-2 mb-2">
        <div class="form-group p-1" style="border: 1px solid #e8e8e8; border-radius: 4px; background-color: #fff;">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text" style="background-color: #fff; border-color: #fff !important;">Debitur : </span>
                </div>
                <select class="form-control form-control-sm" name="debitur_bayar" id="debitur_bayar" >
                    <option value="">Pilih Debitur</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-2 mb-2">
        <div class="form-group p-1" style="border: 1px solid #e8e8e8; border-radius: 4px; background-color: #fff;">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text" style="background-color: #fff; border-color: #fff !important;">Nominal : </span>
                </div>
                <input type="text" class="form-control form-control-sm" data-type="currency" style="text-align: right;" name="nominal_bayar" id="nominal_bayar" placeholder="0">
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-2 mb-2">
        <div class="form-group p-1" style="border: 1px solid #e8e8e8; border-radius: 4px; background-color: #fff;">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text" style="background-color: #fff; border-color: #fff !important;">Tanggal : </span>
                </div>
                <input type="text" class="form-control form-control-sm" name="tanggal_bayar" id="tanggal_bayar" style="cursor:pointer; background: #fff !important;" readonly>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-2 mb-2">
        <center><button class="btn btn-warning" name="bayar" id="tambah_pemasukan">Bayar</button></center>
    </div>        
</div> -->