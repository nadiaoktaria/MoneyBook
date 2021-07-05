<div class="panel-header">
    <div class="page-inner py-4">
        <div class="alert alert-warning" role="alert">                   
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Selamat Datang <?= $pengguna['email']; ?>
        </div>
        <h2 class="pb-3 fw-bold">Dashboard</h2>
        <div class="progress ht-1 mb-5" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 5%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        
    </div>
</div>

<div class="page-inner mt--5">
    <!-- <div class="row mt--2">
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
    </div> -->
    <div class="row">
        
        <div class="col-md-3">
            <!-- <div class="card">
                <div class="card-header">
                    <div class="card-title">Kategori Pemasukan</div>
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
            </div> -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-uppercase text-success op-7">Pemasukan</h5>
                        <p class="text-success"><i class="fa fa-chevron-up"></i></p>
                    </div>
                    <h3 class="fw-bold"><?= "Rp " . number_format($pemasukan['total_pemasukan'],0,',','.'); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <!-- <div class="card">
                <div class="card-header">
                    <div class="card-title">Kategori Pengeluaran</div>
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
            </div> -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-uppercase text-danger op-7">Pengeluaran</h5>
                        <p class="text-danger"><i class="fa fa-chevron-down"></i></p>
                    </div>
                    <h3 class="fw-bold"><?= "Rp " . number_format($pengeluaran['total_pengeluaran'],0,',','.'); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Persentase</div>
                </div>
                <div class="card-body" style="min-height: 330px; max-height: 330px">
                    <div class="chart-container">
                        <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
             
	<!-- Chart JS -->
	<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>   
<script>
(function ($) {
	var myDoughnutChart = new Chart(doughnutChart, {
		type: "doughnut",
		data: {
			datasets: [
				{
					data: ["<?= $pemasukan['total_pemasukan']; ?>", "<?= $pengeluaran['total_pengeluaran']; ?>"],
					backgroundColor: ["#fdaf4b", "#1d7af3"],
				},
			],
			labels: ["Pemasukan", "Pengeluaran"],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				position: "bottom",
			},
			layout: {
				padding: {
					left: 20,
					right: 20,
					top: 20,
					bottom: 20,
				},
			},
		},
	});
})(jQuery);

</script>