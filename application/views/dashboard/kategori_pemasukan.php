<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Kategori Pemasukan</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <form id="tambah_kategori_pemasukan" method="POST" enctype="multipart/form-data" accept-charset="utf-8"> 
        <div class="row mt--2">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Kategori Pemasukan</div>
                    </div>
                    <div class="card-body">
                        <div class ="chart-dashboardx ">		
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kode : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukan Kode" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kategori : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukan Catatan" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="hidden" name="edit_katPemasukan" id="edit_kategori_pemasukan" value="Edit" readonly>
                        <input class="btn btn-primary" type="text" name="add_katPemasukan" id="add_kategori_pemasukan" value="Tambah" readonly>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Kategori Pemasukan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabel_kategori_pemasukan" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
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
    </form>
</div>
