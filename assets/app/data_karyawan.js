(function ($) {
	var table_karyawan = $("#datatable_karyawan").DataTable({
		ajax: {
			url: "dashboard/get_data_karyawan",
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
			emptyTable: "Belum ada data karyawan!",
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
			{ data: "Nama" },
			{ data: "NIK" },
			{ data: "Jabatan" },
			{ data: "NoHp" },
			{ data: "Alamat" },
			{ data: "Aksi", render: function (data, type, row, meta) {
				return type === "display"
				? '<a data-id="' + data + '" id="edit_data_karyawan" class="text-success mr-2" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
				  '<a data-id="' + data + '" id="hapus_data_karyawan" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>': 
					data;
				},
			},
		],
	});

	$("body").on("click", "#tambah_karyawan", function () {
		$('#KaryawanAdd').modal();

		$('select[name="nama"]').val('');
		$('select[name="nik"]').val('');
		$('input[name="jabatan"]').val('');
		$('input[name="no_hp"]').val('');
		$('input[name="alamat"]').val('');

		$('input[name="edit_dataKaryawan"]').attr("type", "hidden");
		$('input[name="add_dataKaryawan"]').attr("type", "text");

		$("body").on("click", "input#add_dataKaryawan", function () {
			let nama = $('input[name="nama"]').val();
			let nik = $('input[name="nik"]').val();
			let jabatan = $('input[name="jabatan"]').val();
			let no_hp = $('input[name="no_hp"]').val();
			let alamat = $('input[name="alamat"]').val();
	
			$.ajax({
				url: "dashboard/tambah_data_karyawan",
				method: "POST",
				data: {
					nama: nama,
					nik: nik,
					jabatan: jabatan,
					no_hp: no_hp,
					alamat: alamat,
				},
				success: function (response) {
					if (response == "success") {
						swal("Berhasil", "Karyawan Berhasil di Tambah!", {
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
								},
							},
						});
						setTimeout(() => { window.location.reload() }, 1000);
					} else {
						swal("Gagal", "Karyawan Gagal di Tambah!", {
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

	$("#datatable_karyawan tbody").on("click","#edit_data_karyawan",function () {
		$('#KaryawanAdd').modal();

		var id_karyawan = $(this).data("id");
		var data = table_karyawan.row($(this).parents("tr")).data();
		let nama = data["Nama"];
		let nik = data["NIK"];
		let jabatan = data["Jabatan"];
		let no_hp = data["NoHp"];
		let alamat = data["Alamat"];

		$('input[name="nama"]').val(nama);
		$('input[name="nik"]').val(nik);
		$('input[name="jabatan"]').val(jabatan);
		$('input[name="no_hp"]').val(no_hp);
		$('input[name="alamat"]').val(alamat);

		$('input[name="edit_dataKaryawan"]').attr("type", "text");
		$('input[name="add_dataKaryawan"]').attr("type", "hidden");

		$("body").on("click", "input#edit_dataKaryawan", function () {
			let get_nama = $('input[name="nama"]').val();
			let get_nik = $('input[name="nik"]').val();
			let get_jabatan = $('input[name="jabatan"]').val();
			let get_no_hp = $('input[name="no_hp"]').val();
			let get_alamat = $('input[name="alamat"]').val();

			$.ajax({
				url: "dashboard/edit_data_karyawan",
				method: "POST",
				data: {
                    id_karyawan: id_karyawan,
					nama: get_nama,
					nik: get_nik,
					jabatan: get_jabatan,
					no_hp: get_no_hp,
					alamat: get_alamat,
				},
				success: function (response) {
					if (response == "success") {
						swal("Berhasil", "Data Karyawan Berhasil di Ganti!", {
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
								},
							},
						});
						setTimeout(() => { window.location.reload() }, 1000);
					} else {
						swal("Gagal", "Data Karyawan Gagal di Ganti!", {
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

	$("#datatable_karyawan tbody").on("click","#hapus_data_karyawan",function () {
		var id_karyawan = $(this).data("id");
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
					url: "dashboard/hapus_data_karyawan",
					method: "POST",
					data: {
						id: id_karyawan,
					},
					success: function (response) {
						if (response == "success") {
							swal("Berhasil", "Data Karyawan Berhasil di Hapus!", {
								icon: "success",
								buttons: {
									confirm: {
										className: "btn btn-success",
									},
								},
							});
							setTimeout(() => { window.location.reload() }, 1000);
						} else {
							swal("Gagal", "Data Karyawan Gagal di Hapus!", {
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
