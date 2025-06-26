<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 25.06.2025
 * Time: 21:27
 */
?>
<script>
    function getSubCategories(uniq_id) {
        $.post("<?= base_url('stockCategory/getSubCategoryList') ?>", { uniq_id: uniq_id }, function (data) {
            var $subCategorySelect = $('#stock_sub_category_id');
            $subCategorySelect.empty();

            try {
                var subCategories = JSON.parse(data);

                if (!Array.isArray(subCategories) || subCategories.length === 0) {
                    $subCategorySelect.append('<option value="0" selected>--Diğer--</option>');
                    return;
                }

                $subCategorySelect.append('<option value="0">--Diğer--</option>');

                $.each(subCategories, function (index, subCategory) {
                    var name = subCategory.category_name || 'Adsız Kategori';
                    $subCategorySelect.append(
                        '<option value="' + subCategory.uniq_id + '">' + name + '</option>'
                    );
                });

                var selectedSubCategory = $subCategorySelect.data('subcategory');
                if (selectedSubCategory) {
                    var exists = subCategories.some(function (sc) {
                        return sc.uniq_id === selectedSubCategory;
                    });

                    if (exists) {
                        $subCategorySelect.val(selectedSubCategory).trigger('change');
                    } else {
                        $subCategorySelect.val("0").trigger('change');
                    }
                }

            } catch (e) {
                console.error("Alt kategoriler yüklenemedi:", e);
                $subCategorySelect.append('<option value="0" selected>--Diğer--</option>');
            }
        });
    }

    $(document).ready(function () {
        var initialParentId = $('#stock_parent_category_id').val();
        if (initialParentId) {
            getSubCategories(initialParentId);
        }

        $('#stock_parent_category_id').on('change', function () {
            var selectedParentId = $(this).val();
            $('#stock_sub_category_id').removeAttr('data-subcategory');
            getSubCategories(selectedParentId);
        });
    });
</script>

