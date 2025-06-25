<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 29.05.2025
 * Time: 01:07
 */
?>
<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 p-lg-5 p-4" style="background-image: url('<?= base_url() ?>assets/images/landing/login-image3.png'); background-repeat: no-repeat;"></div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text">Hoşgeldiniz !</h5>
                                        <p class="text-muted">GÜLERYÜZ Muhasebe Paneline Giriş Yapmak Üzeresiniz.</p>
                                    </div>
                                    <?php if ($this->session->flashdata('userLoginError')){ ?>
                                        <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show mb-xl-0" role="alert">
                                            <i class="ri-error-warning-line label-icon"></i><strong>Hata</strong>
                                            Mevcut Bilgiler İle Kayıtlı Bir Kullanıcı Bulunamadı. <Strong>Lütfen Bilgilerinizi Kontrol Edip Tekrar Deneyin.</Strong>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <div class="mt-4">
                                        <form action="<?=base_url("loginform"); ?>" method="post">

                                            <div class="mb-3">
                                                <label for="user-email" class="form-label">Kullanıcı Eposta Adresiniz</label>
                                                <input type="text" name="user_email" class="form-control" id="user-email" placeholder="E-posta Adresinizi Buraya Girin.">
                                            </div>

                                            <div class="mb-3">
                                                <!--<div class="float-end">
                                                    <a href="<?php /*=base_url("resetpass") */?>" class="text-muted">Şifremi Unuttum?</a>
                                                </div>-->
                                                <label class="form-label" for="password-input">Şifreniz</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" name="user_password" class="form-control pe-5" placeholder="Lütfen Şirenizi Buraya Girin." id="password-input">
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" name="user_rememberCheck" type="checkbox" value="" id="auth-remember-check">
                                                <label class="form-check-label" for="auth-remember-check">Beni Hatırla.</label>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn w-100" style="background-color: #6A4C9C; color: white;" type="submit">Giriş Yap</button>
                                            </div>


                                        </form>
                                    </div>
                                    <!--
                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Bir Hesabınız Yok Mu? <a href="<?php /*=base_url("newuserform") */?>" class="fw-semibold text-primary text-decoration-underline"> Hesap Başvurusunda Bulunun.</a> </p>
                                    </div>-->
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">&copy; <script>document.write(new Date().getFullYear())</script>. GÜLERYÜZ Muhasebe Panelini İnşaa Eden ve Geliştiren Esra DEMİRTAŞ
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->