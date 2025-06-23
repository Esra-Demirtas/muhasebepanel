<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 9.06.2025
 * Time: 16:32
 */
?>
<link rel="stylesheet" href="<?=base_url("assets/css/select2.min.css") ?>">
<style>
    /* Genel Modal Ayarları (İsteğe Bağlı ama iyi bir başlangıç) */
    /* Eğer modalların genel davranışında bir sorun varsa bunu kullanabilirsiniz. */
    .modal {
        position: fixed; /* Sabit konumda kalmasını sağlar */
        top: 0;
        left: 0;
        z-index: 1050; /* Varsayılan Bootstrap z-index'i */
        display: none; /* Varsayılan olarak gizli */
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto; /* İçerik taşarsa kaydırma çubuğu */
        outline: 0;
    }

    /* Modal Arka Planı (Backdrop) Ayarları */
    /* Bu, modalların arkasındaki karartılmış alandır. */
    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040; /* Modallardan daha düşük olmalı */
        width: 100vw; /* Görünüm alanı genişliği */
        height: 100vh; /* Görünüm alanı yüksekliği */
        background-color: #000; /* Siyah renk */
        opacity: 0.5; /* Yarım saydamlık */
    }


    /* income_update_modal için Ayarlar */
    /* Bu modalınızın ID'sini doğru şekilde yazdığınızdan emin olun. */
    #incomeUpdateModal { /* 'income_update_modal' dosyanızdaki ana modal div'inin ID'si */
        z-index: 1060 !important; /* Diğer modallardan daha yüksek bir değer verin */
    }

    /* treatment_add_modal için Ayarlar */
    /* Bu modalınızın ID'sini doğru şekilde yazdığınızdan emin olun. */
    #treatmentAddModal { /* 'treatment_add_modal' dosyanızdaki ana modal div'inin ID'si */
        z-index: 1061 !important; /* Bir önceki modal olan incomeUpdateModal'dan biraz daha yüksek olsun */
    }

    #treatmentUpdateModal { /* 'treatment_add_modal' dosyanızdaki ana modal div'inin ID'si */
        z-index: 1061 !important; /* Bir önceki modal olan incomeUpdateModal'dan biraz daha yüksek olsun */
    }


    /* income_add_modal için Ayarlar */
    /* Bu modalınızın ID'sini doğru şekilde yazdığınızdan emin olun. */
    #incomeAddModal { /* 'income_add_modal' dosyanızdaki ana modal div'inin ID'si */
        z-index: 1062 !important; /* En yüksek önceliği olan bu modal olsun */
    }
</style>