$('.deletebtn').on('click',function () {
    var deleteUrl = $(this).data('delteurl');
    Swal.fire({
        title: "Emin misin?",
        text: "Şuan bir silme işlemi yapıyorsun emin misin?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Evet, silebilirsin."
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = deleteUrl ;
        }
    });
})