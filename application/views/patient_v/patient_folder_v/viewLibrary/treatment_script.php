<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 16.06.2025
 * Time: 23:06
 */
?>
<script>
    $(document).ready(function() {

        $('#add_treatment_form').on('submit', function (e) {
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

                        $.post("<?php echo base_url('treatment/treatmentPatientRender/'.$patientData->uniq_id)?>", function(data) {
                            $('#treatmentRenderTableBody').html(data);
                            console.log(data)
                        });
                    }
                    $('#loadingSpinner').hide();
                    $('#addTreatmentModal').modal('hide');

                    // Reset Modal Form
                    $('#add_treatment_form')[0].reset();
                    $('#addTreatmentModal').on('hidden.bs.modal', function () {
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        /*$(document).on('submit', '#update_treatment_form', function (e) {
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

                        $('#treatmentRenderTableBody').load("<?= base_url('treatment/treatmentPatientRender') ?>");
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
        });*/

        $(document).on("submit", "#updateTreatmentForm", function (e) {
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

                        $.post("<?php echo base_url('treatment/treatmentPatientRender/'.$patientData->uniq_id)?>", function(data) {
                            $('#treatmentRenderTableBody').html(data);
                            console.log(data)
                        });
                    }
                    $('#updateTreatmentModal').modal('hide');
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

        $(document).on("click", ".updateTreatment", function () {
            const postUrl = $(this).data("post-url");

            $.ajax({
                url: postUrl,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    if (response) {
                        $("#treatment_treatment_name-update").val(response.treatment_name || "");
                        $("#treatment_doctor_id-update").val(response.doctor_id || "");
                        $("#treatment_tooth_number-update").val(response.tooth_number || "");
                        $("#treatment_treatment_price-update").val(response.treatment_price || "");
                        $("#treatment_payment_status-update").val(response.payment_status != null ? response.payment_status.toString() : "");
                        $("#treatment_treatment_date-update").val(response.treatment_date || "");
                        $("#treatment_note-update").val(response.note || "");
                        $("#treatment_uniq_id-update").val(response.uniq_id || "");

                        $("#updateTreatmentModal").modal("show");
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
