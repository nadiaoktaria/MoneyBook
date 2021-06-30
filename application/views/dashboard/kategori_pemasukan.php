<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Kategori Pemasukan</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <form id="from_add_pendapatan" novalidate="novalidate" enctype="multipart/form-data" accept-charset="utf-8">
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
                                <input type="text" class="form-control" name="" id="" placeholder="Masukan Kode">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kategori : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="" id="" placeholder="Masukan Catatan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit"  id="" value="Tambah">
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
                            <table id="" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>001</td>
                                        <td>Gaji Bulanan</td>
                                        <td>
                                            <a class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                            <a class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>002</td>
                                        <td>Instruktur</td>
                                        <td>
                                            <a class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                            <a class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
