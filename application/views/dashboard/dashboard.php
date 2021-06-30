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
        <div class="col-md-5">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Jumlah Transaksi</div>
                    <div class="card-category">March 25 - April 02</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-3 mb-0">Pemasukan</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-3 mb-0">Pengeluaran</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Total Transaksi</div>
                    <div class="row py-3">
                        <div class="col-md-3 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Total Pemasukan</h6>
                                <h3 class="fw-bold">$9.782</h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-danger op-8">Total Pengeluaran</h6>
                                <h3 class="fw-bold">$1,248</h3>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div id="chart-container">
                                <canvas id="totalIncomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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
    </div>
</div>
                
