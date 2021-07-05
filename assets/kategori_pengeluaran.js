(function ($) {
	$.ajax({
		type: "GET",
		url: "dashboard/get_kategori_pengeluaran",
		dataType: "json",
		success: function (data) {
			var html = "";
			if(data.length < 1){
				html = '<tr><td colspan="3" style="text-align:center">Belum ada kategori pengeluaran!</td></tr>';
			}else {
				for (var i = 0; i < data.length; i++) {
					html +=
						"<tr>" +
						'<td>' +
						data[i].kode +
						"</td>" +
						'<td>' +
						data[i].nama_kategori +
						"</td>" +
						"<td>" +
						'<a data-nama="' +
						data[i].nama_kategori +
						'" data-kode="' +
						data[i].kode +
						'" data-id="' +
						data[i].id_kategori_pengeluaran +
						'" id="EditKategori_pengeluaran" class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
						'<a data-id="' +
						data[i].id_kategori_pengeluaran +
						'" id="hapus_kategori_pengeluaran" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>' +
						"</td>" +
						"</tr>";
				}
			}
			$("#tabel_kategori_pengeluaran tbody").html(html);
		},
	});

	$("body").on("click", "input#add_kategori_pengeluaran", function () {
		let kode_kategori = $('input[name="kode"]').val();
		let nama_kategori = $('input[name="nama_kategori"]').val();

		$.ajax({
			url: "dashboard/tambah_kategori_pengeluaran",
			method: "POST",
			data: {
				kode: kode_kategori,
				nama: nama_kategori,
			},
			success: function (response) {
				if (response == "success") {
					swal("Berhasil", "Kategori pengeluaran Berhasil di Tambah!", {
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
					swal("Gagal", "Kategori pengeluaran Gagal di Tambah!", {
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

	$("#tabel_kategori_pengeluaran tbody").on(
		"click",
		"#EditKategori_pengeluaran",
		function () {
			var id_kategori = $(this).data("id");

			$('input[name="edit_katPengeluaran"]').attr("type", "text");
			$('input[name="add_katPengeluaran"]').attr("type", "hidden");
			$('input[name="kode"]').val($(this).data("kode"));
			$('input[name="nama_kategori"]').val($(this).data("nama"));

			$("body").on("click", "input#edit_kategori_pengeluaran", function () {
				let kode_kategori = $('input[name="kode"]').val();
				let nama_kategori = $('input[name="nama_kategori"]').val();
				$.ajax({
					url: "dashboard/edit_kategori_pengeluaran",
					method: "POST",
					data: {
						id: id_kategori,
						kode: kode_kategori,
						nama: nama_kategori,
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

	$("#tabel_kategori_pengeluaran tbody").on(
		"click",
		"#hapus_kategori_pengeluaran",
		function () {
			var id_kategori = $(this).data("id");
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
						url: "dashboard/hapus_kategori_pengeluaran",
						method: "POST",
						data: {
							id: id_kategori,
						},
						success: function (response) {
							if (response == "success") {
								swal("Berhasil", "Kategori pengeluaran Berhasil di Hapus!", {
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
								swal("Gagal", "Kategori pengeluaran Gagal di Hapus!", {
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
