<div class="panel-header">
    <div class="page-inner py-4">
        <div class="alert alert-warning" role="alert">                   
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Selamat Datang <?= $pengguna['email']; ?>
        </div>
        
        <div class="row pb-3">
            <div class="col-md-9">
                <h2 class="fw-bold">Dashboard</h2>
            </div>
            <div class="col-md-3">
                <div class="form-group p-1" style="border: 1px solid #e8e8e8; border-radius: 4px; background-color: #fff;">
                    <div class="input-group" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #fff; border-color: #fff !important;">Filter : </span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="daterange" name="daterange" value="Bulan Ini" style="text-align:center; cursor:pointer; background: #fff !important;" readonly>
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #fff; border-color: #fff !important;"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-3">
            <div class="card" style="min-height: 140px; max-height: 140px">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-uppercase text-success op-7">Pemasukan</h5>
                        <p class="text-success"><i class="fa fa-chevron-up"></i></p>
                    </div>
                    <h3 class="fw-bold" id="total_pemasukan"> </h3>
                </div>
            </div>
            <div class="card" style="min-height: 140px; max-height: 140px">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-uppercase text-danger op-7">Pengeluaran</h5>
                        <p class="text-danger"><i class="fa fa-chevron-down"></i></p>
                    </div>
                    <h3 class="fw-bold" id="total_pengeluaran"> </h3>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title mb-4">Grafik Pemasukan Bulanan</div>
                    <div id="morrisLine" style="width: 100%; height: 80%; min-height: 215px; max-height: 215px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Persentase</div>
                </div>
                <div class="card-body" style="min-height: 330px; max-height: 330px">
                    <div class="chart-container" id="tableDonut">
                        <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Kategori Pemasukan</div>
                </div>
                <div class="card-body p-0" style="min-height: 330px; max-height: 330px">
                    <div class="table-responsive">
                        <table id="jumlah_kategori_pemasukan" class="table tableBodyScroll">
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Kategori Pengeluaran</div>
                </div>
                <div class="card-body p-0" style="min-height: 330px; max-height: 330px">
                    <div class="table-responsive">
                        <table id="jumlah_kategori_pengeluaran" class="table tableBodyScroll">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>