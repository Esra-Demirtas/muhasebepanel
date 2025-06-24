<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 9.06.2025
 * Time: 16:32
 */
?>
<link rel="stylesheet" href="<?=base_url("assets/css/select2.min.css") ?>">
<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
        outline: 0;
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040;
        width: 100vw;
        height: 100vh;
        background-color: #000;
        opacity: 0.5;
    }

    #incomeUpdateModal {
        z-index: 1060 !important;
    }

    #treatmentAddModal {
        z-index: 1061 !important;
    }

    #treatmentUpdateModal {
        z-index: 1062 !important;
    }

    #incomeAddModal {
        z-index: 1063 !important;
    }
</style>