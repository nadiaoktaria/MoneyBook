
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
        
})(jQuery);