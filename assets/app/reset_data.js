(function ($) {
    
    $("body").on("click", "#reset_pemasukan", function () {
		var id_pengguna = $(this).data("id");
        swal({
            icon : "warning",
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
					url: "dashboard/reset_trans_pemasukan",
					method: "POST",
					data: {
						id: id_pengguna,
					},
					success: function (response) {
						if (response == "success") {
							swal("Berhasil", "Semua Transaksi Pemasukan Berhasil di Hapus!", {
								icon: "success",
								buttons: {
									confirm: {
										className: "btn btn-success",
									},
								},
							});
							setTimeout(() => { window.location.reload() }, 1000);
						} else {
							swal("Gagal", "Semua Transaksi Pemasukan Gagal di Hapus!", {
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


    $("body").on("click", "#reset_pengeluaran", function () {
		var id_pengguna = $(this).data("id");
        swal({
            icon : "warning",
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
					url: "dashboard/reset_trans_pengeluaran",
					method: "POST",
					data: {
						id: id_pengguna,
					},
					success: function (response) {
						if (response == "success") {
							swal("Berhasil", "Semua Transaksi Pengeluaran Berhasil di Hapus!", {
								icon: "success",
								buttons: {
									confirm: {
										className: "btn btn-success",
									},
								},
							});
							setTimeout(() => { window.location.reload() }, 1000);
						} else {
							swal("Gagal", "Semua Transaksi Pengeluaran Gagal di Hapus!", {
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