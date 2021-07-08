(function ($) {
	const table_pengeluaran = $("#datatable_pengeluaran").DataTable({
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

	$("body").on("click", "input#add_trans_pengeluaran", function () {
		console.log("Berhasil Klik");

		let id_kategori = $('select[name="kategori"] > option:selected').val();
		let nominal = $('input[name="nominal"]').val().split(".").join("");
		let catatan = $('input[name="catatan"]').val();

		$.ajax({
			url: "dashboard/tambah_tansaksi_pengeluaran",
			method: "POST",
			data: {
				id_kategori: id_kategori,
				nominal: nominal,
				catatan: catatan,
			},
			success: function (response) {
				if (response == "success") {
					swal("Berhasil", "Transaksi pengeluaran Berhasil di Tambah!", {
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
					swal("Gagal", "Transaksi pengeluaran Gagal di Tambah!", {
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

	$("#datatable_pengeluaran tbody").on(
		"click",
		"#edit_trans_pengeluaran",
		function () {
			var id_pengeluaran = $(this).data("id");
			var data = table_pengeluaran.row($(this).parents("tr")).data();
			let nominal = data["Nominal"].split("Rp ").join("");
			let catatan = data["Keterangan"];
			let id_kategori = data["id_kategori"];

			$('select[name="kategori"]').val(id_kategori);
			$('input[name="nominal"]').val(nominal);
			$('input[name="catatan"]').val(catatan);

			$('input[name="edit_transPengeluaran"]').attr("type", "text");
			$('input[name="add_transPengeluaran"]').attr("type", "hidden");

			$("body").on("click", "input#edit_trans_pengeluaran", function () {
				let get_id_kategori = $(
					'select[name="kategori"] option:selected'
				).val();
				let get_nominal = $('input[name="nominal"]').val().split(".").join("");
				let get_catatan = $('input[name="catatan"]').val();

				$.ajax({
					url: "dashboard/edit_transaksi_pengeluaran",
					method: "POST",
					data: {
						id_pengeluaran: id_pengeluaran,
						id_kategori: get_id_kategori,
						nominal: get_nominal,
						catatan: get_catatan,
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
							swal("Gagal", "Kategori pengeluaran Gagal di Ganti!", {
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
