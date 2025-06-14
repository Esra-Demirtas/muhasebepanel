<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 14.06.2025
 * Time: 18:40
 */
?>
<script>
    $('.isActivityBtn').on('click',function () {

        $.ajax({
            url: $(this).data("activitypost"),
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(data) {
                console.log(data)
            }
        });

    })
</script>