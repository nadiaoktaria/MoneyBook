(function ($) {
	var table_utang = $("#datatable_utang").DataTable({
		ajax: {
			url: "dashboard/get_utang",
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
			emptyTable: "Belum ada history utang!",
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
				messageTop: "List Laporan Utang",
			},
			{
				extend: "print",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-print mr-2"></i> Print',
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
				messageTop: "List Laporan Utang",
			},
			{
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-sync-alt mr-2"></i> Refresh',
				action: function (e, dt, node, config) {
					table_utang.ajax.reload();
				},
			},
		],
		bAutoWidth: false,
		columns: [
			{ data: "No" },
			{ data: "Aksi",
				render: function (data, type, row, meta) {
					return type === "display" ?
                    '<div class="btn-group" role="group">'
                    +'<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:3px 15px 3px 15px;"></button>'
                    +'<div class="dropdown-menu">'
                        +'<a class="dropdown-item" data-id="'+data+'" id="edit_utang"> <i class="fas fa-edit mr-2"></i> Edit</a>'
                        +'<a class="dropdown-item" data-id="'+data+'" id="hapus_utang"> <i class="fas fa-trash mr-2"></i> Hapus</a>'
                    +'</div>'
                    +'</div>':
                    data;
			}},
			{ data: "Kreditur" },
			{ data: "Jumlah_Utang" },
			{ data: "Jumlah_Bayar" },
			{ data: "Tanggal_Utang" },
			{ data: "Tanggal_Tempo" },
			{ data: "Keterangan" },
            { data: "Status",render : function ( data, type, row, meta ) {
                let html = '';
                if(data =='Lunas'){
                    html = '<button class="btn btn-success" style="padding:3px 15px 3px 15px;">Lunas</button>';
                }else if(data =='Belum Lunas'){
                    html ='<button class="btn btn-danger" style="padding:3px 15px 3px 15px;">Belum Lunas</button>';
                }
                return type === 'display'  ?
                 ''+html:
                  data;
            }},
            { data: "Pengingat",render : function ( data, type, row, meta ) {
                let html = '';
                if(data =='Aktif'){
                    html = '<button class="btn btn-primary" style="padding:3px 15px 3px 15px;">Aktif</button>';
                }else if(data =='Pasif'){
                    html ='<button class="btn btn-info" style="padding:3px 15px 3px 15px;">Pasif</button>';
                }
                return type === 'display'  ?
                 ''+html:
                  data;
            }},
		],
	});

	$("body").on("click", "#tambah_utang", function () {
		$("#utangAdd").modal();

		$('input[name="kreditur"]').val("");
		$('input[name="jumlah_utang"]').val("");
		$('input[name="jumlah_bayar"]').val("");
		$('input[name="tanggal_utang"]').val(moment().format("YYYY-MM-DD"));
		$('input[name="tanggal_tempo"]').val(moment().format("YYYY-MM-DD"));
		$('input[name="keterangan"]').val("");
		$('select[name="status_utang"]').val("");
		$('select[name="pengingat"]').val("");

		$('input[name="editUtang"]').attr("type", "hidden");
		$('input[name="addUtang"]').attr("type", "text");

		$("body").on("click", "input#addUtang", function () {
			let kreditur = $('input[name="kreditur"]').val();
			let jumlah_utang = $('input[name="jumlah_utang"]').val().split(".").join("");
			let jumlah_bayar = $('input[name="jumlah_bayar"]').val().split(".").join("");
			let tanggal_utang = $('input[name="tanggal_utang"]').val();
			let tanggal_tempo = $('input[name="tanggal_tempo"]').val();
			let keterangan = $('input[name="keterangan"]').val();
			let status_utang = $('select[name="status_utang"] > option:selected').val();
			let pengingat = $('select[name="pengingat"] > option:selected').val();

			$.ajax({
				url: "dashboard/tambah_utang",
				method: "POST",
				data: {
					kreditur: kreditur,
					jumlah_utang: jumlah_utang,
					jumlah_bayar: jumlah_bayar,
					tanggal_utang: tanggal_utang,
					tanggal_tempo: tanggal_tempo,
					keterangan: keterangan,
					status_utang: status_utang,
					pengingat: pengingat,
				},
				success: function (response) {
					if (response == "success") {
						swal("Berhasil", "Catatan Utang Berhasil di Tambah!", {
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
						swal("Gagal", "Catatan Utang Gagal di Tambah!", {
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

	$("#datatable_utang tbody").on("click","#edit_utang",function () {
        $("#utangAdd").modal();

        var id_utang = $(this).data("id");
        var data = table_utang.row($(this).parents("tr")).data();
        let kreditur = data["Kreditur"];
        let jumlah_utang = data["Jumlah_Utang"].split("Rp").join("");
        let jumlah_bayar = data["Jumlah_Bayar"].split("Rp").join("");
        let tanggal_utang = data["Tanggal_Utang"];
        let tanggal_tempo = data["Tanggal_Tempo"];
        let keterangan = data["Keterangan"];
        let status_utang = data["Status"];
        let pengingat = data["Pengingat"];

        $('input[name="kreditur"]').val(kreditur);
        $('input[name="jumlah_utang"]').val(jumlah_utang);
        $('input[name="jumlah_bayar"]').val(jumlah_bayar);
        $('input[name="tanggal_utang"]').val(tanggal_utang);
        $('input[name="tanggal_tempo"]').val(tanggal_tempo);
        $('input[name="keterangan"]').val(keterangan);
        $('select[name="status_utang"]').val(status_utang);
        $('select[name="pengingat"]').val(pengingat);

        $('input[name="editUtang"]').attr("type", "text");
        $('input[name="addUtang"]').attr("type", "hidden");

        $("body").on("click", "input#editUtang", function () {
            let get_kreditur = $('input[name="kreditur"]').val();
            let get_jumlah_utang = $('input[name="jumlah_utang"]').val().split(".").join("");
            let get_jumlah_bayar = $('input[name="jumlah_bayar"]').val().split(".").join("");
            let get_tanggal_utang = $('input[name="tanggal_utang"]').val();
            let get_tanggal_tempo = $('input[name="tanggal_tempo"]').val();
            let get_keterangan = $('input[name="keterangan"]').val();
            let get_status_utang = $('select[name="status_utang"] option:selected').val();
            let get_pengingat = $('select[name="pengingat"] option:selected').val();

            $.ajax({
                url: "dashboard/edit_utang",
                method: "POST",
                data: {
                    id_utang: id_utang,
                    kreditur: get_kreditur,
                    jumlah_utang: get_jumlah_utang,
                    jumlah_bayar: get_jumlah_bayar,
                    tanggal_utang: get_tanggal_utang,
                    tanggal_tempo: get_tanggal_tempo,
                    keterangan: get_keterangan,
                    status_utang: get_status_utang,
                    pengingat: get_pengingat,
                },
                success: function (response) {
                    if (response == "success") {
                        swal("Berhasil", "Catatan Utang Berhasil di Ganti!", {
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
                        swal("Gagal", "Catatan Utang Gagal di Ganti!", {
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

	$("#datatable_utang tbody").on("click","#hapus_utang",function () {
        var id_utang = $(this).data("id");
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
                    url: "dashboard/hapus_utang",
                    method: "POST",
                    data: {
                        id: id_utang,
                    },
                    success: function (response) {
                        if (response == "success") {
                            swal("Berhasil", "Catatan Utang Berhasil di Hapus!", {
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
                            swal("Gagal", "Catatan Utang Gagal di Hapus!", {
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

	$('#tanggal_utang').datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function() { $(this).datepicker('hide') });
	$('#tanggal_bayar').datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function() { $(this).datepicker('hide') });
})(jQuery);