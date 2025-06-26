<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 25.06.2025
 * Time: 21:27
 */
?>
<script>
    $('#stock_parent_category_id').on('change', function () {
        var uniq_id = $(this).val(); 

        $.post("<?php echo base_url('stockCategory/getSubCategoryList')?>", { uniq_id: uniq_id }, function(data) {
            var subCategories = JSON.parse(data);

            var $subCategorySelect = $('#stock_sub_category_id');

            $subCategorySelect.empty();

            if (!subCategories || subCategories.success === false || subCategories.length === 0) {
                $subCategorySelect.append('<option value="0">--Diğer--</option>');
            } else {
                $subCategorySelect.append('<option value="0">--Diğer--</option>');

                $.each(subCategories, function(index, subCategory) {
                    var categoryName = subCategory.category_name ? subCategory.category_name : 'Adsız Kategori';
                    $subCategorySelect.append(
                        '<option value="' + subCategory.uniq_id + '">' + categoryName + '</option>'
                    );
                });
            }
        });
    });
</script>