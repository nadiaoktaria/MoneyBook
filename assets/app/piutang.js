(function ($) {

    //----------------------Debitur----------------------//

	var table_debitur = $("#datatable_debitur").DataTable({
		ajax: {
			url: "dashboard/get_debitur",
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
			emptyTable: "Belum ada data debitur!",
		},
		dom: '<"toolbardate_report"><Bfrtip><"bottom mb-4 text-center"l> ',
		buttons: [
			{
				className: "btn btn-warning wid-max-select text-white",
				text: '<i class="fa fa-plus mr-2"></i>Tambah Debitur',
				action: function () {
                    $("#debiturAdd").modal();
                    $('input[name="nama"]').val("");
                    $('input[name="no_hp"]').val("");
                    $('input[name="alamat"]').val("");
                    $('input[name="editDebitur"]').attr("type", "hidden");
                    $('input[name="addDebitur"]').attr("type", "text");
				},
			},
			{
				extend: "pdf",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-file-pdf mr-2"></i>PDF',
				exportOptions: {
					columns: [0, 1, 2, 3],
				},
				messageTop: "List Laporan Debitur",
			},
			{
				extend: "print",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-print mr-2"></i>Print',
				exportOptions: {
					columns: [0, 1, 2, 3],
				},
				messageTop: "List Laporan Debitur",
			},
			{
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-sync-alt mr-2"></i>Refresh',
				action: function () {
					table_debitur.ajax.reload();
				},
			},
		],
		bAutoWidth: false,
		columns: [
			{ data: "No" },
			{ data: "Nama" },
			{ data: "NoHp" },
			{ data: "Alamat" },
			{
				data: "Aksi",
				render: function (data, type, row, meta) {
					return type === "display"
						? '<a data-id="' +
								data +
								'" id="edit_debitur" class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
								'<a data-id="' +
								data +
								'" id="hapus_debitur" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>'
						: data;
				},
			},
		],
	});
    
    $("body").on("click", "input#addDebitur", function () {
        let nama = $('input[name="nama"]').val();
        let no_hp = $('input[name="no_hp"]').val();
        let alamat = $('input[name="alamat"]').val();

        $.ajax({
            url: "dashboard/tambah_debitur",
            method: "POST",
            data: {
                nama: nama,
                no_hp: no_hp,
                alamat: alamat,
            },
            success: function (response) {
                if (response == "success") {
                    swal("Berhasil", "Debitur Berhasil di Tambah!", {
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
                    swal("Gagal", "Debitur Gagal di Tambah!", {
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

	$("#datatable_debitur tbody").on("click","#edit_debitur",function () {
        $("#debiturAdd").modal();

        var id_debitur = $(this).data("id");
        var data = table_debitur.row($(this).parents("tr")).data();
        let nama = data["Nama"];
        let no_hp = data["NoHp"];
        let alamat = data["Alamat"];

        $('input[name="nama"]').val(nama);
        $('input[name="no_hp"]').val(no_hp);
        $('input[name="alamat"]').val(alamat);

        $('input[name="editDebitur"]').attr("type", "text");
        $('input[name="addDebitur"]').attr("type", "hidden");

        $("body").on("click", "input#editDebitur", function () {
            let get_nama = $('input[name="nama"]').val();
            let get_no_hp = $('input[name="no_hp"]').val();
            let get_alamat = $('input[name="alamat"]').val();

            $.ajax({
                url: "dashboard/edit_debitur",
                method: "POST",
                data: {
                    id_debitur: id_debitur,
                    nama: get_nama,
                    no_hp: get_no_hp,
                    alamat: get_alamat,
                },
                success: function (response) {
                    if (response == "success") {
                        swal("Berhasil", "Debitur Berhasil di Ganti!", {
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
                        swal("Gagal", "Debitur Gagal di Ganti!", {
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
    
	$("#datatable_debitur tbody").on("click","#hapus_debitur",function () {
        var id_debitur = $(this).data("id");
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
                    url: "dashboard/hapus_debitur",
                    method: "POST",
                    data: {
                        id: id_debitur,
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
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
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


    //----------------------Piutang----------------------//
    
	var table_piutang = $("#datatable_piutang").DataTable({
		ajax: {
			url: "dashboard/get_piutang",
			type: "GET",
		},
		aLengthMenu: [
			[10, 30, 50, -1],
			[10, 30, 50, "All"],
		],
        columnDefs: [{
            "targets": [10],
            "orderable": false,
            "visible": false,
        }],
		order: [],
		processing: true,
		language: {
			search: '<i class="fa fa-search"></i>',
			searchPlaceholder: "Cari",
			emptyTable: "Belum ada data piutang!",
		},
		dom: '<"toolbardate_report"><Bfrtip><"bottom mb-4 text-center"l> ',
		buttons: [
			{
				className: "btn btn-warning wid-max-select text-white",
				text: '<i class="fa fa-plus mr-2"></i>Tambah Piutang',
				action: function () {
                    $("#piutangAdd").modal();
                    $('select[name="debitur"]').val("");
                    $('input[name="piutang_awal"]').val("");
                    $('input[name="jumlah_bayar"]').val("");
                    $('input[name="keterangan"]').val("");
                    $('input[name="tanggal_piutang"]').val(moment().format("YYYY-MM-DD"));
                    $('input[name="tanggal_tempo"]').val(moment().format("YYYY-MM-DD"));
                    $('input[name="editPiutang"]').attr("type", "hidden");
                    $('input[name="addPiutang"]').attr("type", "text");
				},
			},
			{
				extend: "pdf",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-file-pdf mr-2"></i>PDF',
				exportOptions: {
					columns: [0, 3, 4, 5, 6, 7, 8, 9, 2],
				},
				messageTop: "List Laporan Piutang",
			},
			{
				extend: "print",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-print mr-2"></i>Print',
				exportOptions: {
					columns: [0, 3, 4, 5, 6, 7, 8, 9, 2],
				},
				messageTop: "List Laporan Piutang",
			},
			{
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-sync-alt mr-2"></i>Refresh',
				action: function () {
					table_piutang.ajax.reload();
				},
			},
		],
		bAutoWidth: false,
		columns: [
			{ data: "No" },
			{
				data: "Aksi",
				render: function (data, type, row, meta) {
					return type === "display" ?
                    '<div class="btn-group" role="group">'
                    +'<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:3px 15px 3px 15px;"></button>'
                    +'<div class="dropdown-menu">'
                        +'<a class="dropdown-item" data-id="'+data+'" id="bayar_piutang" href="#"> <i class="fas fa-credit-card mr-2"></i> Bayar</a>'
                        +'<a class="dropdown-item" data-id="'+data+'" id="edit_piutang"> <i class="fas fa-edit mr-2"></i> Edit</a>'
                        +'<a class="dropdown-item" data-id="'+data+'" id="hapus_piutang"> <i class="fas fa-trash mr-2"></i> Hapus</a>'
                    +'</div>'
                    +'</div>':
                    data;
				},
			},
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
			{ data: "Debitur" },
			{ data: "Piutang_Awal" },
			{ data: "Jumlah_Bayar" },
			{ data: "Sisa_Piutang" },
			{ data: "Keterangan" },
			{ data: "Tanggal_Piutang" },
			{ data: "Tanggal_Tempo" },
			{ data: "id_debitur" },
		],
	});
    
    $("body").on("click", "input#addPiutang", function () {
        let id_debitur = $('select[name="debitur"]').val();
        let piutang_awal = $('input[name="piutang_awal"]').val().split(".").join("");
        let jumlah_bayar = $('input[name="jumlah_bayar"]').val().split(".").join("");
        let keterangan = $('input[name="keterangan"]').val();
        let tanggal_piutang = $('input[name="tanggal_piutang"]').val();
        let tanggal_tempo = $('input[name="tanggal_tempo"]').val();

        $.ajax({
            url: "dashboard/tambah_piutang",
            method: "POST",
            data: {
                id_debitur: id_debitur,
                piutang_awal: piutang_awal,
                jumlah_bayar: jumlah_bayar,
                keterangan: keterangan,
                tanggal_piutang: tanggal_piutang,
                tanggal_tempo: tanggal_tempo,
            },
            success: function (response) {
                if (response == "success") {
                    swal("Berhasil", "Piutang Berhasil di Tambah!", {
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
                    swal("Gagal", "Piutang Gagal di Tambah!", {
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

    $("body").on("click", "#edit_piutang", function () {
        $("#piutangAdd").modal();
        var id_piutang = $(this).data("id");
        var data = table_piutang.row($(this).parents("tr")).data();

        $('select[name="debitur"]').attr('disabled', true)
        $('select[name="debitur"]').val(data.id_debitur);
        $('input[name="piutang_awal"]').val(data.Piutang_Awal.split("Rp").join(""));
        $('input[name="jumlah_bayar"]').val(data.Jumlah_Bayar.split("Rp").join(""));
        $('input[name="keterangan"]').val(data.Keterangan);
        $('input[name="tanggal_piutang"]').val(data.Tanggal_Piutang);
        $('input[name="tanggal_tempo"]').val(data.Tanggal_Tempo);
        $('input[name="editPiutang"]').attr("type", "text");
        $('input[name="addPiutang"]').attr("type", "hidden");
        
        $("body").on("click", "input#editPiutang", function () {
            let piutang_awal = $('input[name="piutang_awal"]').val().split(".").join("");
            let jumlah_bayar = $('input[name="jumlah_bayar"]').val().split(".").join("");
            let keterangan = $('input[name="keterangan"]').val();
            let tanggal_piutang = $('input[name="tanggal_piutang"]').val();
            let tanggal_tempo = $('input[name="tanggal_tempo"]').val();

            $.ajax({
                url: "dashboard/edit_piutang",
                method: "POST",
                data: {
                    id_piutang: id_piutang,
                    piutang_awal: piutang_awal,
                    jumlah_bayar: jumlah_bayar,
                    keterangan: keterangan,
                    tanggal_piutang: tanggal_piutang,
                    tanggal_tempo: tanggal_tempo,
                },
                success: function (response) {
                    if (response == "success") {
                        swal("Berhasil", "Piutang Berhasil di Ganti!", {
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
                        swal("Gagal", "Piutang Gagal di Ganti!", {
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

    $("body").on("click", "#hapus_piutang", function () {
        var id_piutang = $(this).data("id");
        swal({
            title: "Apakah anda yakin?",
            text: "Data piutang dan laporan pembayaran akan terhapus semua!",
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
                    url: "dashboard/hapus_piutang",
                    method: "POST",
                    data: {
                        id: id_piutang,
                    },
                    success: function (response) {
                        if (response == "success") {
                            swal("Berhasil", "Piutang Berhasil di Hapus!", {
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
                            swal("Gagal", "Piutang Gagal di Hapus!", {
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

    $("body").on("click", "#bayar_piutang", function () {
        $("#bayarPiutang").modal();

        var id_piutang = $(this).data("id");
        var data = $('#datatable_piutang').DataTable().row( $(this).parents('tr') ).data();
        $('input[name="debitur_bayar"]').val(data.Debitur);
        $('input[name="nominal_bayar"]').val('');
        $('input[name="tanggal_bayar"]').val(moment().format("YYYY-MM-DD"));
        $('input[name="editpembayaranPiutang"]').attr("type", "hidden");
        $('input[name="pembayaranPiutang"]').attr("type", "text");

        $("body").on("click", "input#pembayaranPiutang", function () {
            let nama_debitur = $('input[name="debitur_bayar"]').val();
            let bayar_piutang = $('input[name="nominal_bayar"]').val().split(".").join("");
            let tanggal_bayar = $('input[name="tanggal_bayar"]').val();

            $.ajax({
                url: "dashboard/bayar_piutang",
                method: "POST",
                data: {
                    id_piutang: id_piutang,
                    nama_debitur: nama_debitur,
                    bayar_piutang: bayar_piutang,
                    tanggal_bayar: tanggal_bayar,
                },
                success: function (response) {
                    if (response == "success") {
                        swal("Berhasil", "Piutang Berhasil di Bayar!", {
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
                        swal("Gagal", "Piutang Gagal di Bayar!", {
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


    //----------------------Debitur----------------------//

	var table_bayar_piutang = $("#datatable_bayar_piutang").DataTable({
		ajax: {
			url: "dashboard/get_pembayaran_piutang",
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
			emptyTable: "Belum ada pembayaran piutang!",
		},
		dom: '<"toolbardate_report"><Bfrtip><"bottom mb-4 text-center"l> ',
		buttons: [
			{
				extend: "pdf",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-file-pdf mr-2"></i>PDF',
				exportOptions: {
					columns: [0, 1, 2],
				},
				messageTop: "List Pembayaran Piutang",
			},
			{
				extend: "print",
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-print mr-2"></i>Print',
				exportOptions: {
					columns: [0, 1, 2],
				},
				messageTop: "List Pembayaran Piutang",
			},
			{
				className: "btn btn-secondary wid-max-select text-white",
				text: '<i class="fas fa-sync-alt mr-2"></i>Refresh',
				action: function () {
					table_bayar_piutang.ajax.reload();
				},
			},
		],
		bAutoWidth: false,
		columns: [
			{ data: "Tanggal" },
			{ data: "Debitur" },
			{ data: "Nominal" },
			{
				data: "Aksi",
				render: function (data, type, row, meta) {
					return type === "display"
						? '<a data-id="' +
								data +
								'" id="edit_pembayaran_piutang" class="text-success mr-4" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>' +
								'<a data-id="' +
								data +
								'" id="hapus_pembayaran_piutang" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>'
						: data;
				},
			},
		],
	});

    $("body").on("click", "#edit_pembayaran_piutang", function () {
        $("#bayarPiutang").modal();
        var id_pembayaran_piutang = $(this).data("id");
        var data = table_bayar_piutang.row($(this).parents("tr")).data();

        $('input[name="debitur_bayar"]').val(data.Debitur);
        $('input[name="nominal_bayar"]').val(data.Nominal.split("Rp").join(""));
        $('input[name="tanggal_bayar"]').val(data.Tanggal);
        $('input[name="editpembayaranPiutang"]').attr("type", "text");
        $('input[name="pembayaranPiutang"]').attr("type", "hidden");
        
        $("body").on("click", "input#editpembayaranPiutang", function () {
            let nominal_bayar = $('input[name="nominal_bayar"]').val().split(".").join("");
            let tanggal_bayar = $('input[name="tanggal_bayar"]').val();

            $.ajax({
                url: "dashboard/edit_pembayaran_piutang",
                method: "POST",
                data: {
                    id_pembayaran_piutang: id_pembayaran_piutang,
                    nominal_bayar: nominal_bayar,
                    tanggal_bayar: tanggal_bayar,
                },
                success: function (response) {
                    if (response == "success") {
                        swal("Berhasil", "Pembayaran Piutang Berhasil di Ganti!", {
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
                        swal("Gagal", "Pembayaran Piutang Gagal di Ganti!", {
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

    $("body").on("click", "#hapus_pembayaran_piutang", function () {
        var id_pembayaran_piutang = $(this).data("id");
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
                    url: "dashboard/hapus_pembayaran_piutang",
                    method: "POST",
                    data: {
                        id: id_pembayaran_piutang,
                    },
                    success: function (response) {
                        if (response == "success") {
                            swal("Berhasil", "Pembayaran Piutang Berhasil di Hapus!", {
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
                            swal("Gagal", "Pembayaran Piutang Gagal di Hapus!", {
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

	$('#tanggal_piutang').datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function() { $(this).datepicker('hide') });
	$('#tanggal_tempo').datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function() { $(this).datepicker('hide') });
	$('#tanggal_bayar').datepicker({ format: 'yyyy-mm-dd' }).on('changeDate', function() { $(this).datepicker('hide') });
})(jQuery);