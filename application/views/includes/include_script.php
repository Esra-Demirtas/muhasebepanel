<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 28.05.2025
 * Time: 18:37
 */
?>

<script src="<?=base_url();?>assets/js/jquery.min.js"  referrerpolicy="no-referrer"></script>
<script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?=base_url();?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?=base_url();?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?=base_url();?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?=base_url();?>assets/js/app.js"></script>
<script src="<?=base_url(); ?>assets/js/deletebtn.js"></script>

<script src="<?=base_url();?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

<?php $this->load->view("includes/alert"); ?>


<script>
    $(document).ready(function() {
        const searchInput = $('#search-options');
        const searchDropdown = $('#search-dropdown');
        const resultsContainer = $('#search-results-container');

        searchInput.on('keyup focus', function() {
            const searchTerm = $(this).val();

            if (searchTerm.length > 1) {
                $.ajax({
                    url: '<?php echo base_url("search/global_search"); ?>',
                    type: 'GET',
                    dataType: 'json',
                    data: { term: searchTerm },
                    success: function(response) {
                        resultsContainer.empty();
                        let hasResults = false;

                        if (response.patients && response.patients.length > 0) {
                            hasResults = true;
                            resultsContainer.append('<div class="dropdown-header"><h6 class="text-overflow text-muted mb-1 text-uppercase">Hastalar</h6></div>');
                            $.each(response.patients, function(index, patient) {
                                resultsContainer.append(`
                                <a href="<?php echo base_url("patient/folder/"); ?>${patient.uniq_id}" class="dropdown-item notify-item">
                                    <i class="ri-user-heart-line align-middle fs-18 text-muted me-2"></i>
                                    <span>${patient.name} ${patient.surname}</span>
                                </a>
                            `);
                            });
                        }

                        if (response.families && response.families.length > 0) {
                            hasResults = true;
                            resultsContainer.append('<div class="dropdown-header"><h6 class="text-overflow text-muted mb-1 text-uppercase">Referanslar</h6></div>');
                            $.each(response.families, function(index, family) {
                                resultsContainer.append(`
                                <a href="<?php echo base_url("family/folder/"); ?>${family.uniq_id}" class="dropdown-item notify-item">
                                    <i class="ri-team-line align-middle fs-18 text-muted me-2"></i>
                                    <span>${family.family_name}</span>
                                </a>
                            `);
                            });
                        }

                        if (response.doctors && response.doctors.length > 0) {
                            hasResults = true;
                            resultsContainer.append('<div class="dropdown-header"><h6 class="text-overflow text-muted mb-1 text-uppercase">Doktorlar</h6></div>');
                            $.each(response.doctors, function(index, doctor) {
                                resultsContainer.append(`
                                <a href="<?php echo base_url("doctor"); ?>" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <i class="ri-stethoscope-line me-3 rounded-circle avatar-xs"></i>
                                        <div class="flex-grow-1">
                                            <h6 class="m-0">${doctor.name} ${doctor.surname}</h6>
                                            <span class="fs-11 mb-0 text-muted">Doktor</span>
                                        </div>
                                    </div>
                                </a>
                            `);
                            });
                        }

                        if (!hasResults) {
                            resultsContainer.append(`<div class="dropdown-item text-center text-muted">Sonuç bulunamadı.</div>`);
                        }

                        searchDropdown.addClass('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX hatası:", status, error);
                    }
                });
            } else {
                searchDropdown.removeClass('show');
            }
        });

        $(document).on('click', function (e) {
            if (!searchDropdown.is(e.target) && searchDropdown.has(e.target).length === 0 && !searchInput.is(e.target)) {
                searchDropdown.removeClass('show');
            }
        });
    });
</script>



