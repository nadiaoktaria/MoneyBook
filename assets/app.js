(function ($) {
	//----------Tabel Pemasukan----------//
	$("#datatable_pemasukan").DataTable({
		aLengthMenu: [
			[10, 30, 50, -1],
			[10, 30, 50, "All"],
		],
		order: [],
		processing: true,
		language: {
			search: '<i class="fa fa-search"></i>',
			searchPlaceholder: "search",
			emptyTable: "Tidak ada history pemasukan!",
		},
	});

	//----------Tabel Pengeluaran----------//
	$("#datatable_pengeluaran").DataTable({
		aLengthMenu: [
			[10, 30, 50, -1],
			[10, 30, 50, "All"],
		],
		order: [],
		processing: true,
		language: {
			search: '<i class="fa fa-search"></i>',
			searchPlaceholder: "search",
			emptyTable: "Tidak ada history pengeluaran!",
		},
	});

	//--------------Ajax Kategori Pemasukan--------------//
	const tableKat = $.ajax({
		type: "GET",
		url: "dashboard/get_kategori_pemasukan",
		dataType: "json",
		success: function (data) {
			var html = "";
			for (var i = 0; i < data.length; i++) {
				html +=
					"<tr>" +
					'<td id="kode" >' +
					data[i].kode +
					"</td>" +
					'<td id="nama_kategori" >' +
					data[i].nama_kategori +
					"</td>" +
					"<td>" +
					'<a href="#" data-nama="'+data[i].nama_kategori+'" data-kode="'+data[i].kode+'" data-id="'+data[i].id_kategori_pemasukan+'" id="edit_kategori_pemasukan" class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
					'<a href="#" data-id="'+data[i].id_kategori_pemasukan+'" id="hapus_kategori_pemasukan" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>' +
					"</td>" +
					"</tr>";
			}
			$("#tabel_kategori_pemasukan tbody").html(html);
		},
	});

	$('#tabel_kategori_pemasukan tbody').on("click",'#edit_kategori_pemasukan' ,function(e){
		var id_kategori = $(this).data('id');
		
		$('input[name="kode"]').val($(this).data("kode"));
		$('input[name="nama_kategori"]').val($(this).data("nama"));
		$('input[name="btn_add"]').val("Edit");

		$('body').on('click',"input#tambah_edit_kaetgori_pemasukan",function(){
			let kode_kategori = $('input[name="kode"]').val();
			let nama_kategori = $('input[name="nama_kategori"]').val();
			$.ajax({
				url: "dashboard/edit_kategori_pemasukan",
				method:"POST",
				data:{
					id: id_kategori,
					kode: kode_kategori,
					nama: nama_kategori,
				},
				success:function(response) {
					if(response=="success"){
						swal("Berhasil", "Kategori Pemasukan Berhasil di Ganti!", {
							icon : "success",
							buttons: {        			
								confirm: {
									className : 'btn btn-success'
								}
							},
						}); 
	
						setTimeout(() => {
							window.location.reload();
						}, 1000);
	
					} else {
						swal("Gagal", "Kategori Pemasukan Gagal di Ganti!", {
							icon : "error",
							buttons: {        			
								confirm: {
									className : 'btn btn-danger'
								}
							},
						}); 
					}
				}
			});
		});
		
		
	});

	$('#tabel_kategori_pemasukan tbody').on("click",'#hapus_kategori_pemasukan',function(){
		var id_kategori = $(this).data('id');
		swal({
			title: 'Apakah anda yakin?',
			text: "Data yang telah dihapus tidak dapat dikembalikan lagi!",
			type: 'warning',
			buttons:{
				confirm: {
					text : 'Ya Hapus',
					className : 'btn btn-success'
				},
				cancel: {
					visible: true,
					text : 'Batal',
					className: 'btn btn-danger'
				}
			}
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url: "dashboard/hapus_kategori_pemasukan",
					method:"POST",
					data:{
						id: id_kategori,
					},
					success:function(response) {
						if(response=="success"){
							swal("Berhasil", "Kategori Pemasukan Berhasil di Hapus!", {
								icon : "success",
								buttons: {        			
									confirm: {
										className : 'btn btn-success'
									}
								},
							}); 

							setTimeout(() => {
								window.location.reload();
							}, 1000);

						} else {
							swal("Gagal", "Kategori Pemasukan Gagal di Hapus!", {
								icon : "error",
								buttons: {        			
									confirm: {
										className : 'btn btn-danger'
									}
								},
							}); 
						}
					}
				});
			} else {
				swal.close();
			}
			
		});
	});

	//--------------Ajax Menampilkan Kategori Pengeluaran--------------//
	$.ajax({
		type: "GET",
		url: "dashboard/get_kategori_pengeluaran",
		dataType: "json",
		success: function (data) {
			var html = "";
			for (var i = 0; i < data.length; i++) {
				html +=
					"<tr>" +
					"<td>" +
					data[i].kode +
					"</td>" +
					"<td>" +
					data[i].nama_kategori +
					"</td>" +
					"<td>" +
					'<a class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
					'<a href="dashboard/hapus_kategori_pengeluaran/' +
					data[i].id_kategori_pengeluaran +
					'" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>' +
					"</td>" +
					"</tr>";
			}
			$("#tabel_kategori_pengeluaran tbody").html(html);
		},
	});


	//-----------------------------Tampilan Pada Dashboard-----------------------------//
	Circles.create({
		id: "circles-1",
		radius: 45,
		value: 70,
		maxValue: 100,
		width: 7,
		text: 36,
		colors: ["#f1f1f1", "#2BB930"],
		duration: 400,
		wrpClass: "circles-wrp",
		textClass: "circles-text",
		styleWrapper: true,
		styleText: true,
	});

	Circles.create({
		id: "circles-2",
		radius: 45,
		value: 40,
		maxValue: 100,
		width: 7,
		text: 12,
		colors: ["#f1f1f1", "#F25961"],
		duration: 400,
		wrpClass: "circles-wrp",
		textClass: "circles-text",
		styleWrapper: true,
		styleText: true,
	});

	var mytotalIncomeChart = new Chart(totalIncomeChart, {
		type: "bar",
		data: {
			labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
			datasets: [
				{
					label: "Total Income",
					backgroundColor: "#ff9e27",
					borderColor: "rgb(23, 125, 255)",
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				},
			],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			scales: {
				yAxes: [
					{
						ticks: {
							display: false, //this will remove only the label
						},
						gridLines: {
							drawBorder: false,
							display: false,
						},
					},
				],
				xAxes: [
					{
						gridLines: {
							drawBorder: false,
							display: false,
						},
					},
				],
			},
		},
	});

	var myDoughnutChart = new Chart(doughnutChart, {
		type: "doughnut",
		data: {
			datasets: [
				{
					data: [20, 30],
					backgroundColor: ["#fdaf4b", "#1d7af3"],
				},
			],
			labels: ["Yellow", "Blue"],
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

	$("#tambah_kategori_pemasukan").parsley();
	$("#tambah_kategori_pengeluaran").parsley();
})(jQuery);
