<div class="panel-header">
    <div class="page-inner py-4">
        <div class="alert alert-warning" role="alert">                   
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Selamat Datang <?= $pengguna['email']; ?>
        </div>
        
        <div class="row pb-3">
            <div class="col-md-10">
                <h2 class="fw-bold">Dashboard</h2>
            </div>
            <div class="col-md-2">
                <div class="form-group p-1" style="border: 1px solid #e8e8e8; border-radius: 4px; background-color: #fff;">
                    <div class="input-group" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="" style="background-color: #fff; border-color: #fff !important;"><i class="icon-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="daterange" name="daterange" value="This Month" style="background: #fff !important;" readonly>
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
                    <h3 class="fw-bold"><?= "Rp " . number_format($pemasukan['total_pemasukan'],0,',','.'); ?></h3>
                </div>
            </div>
            <div class="card" style="min-height: 140px; max-height: 140px">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold text-uppercase text-danger op-7">Pengeluaran</h5>
                        <p class="text-danger"><i class="fa fa-chevron-down"></i></p>
                    </div>
                    <h3 class="fw-bold"><?= "Rp " . number_format($pengeluaran['total_pengeluaran'],0,',','.'); ?></h3>
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
                    <div class="chart-container">
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
                </div>
                <div class="card-body p-0" style="min-height: 330px; max-height: 330px">
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
             
	<!-- Chart JS -->
	<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>   
	<!-- Moris Line -->
    <script src="<?= base_url() ?>assets/js/plugin/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/morris.js/morris.min.js"></script>
	<!-- Daterange Picker -->
    <script src="<?= base_url() ?>assets/js/plugin/datepickerange/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/datepickerange/daterangepicker.js"></script>

<script>
(function ($) {
    

    var start = moment().startOf('month');
    var end = moment().endOf('month');
    let label="This Month";

    $('#daterange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    },cb);
    cb(start, end, label); 
    function cb(start,end, label) {

        // console.log(start.format('YYYY-MM-DD').substring(5, 7) , start.format('YYYY'));

        switch(start.format('MM')) {
            case "01":
                label = "Januari" + start.format('YYYY');
                console.log(label);
                break;
        } 

        //reset
        $('input[name="daterange"]').val('');
        // $('input[name="daterange"]').removeAttr('data-startdate');
        // $('input[name="daterange"]').removeAttr('data-enddate');
        //append
        $('input[name="daterange"]').val('Januari');
        // $('input[name="daterange"]').attr('data-startdate',start.format('YYYY-MM-DD'));
        // $('input[name="daterange"]').attr('data-enddate',end.format('YYYY-MM-DD'));
    }

	new Chart(doughnutChart, {
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

    new Morris.Line({
        element: 'morrisLine',
        data: [
            { tanggal: '2021-07-01', value: 1000000 },
            { tanggal: '2021-07-02', value: 0 },
            { tanggal: '2021-07-03', value: 200000 },
            { tanggal: '2021-07-04', value: 300000 },
            { tanggal: '2021-07-05', value: 2000000 },
            { tanggal: '2021-07-06', value: 0 },
            { tanggal: '2021-07-07', value: 0 },
            { tanggal: '2021-07-08', value: 0 },
            { tanggal: '2021-07-09', value: 0 },
            { tanggal: '2021-07-10', value: 0 },
            { tanggal: '2021-07-11', value: 0 },
            { tanggal: '2021-07-12', value: 0 },
            { tanggal: '2021-07-13', value: 0 },
            { tanggal: '2021-07-14', value: 0 },
            { tanggal: '2021-07-15', value: 300000 },
            { tanggal: '2021-07-16', value: 0 },
            { tanggal: '2021-07-17', value: 0 },
            { tanggal: '2021-07-18', value: 0 },
            { tanggal: '2021-07-19', value: 0 },
            { tanggal: '2021-07-20', value: 0 },
            { tanggal: '2021-07-21', value: 0 },
            { tanggal: '2021-07-22', value: 0 },
            { tanggal: '2021-07-23', value: 1000000 },
            { tanggal: '2021-07-24', value: 0 },
            { tanggal: '2021-07-25', value: 0 },
            { tanggal: '2021-07-26', value: 0 },
            { tanggal: '2021-07-27', value: 0 },
            { tanggal: '2021-07-28', value: 0 },
            { tanggal: '2021-07-29', value: 0 },
            { tanggal: '2021-07-30', value: 0 },
        ],
        xkey:'tanggal',
        ykeys:['value'],
        labels:['value'],
        lineColors: ['#f77eb9'],
        gridLineColor: ['rgba(77, 138, 240, .2)'],
    });

})(jQuery);

</script>