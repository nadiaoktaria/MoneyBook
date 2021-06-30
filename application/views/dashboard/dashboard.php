<div class="panel-header">
    <div class="page-inner py-4">
        <h2 class="pb-3 fw-bold">Dashboard</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-uppercase text-success op-7">Pemasukan</h5>
                        <p class="text-success"><i class="fa fa-chevron-up"></i></p>
                    </div>
                    <h3 class="fw-bold">Rp 10.000.000</h3>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-uppercase text-danger op-7">Pengeluaran</h5>
                        <p class="text-danger"><i class="fa fa-chevron-down"></i></p>
                    </div>
                    <h3 class="fw-bold">Rp 2.000.000</h3>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title mb-4">Pemasukan Tahunan</div>
                    <div id="chart-container">
                        <canvas id="totalIncomeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Persentase</div>
                    <div class="card-category">March 25 - April 02</div>
                </div>
                <div class="card-body" style="min-height: 350px; max-height: 350px">
                    <div class="chart-container">
                        <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                        <!-- Diagram Pie -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Kategori Pemasukan</div>
                    <div class="card-category">March 25 - April 02</div>
                </div>
                <div class="card-body p-0" style="min-height: 350px; max-height: 350px">
                    <div class="table-responsive">
                        <table class="table tableBodyScroll">
                            <tbody>
                                <tr>
                                    <td style="width: 100%;">Pendapatan</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>Lain-lain</td>
                                    <td>3</td>
                                </tr>
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
                    <div class="card-category">March 25 - April 02</div>
                </div>
                <div class="card-body p-0" style="min-height: 350px; max-height: 350px">
                    <div class="table-responsive">
                        <table class="table tableBodyScroll">
                            <tbody>
                                <tr>
                                    <td style="width: 100%;">Pendapatan</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>Lain-lain</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
