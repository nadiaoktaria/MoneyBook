(function ($) {
	var table_pengeluaran = $("#datatable_pengeluaran").DataTable({
		ajax: {
			url: "dashboard/get_transaksi_pengeluaran",
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
			searchPlaceholder: "search",
			emptyTable: "Belum ada history pengeluaran!",
		},
		dom: '<"toolbardate_report"><Bfrtip><"bottom mb-4 text-center"l> ',
		buttons: [
			{
				extend: "pdf",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-file-pdf mr-2"></i> PDF',
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
				messageTop: "List Laporan Pengeluaran",
			},
			{
				extend: "print",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-print mr-2"></i> Print',
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
				messageTop: "List Laporan Pengeluaran",
			},
			{
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-sync-alt mr-2"></i> Refresh',
				action: function (e, dt, node, config) {
					table_pengeluaran.ajax.reload();
				},
			},
		],
		columns: [
			{ data: "No" },
			{ data: "Tanggal" },
			{ data: "Kategori" },
			{ data: "Nominal" },
			{ data: "Keterangan" },
			{
				data: "Aksi",
				render: function (data, type, row, meta) {
					return type === "display"
						? '<a data-id="' +
								data +
								'" id="edit_trans_pengeluaran" class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
								'<a data-id="' +
								data +
								'" id="hapus_trans_pengeluaran" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>'
						: data;
				},
			},
		],
	});

	$("body").on("click", "#", function () {
		$("#TransaksiPengeluaranAdd").modal();

		$('select[name="kategori"]').val("");
		$('input[name="nominal"]').val("");
		$('input[name="catatan"]').val("");
		$('input[name="tanggal"]').val(moment().format("YYYY-MM-DD"));

		$('input[name="edit_transPengeluaran"]').attr("type", "hidden");
		$('input[name="add_transPengeluaran"]').attr("type", "text");

		$("body").on("click", "input#add_trans_pengeluaran", function () {
			let id_kategori = $('select[name="kategori"] > option:selected').val();
			let nominal = $('input[name="nominal"]').val().split(".").join("");
			let catatan = $('input[name="catatan"]').val();
			let tanggal = $('input[name="tanggal"]').val();

			$.ajax({
				url: "dashboard/tambah_tansaksi_pengeluaran",
				method: "POST",
				data: {
					id_kategori: id_kategori,
					nominal: nominal,
					catatan: catatan,
					tanggal: tanggal,
				},
				success: function (response) {
					if (response == "success") {
						swal("Berhasil", "Transaksi Pengeluaran Berhasil di Tambah!", {
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
								},
							},
						});
						setTimeout(() => {
							window.location.reload();
						}, 1000);
					} else {
						swal("Gagal", "Transaksi Pengeluaran Gagal di Tambah!", {
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

	$("#datatable_pengeluaran tbody").on(
		"click",
		"#edit_trans_pengeluaran",
		function () {
			$("#TransaksiPengeluaranAdd").modal();

			var id_pengeluaran = $(this).data("id");
			var data = table_pengeluaran.row($(this).parents("tr")).data();
			let nominal = data["Nominal"].split("Rp ").join("");
			let catatan = data["Keterangan"];
			let tanggal = data["Tanggal"];
			let id_kategori = data["id_kategori"];

			$('select[name="kategori"]').val(id_kategori);
			$('input[name="nominal"]').val(nominal);
			$('input[name="catatan"]').val(catatan);
			$('input[name="tanggal"]').val(tanggal);

			$('input[name="edit_transPengeluaran"]').attr("type", "text");
			$('input[name="add_transPengeluaran"]').attr("type", "hidden");

			$("body").on("click", "input#edit_transPengeluaran", function () {
				let get_id_kategori = $(
					'select[name="kategori"] option:selected'
				).val();
				let get_nominal = $('input[name="nominal"]').val().split(".").join("");
				let get_catatan = $('input[name="catatan"]').val();
				let get_tanggal = $('input[name="tanggal"]').val();

				$.ajax({
					url: "dashboard/edit_transaksi_pengeluaran",
					method: "POST",
					data: {
						id_pengeluaran: id_pengeluaran,
						id_kategori: get_id_kategori,
						nominal: get_nominal,
						catatan: get_catatan,
						tanggal: get_tanggal,
					},
					success: function (response) {
						if (response == "success") {
							swal("Berhasil", "Kategori pengeluaran Berhasil di Ganti!", {
								icon: "success",
								buttons: {
									confirm: {
										className: "btn btn-success",
									},
								},
							});
							setTimeout(() => {
								window.location.reload();
							}, 1000);
						} else {
							swal("Gagal", "Kategori Pengeluaran Gagal di Ganti!", {
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
		}
	);

	$("#datatable_pengeluaran tbody").on(
		"click",
		"#hapus_trans_pengeluaran",
		function () {
			var id_pengeluaran = $(this).data("id");
			console.log(id_pengeluaran);
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
						url: "dashboard/hapus_transaksi_pengeluaran",
						method: "POST",
						data: {
							id: id_pengeluaran,
						},
						success: function (response) {
							if (response == "success") {
								swal("Berhasil", "Transaksi pengeluaran Berhasil di Hapus!", {
									icon: "success",
									buttons: {
										confirm: {
											className: "btn btn-success",
										},
									},
								});

								setTimeout(() => {
									window.location.reload();
								}, 1000);
							} else {
								swal("Gagal", "Transaksi pengeluaran Gagal di Hapus!", {
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
		}
	);
})(jQuery);
