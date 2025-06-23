<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 23.06.2025
 * Time: 16:17
 */
?>
<script>
    $(document).ready(function() {

        $('#add_income_form').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response === "0") {
                        Swal.fire({
                            position: "center",
                            title: "Hata",
                            text: response.message,
                            icon: "error",
                            showConfirmButton: true
                        });
                    } else if (response === "1") {
                        Swal.fire({
                            position: "center",
                            title: "Harika",
                            text: response.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $.post("<?php echo base_url('income/incomePatientRender/'.$patientData->uniq_id)?>", function(data) {
                            $('#incomeRenderTableBody').html(data);
                            console.log(data)
                        });
                    }
                    $('#loadingSpinner').hide();
                    $('#addIncomeModal').modal('hide');

                    // Reset Modal Form
                    $('#add_income_form')[0].reset();
                    $('#addIncomeModal').on('hidden.bs.modal', function () {
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $(document).on('submit', '#update_income_form', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'error') {
                        Swal.fire({
                            title: "Hata",
                            text: response.message,
                            icon: "error",
                        });
                    } else if (response.status === 'success') {
                        Swal.fire({
                            title: "Başarılı",
                            text: response.message,
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        openSafeModal("#updateIncomeModal");

                        $('#incomeRenderTableBody').load("<?= base_url('income/incomePatientRender') ?>");
                    }
                },
                error: function () {
                    Swal.fire({
                        title: "Hata",
                        text: "Form gönderimi sırasında bir hata oluştu.",
                        icon: "error",
                    });
                }
            });
        });

        $(document).on("submit", "#updateIncomeForm", function (e) {
            e.preventDefault();

            const form = $(this);
            const formData = new FormData(form[0]);

            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response === "0") {
                        Swal.fire({
                            position: "center",
                            title: "Hata",
                            text: response.message,
                            icon: "error",
                            showConfirmButton: true
                        });
                    } else if (response === "1") {
                        Swal.fire({
                            position: "center",
                            title: "Harika",
                            text: response.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $.post("<?php echo base_url('income/incomePatientRender/'.$patientData->uniq_id)?>", function(data) {
                            $('#incomeRenderTableBody').html(data);
                            console.log(data)
                        });
                    }
                    $("#updateIncomeModal").modal("hide");
                },
                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Hata!",
                        text: "Bir hata oluştu. Lütfen tekrar deneyin.",
                        confirmButtonText: "Tamam"
                    });
                }
            });
        });


        $(document).on("click", ".updateIncome", function () {
            const postUrl = $(this).data("post-url");

            $.ajax({
                url: postUrl,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    if (response) {
                        $("#treatment_id-update").val(response.treatment_id || "");
                        $("#amount-update").val(response.amount || "");
                        $("#payment_type-update").val(response.payment_type != null ? response.payment_type.toString() : "");
                        $("#payment_date-update").val(response.payment_date || "");
                        $("#description-update").val(response.description || "");
                        $("#uniq_id-update").val(response.uniq_id || "");

                        // Modal'ı aç
                        $("#updateIncomeModal").modal("show");
                    } else {
                        alert("Veri alınamadı!");
                    }
                },
                error: function () {
                    alert("Bir hata oluştu. Lütfen tekrar deneyin.");
                }
            });
        });

        // Delete Item
        $(document).on('click', '.deletebtn', function(e) {
            e.preventDefault();

            var deleteUrl = $(this).data('delteurl');

            Swal.fire({
                title: 'Silmek ister misiniz?',
                text: "Bu işlem geri alınamaz.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Hayır, iptal et'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'GET',
                        success: function(response) {
                            $(e.target).closest('tr').remove();
                        },
                        error: function() {
                            alert('Hata: Silme işlemi başarısız oldu.');
                        }
                    });
                }
            });
        });

    });
</script>
