(function ($) {
	$.ajax({
		type: "GET",
		url: "dashboard/get_kategori_pemasukan",
		dataType: "json",
		success: function (data) {
			var html = "";
			if(data.length < 1){
				html = '<tr><td colspan="3" style="text-align:center">Belum ada kategori pemasukan!</td></tr>';
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
						data[i].id_kategori_pemasukan +
						'" id="EditKategori_pemasukan" class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
						'<a data-id="' +
						data[i].id_kategori_pemasukan +
						'" id="hapus_kategori_pemasukan" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>' +
						"</td>" +
						"</tr>";
				}
			}
			$("#tabel_kategori_pemasukan tbody").html(html);
		},
	});

	$("body").on("click", "input#add_kategori_pemasukan", function () {
		let kode_kategori = $('input[name="kode"]').val();
		let nama_kategori = $('input[name="nama_kategori"]').val();

		$.ajax({
			url: "dashboard/tambah_kategori_pemasukan",
			method: "POST",
			data: {
				kode: kode_kategori,
				nama: nama_kategori,
			},
			success: function (response) {
				if (response == "success") {
					swal("Berhasil", "Kategori Pemasukan Berhasil di Tambah!", {
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
					swal("Gagal", "Kategori Pemasukan Gagal di Tambah!", {
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

	$("#tabel_kategori_pemasukan tbody").on(
		"click",
		"#EditKategori_pemasukan",
		function () {
			var id_kategori = $(this).data("id");

			$('input[name="edit_katPemasukan"]').attr("type", "text");
			$('input[name="add_katPemasukan"]').attr("type", "hidden");
			$('input[name="kode"]').val($(this).data("kode"));
			$('input[name="nama_kategori"]').val($(this).data("nama"));

			$("body").on("click", "input#edit_kategori_pemasukan", function () {
				let kode_kategori = $('input[name="kode"]').val();
				let nama_kategori = $('input[name="nama_kategori"]').val();
				$.ajax({
					url: "dashboard/edit_kategori_pemasukan",
					method: "POST",
					data: {
						id: id_kategori,
						kode: kode_kategori,
						nama: nama_kategori,
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

							setTimeout(() => {
								window.location.reload();
							}, 1000);
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
		}
	);

	$("#tabel_kategori_pemasukan tbody").on(
		"click",
		"#hapus_kategori_pemasukan",
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
						url: "dashboard/hapus_kategori_pemasukan",
						method: "POST",
						data: {
							id: id_kategori,
						},
						success: function (response) {
							if (response == "success") {
								swal("Berhasil", "Kategori Pemasukan Berhasil di Hapus!", {
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
								swal("Gagal", "Kategori Pemasukan Gagal di Hapus!", {
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
