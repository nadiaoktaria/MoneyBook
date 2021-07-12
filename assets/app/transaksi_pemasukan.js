(function ($) {
	var table_pemasukan = $("#datatable_pemasukan").DataTable({
		ajax: {
			url: "dashboard/get_transaksi_pemasukan",
			type: "GET",
		},
		aLengthMenu: [
			[10, 30, 50, -1],
			[10, 30, 50, "All"],
		],
		order: [],
		processing: true,
		language: {
			search: '<i class="fa fa-search"></i>',
			searchPlaceholder: "Cari",
			emptyTable: "Belum ada history pemasukan!",
		},
		dom: '<"toolbardate_report"><Bfrtip><"bottom mb-4 text-center"l> ',
		buttons:[
			{
				extend: 'pdf',
				className: "btn btn-secondary wid-max-select text-white",
				text:'<i class="fas fa-file-pdf mr-2"></i> PDF',
				exportOptions: {
					columns: [0,1,2,3,4]
				},
				messageTop: 'List Laporan Pemasukan',
			},
			{
				extend: 'print',
				className: "btn btn-secondary wid-max-select text-white",
				text:'<i class="fas fa-print mr-2"></i> Print',
				exportOptions: {
					columns: [0,1,2,3,4]
				},
				messageTop: 'List Laporan Pemasukan',
			},
			{
				className: "btn btn-secondary wid-max-select text-white",
				text:'<i class="fas fa-sync-alt mr-2"></i> Refresh',
				action:function(e, dt, node, config){
					table_pemasukan.ajax.reload();
				},
			}
		],
		bAutoWidth: false, 
		columns: [
			{ data: "No" },
			{ data: "Tanggal" },
			{ data: "Kategori" },
			{ data: "Nominal" },
			{ data: "Keterangan" },
			{ data: "Aksi", render: function (data, type, row, meta) {
				return type === "display"
				? '<a data-id="' + data + '" id="edit_trans_pemasukan" class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
				  '<a data-id="' + data + '" id="hapus_trans_pemasukan" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>': 
					data;
				},
			},
		],
	});

	$("body").on("click", "#tambah_pemasukan", function () {
		$('#TransaksiPemasukanAdd').modal();

		$('select[name="kategori"]').val('');
		$('input[name="nominal"]').val('');
		$('input[name="catatan"]').val('');
		$('input[name="tanggal"]').val(moment().format('YYYY-MM-DD'));

		$('input[name="edit_transPemasukan"]').attr("type", "hidden");
		$('input[name="add_transPemasukan"]').attr("type", "text");

		$("body").on("click", "input#add_transPemasukan", function () {
			let id_kategori = $('select[name="kategori"] > option:selected').val();
			let nominal = $('input[name="nominal"]').val().split(".").join("");
			let catatan = $('input[name="catatan"]').val();
			let tanggal = $('input[name="tanggal"]').val();
	
			$.ajax({
				url: "dashboard/tambah_tansaksi_pemasukan",
				method: "POST",
				data: {
					id_kategori: id_kategori,
					nominal: nominal,
					catatan: catatan,
					tanggal: tanggal,
				},
				success: function (response) {
					if (response == "success") {
						swal("Berhasil", "Transaksi Pemasukan Berhasil di Tambah!", {
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
								},
							},
						});
						setTimeout(() => { window.location.reload() }, 1000);
					} else {
						swal("Gagal", "Transaksi Pemasukan Gagal di Tambah!", {
							icon: "error",
							buttons: {
								confirm: {
									className: "btn btn-danger",
								},
							},
						});
					}
				},
			});
		});
	});


	$("#datatable_pemasukan tbody").on("click","#edit_trans_pemasukan",function () {
		$('#TransaksiPemasukanAdd').modal();

		var id_pemasukan = $(this).data("id");
		var data = table_pemasukan.row($(this).parents("tr")).data();
		let nominal = data["Nominal"].split("Rp ").join("");
		let catatan = data["Keterangan"];
		let tanggal = data["Tanggal"];
		let id_kategori = data["id_kategori"];

		$('select[name="kategori"]').val(id_kategori);
		$('input[name="nominal"]').val(nominal);
		$('input[name="catatan"]').val(catatan);
		$('input[name="tanggal"]').val(tanggal);

		$('input[name="edit_transPemasukan"]').attr("type", "text");
		$('input[name="add_transPemasukan"]').attr("type", "hidden");

		$("body").on("click", "input#edit_transPemasukan", function () {
			let get_id_kategori = $('select[name="kategori"] option:selected').val();
			let get_nominal = $('input[name="nominal"]').val().split(".").join("");
			let get_catatan = $('input[name="catatan"]').val();
			let get_tanggal = $('input[name="tanggal"]').val();

			$.ajax({
				url: "dashboard/edit_transaksi_pemasukan",
				method: "POST",
				data: {
					id_pemasukan: id_pemasukan,
					id_kategori: get_id_kategori,
					nominal: get_nominal,
					catatan: get_catatan,
					tanggal: get_tanggal,
				},
				success: function (response) {
					if (response == "success") {
						swal("Berhasil", "Kategori Pemasukan Berhasil di Ganti!", {
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
								},
							},
						});
						setTimeout(() => { window.location.reload() }, 1000);
					} else {
						swal("Gagal", "Kategori Pemasukan Gagal di Ganti!", {
							icon: "error",
							buttons: {
								confirm: {
									className: "btn btn-danger",
								},
							},
						});
					}
				},
			});
		});
	});


	$("#datatable_pemasukan tbody").on("click","#hapus_trans_pemasukan",function () {
		var id_pemasukan = $(this).data("id");
		swal({
			title: "Apakah anda yakin?",
			text: "Data yang telah dihapus tidak dapat dikembalikan lagi!",
			type: "warning",
			buttons: {
				confirm: {
					text: "Ya Hapus",
					className: "btn btn-success",
				},
				cancel: {
					visible: true,
					text: "Batal",
					className: "btn btn-danger",
				},
			},
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url: "dashboard/hapus_transaksi_pemasukan",
					method: "POST",
					data: {
						id: id_pemasukan,
					},
					success: function (response) {
						if (response == "success") {
							swal("Berhasil", "Transaksi Pemasukan Berhasil di Hapus!", {
								icon: "success",
								buttons: {
									confirm: {
										className: "btn btn-success",
									},
								},
							});
							setTimeout(() => { window.location.reload() }, 1000);
						} else {
							swal("Gagal", "Transaksi Pemasukan Gagal di Hapus!", {
								icon: "error",
								buttons: {
									confirm: {
										className: "btn btn-danger",
									},
								},
							});
						}
					},
				});
			} else {
				swal.close();
			}
		});
	});

})(jQuery);
