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
