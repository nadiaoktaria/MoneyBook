
(function ($) {

	$("body").on("click", "input#edit_profile", function () {
        let get_nama = $('input[name="nama"]').val();
        let get_nohp = $('input[name="no_hp"]').val();
        let get_alamat = $('input[name="alamat"]').val();

        $.ajax({
            url: "dashboard/ubah_profile",
            method: "POST",
            data: {
                nama: get_nama,
                no_hp: get_nohp,
                alamat: get_alamat,
            },
            success: function (response) {
                if (response == "success") {
                    swal("Berhasil", "Profile Berhasil Disimpan!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                    setTimeout(() => { window.location.reload() }, 1000);
                } else {
                    swal("Gagal", "Profile Gagal Disimpan!", {
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

	$("#profile_image").change(function () {
		var file = $("#profile_image")[0].files[0].name;
		if (file.length > 20) {
			file = file.substr(0, 10) + "..." + file.substr(-10);
		}
		$(this).prev("label").text(file);
	});

})(jQuery);