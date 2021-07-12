(function ($) {
    var this_month = moment().format('MM');
    filter(this_month);

    $("#daterange").datepicker( {
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months",
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
        var numb = e.date.getMonth()+1;
        this_month = ( numb < 10 ? '0' : '') + numb;
        filter(this_month);
    });

    function filter(month){
        $.ajax({
            url: "dashboard/ajax_dashboard",
            method: "POST",
            dataType: 'json',
            data: { month: month },
            success: function (data) {
                if (data.massage == "success") {
                    diagramMorris(data.dataMorris);
                    diagramDonut(data.dataDonut);
                    jumlahKategori(data.datakatPemasukan,data.datakatPengeluaran);
                    PemasukanPengeluaran(data.totalPemasukan, data.totalPengeluaran);
                } 
            },
        });
    }

    function PemasukanPengeluaran(totalPemasukan,totalPengeluaran){
        document.getElementById("total_pemasukan").innerHTML = totalPemasukan;
        document.getElementById("total_pengeluaran").innerHTML = totalPengeluaran;
    }

    function diagramMorris(dataMorris){
        $('#morrisLine').html('');
        new Morris.Line({
            element: 'morrisLine',
            data: dataMorris,
            xkey:'tanggal',
            ykeys:['value'],
            labels:['value'],
            lineColors: ['#f77eb9'],
            gridLineColor: ['rgba(77, 138, 240, .2)'],
        });

    }
    
    function diagramDonut(dataDonut){
        $('#doughnutChart').remove();
        $('#tableDonut').append('<canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>');
        new Chart(doughnutChart, {
            type: "doughnut",
            data: {
                datasets: [{
                    data: dataDonut,
                    backgroundColor: ["#fdaf4b", "#1d7af3"],
                }],
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
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                          var dataset = data.datasets[tooltipItem.datasetIndex];
                          var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                          var total = meta.total;
                          var currentValue = dataset.data[tooltipItem.index];
                          var percentage = parseFloat((currentValue/total*100).toFixed(1));
                          return percentage + '%';
                        },
                        title: function(tooltipItem, data) {
                          return data.labels[tooltipItem[0].index];
                        }
                      }
                }
            },
        });
    }

    function jumlahKategori(datakatPemasukan,datakatPengeluaran){
        var htmlPemasukan = "";
        var htmlPengeluaran = "";
        for (kat in datakatPemasukan){
            htmlPemasukan += '<tr><td style="width: 100%;">'+ kat +'</td><td>'+ datakatPemasukan[kat] +'</td></tr>';
        }
        for (kat in datakatPengeluaran){
            htmlPengeluaran += '<tr><td style="width: 100%;">'+ kat +'</td><td>'+ datakatPengeluaran[kat] +'</td></tr>';
        }
        $("#jumlah_kategori_pemasukan tbody").html(htmlPemasukan);
        $("#jumlah_kategori_pengeluaran tbody").html(htmlPengeluaran);
    }

	$('#tanggal').datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function() { $(this).datepicker('hide') });
    
})(jQuery);
