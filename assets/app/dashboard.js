(function ($) {
    

    // var start = moment().startOf('month');
    // var end = moment().endOf('month');
    // let label="This Month";

    // $('#daterange').daterangepicker({
    //     startDate: start,
    //     endDate: end,
    //     ranges: {
    //     'This Month': [moment().startOf('month'), moment().endOf('month')],
    //     'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     }
    // },cb);
    // cb(start, end, label); 
    // function cb(start,end, label) {

    //     // console.log(start.format('YYYY-MM-DD').substring(5, 7) , start.format('YYYY'));

    //     switch(start.format('MM')) {
    //         case "01":
    //             label = "Januari" + start.format('YYYY');
    //             console.log(label);
    //             break;
    //     } 

    //     //reset
    //     $('input[name="daterange"]').val('');
    //     // $('input[name="daterange"]').removeAttr('data-startdate');
    //     // $('input[name="daterange"]').removeAttr('data-enddate');
    //     //append
    //     $('input[name="daterange"]').val('Januari');
    //     // $('input[name="daterange"]').attr('data-startdate',start.format('YYYY-MM-DD'));
    //     // $('input[name="daterange"]').attr('data-enddate',end.format('YYYY-MM-DD'));
    // }


    $("#daterange").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months",
    }).on('changeDate', function (e) {
        $(this).datepicker('hide'); 
        document.getElementById('daterange').value='text to be displayed' ; 
        filter(e);
    });

    function filter(e){
        console.log(e.date.getMonth()+1);
        $('input[name="daterange"]').val('Januari');
    }

	new Chart(doughnutChart, {
		type: "doughnut",
		data: {
			datasets: [
				{
					data: [10, 10],
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
