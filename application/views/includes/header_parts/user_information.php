<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 28.05.2025
 * Time: 19:21
 */
?>

<?php
/*$user = $this->session->userdata('users_info');

$userRoleDetail = get_user_roles($user->user_role_id);
*/?>

<div class="dropdown ms-sm-3 header-item topbar-user">
    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center">
                <!--<span class="text-start ms-xl-2">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php /*=$user->user_name . ' ' . $user->user_surname; */?></span>
                    <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?php /*=$userRoleDetail->roles_title */?></span>
                </span>-->
            </span>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <!--<h6 class="dropdown-header">Hoşgeldin <?php /*=$user->user_name . ' ' . $user->user_surname; */?></h6>
        <a class="dropdown-item" href="<?php /*=base_url("profile/$user->uniq_id") */?>"><i
                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                class="align-middle">Profil</span></a>-->
        <a class="dropdown-item" href="javascript:void(alert('Henü Yapım Aşamasında.'))"><i
                class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                class="align-middle">Mesajlarım</span></a>
        <a class="dropdown-item" href="javascript:void(alert('Henü Yapım Aşamasında.'))"><i
                class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                class="align-middle">Yardım</span></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="javascript:void(alert('Henü Yapım Aşamasında.'))"><i
                class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                class="align-middle">Lock screen</span></a>
        <a class="dropdown-item" href="<?=base_url("Login/logout") ?>"><i
                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                class="align-middle" data-key="t-logout">Logout</span></a>
    </div>
</div>
