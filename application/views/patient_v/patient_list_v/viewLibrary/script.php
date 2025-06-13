<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 31.05.2025
 * Time: 00:08
 */
?>
<script src="<?=base_url("assets/js/jquery.dataTables.min.js") ?>"></script>

<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        // DataTable tanımı
        $('#coverPaymentTable').DataTable({
            "order": [[0, 'desc']],
            language: {
                url: "<?php echo base_url("assets/js/tr.json")?>",
            },
            dom: '<"top"lBfr>t<"bottom"ip><"clear">',  // Butonlar için düzen ekliyoruz
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel\'e Aktar',
                    className: 'btn btn-success',
                    exportOptions: {
                        modifier: {
                            page: 'current'  // Yalnızca mevcut sayfadaki verileri dışa aktarır
                        }
                    }
                }
            ]
        });

        // Silme butonu (sweetalert)
        $(document).on('click', '.deletebtn', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).data('deleteurl');

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
