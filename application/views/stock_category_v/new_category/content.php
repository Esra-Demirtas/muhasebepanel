<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 26.06.2025
 * Time: 18:04
 */
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Destek Talep Kategorisi Formu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Yeni Form</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Başlık ve Breadcrumb Bölümü -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-info-subtle">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold fs-16 mb-1">Yeni Kategori Formu</h4>
                                                    <p class="text-muted mb-0">Lütfen yeni destek talep kategorisi bilgilerini girin.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url("stockCategory/newCategoryForm") ?>" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Kategori Adı <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="category_name" placeholder="Lütfen Kategori Başlığını Buraya Yazın." id="firstNameinput" required>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Kategoriyi Kaydet</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
