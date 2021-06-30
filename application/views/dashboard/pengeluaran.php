<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Pengeluaran</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <form id="from_add_pendapatan" novalidate="novalidate" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="row mt--2">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Transaksi Pengeluaran</div>
                    </div>
                    <div class="card-body">
                        <div class ="chart-dashboardx ">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kategori : <span class="text-danger">*</span> </label>
                                <select class="form-control" name="" id="" >
                                <option value="">Pilih Kategori</option>
                                    <option value=""></option>
                                </select>
                            </div>				
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nominal : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="" id="" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Catatan : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="" id="" placeholder="Masukan Catatan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit"  id="" value="Tambah">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">History Pengeluaran</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_pengeluaran" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>