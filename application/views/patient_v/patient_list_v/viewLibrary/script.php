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
        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            paging: true,
            lengthChange: true,
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tümü"]],
            ajax: {
                url: '<?= base_url("Patient/getPatients"); ?>',
                type: 'POST',
                data: function (d) {
                    d.csrf_test_name = $("input[name='csrf_test_name']").val();
                }
            },
            language: {
                url: "<?php echo base_url('assets/js/tr.json'); ?>",
            },
            columns: [
                { "data": 1 },
                { "data": 2 },
                { "data": 3 },
                { "data": 4 },
                { "data": 5 },
                { "data": 6 },
                { "data": 7 },
                { "data": 8 }
            ],
            columnDefs: [
                { targets: [6, 7], orderable: false }
            ],
            dom: '<"top"lBf>rt<"bottom"ip><"clear">',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel Olarak Dışa Aktar',
                    title: 'Patients Data',
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                }
            ]
        });

        // Excel dışa aktarma butonu
        if ($('#exportExcelBtn').length) {
            $('#exportExcelBtn').on('click', function() {
                var allData = true;
                var url = '/your_export_route?allData=' + allData;
                window.location.href = url;
            });
        }

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
