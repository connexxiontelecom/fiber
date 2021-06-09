<?php
  $session = session();
?>
<div class="nk-header nk-header-fixed is-light">
  <div class="container-lg wide-xl">
    <div class="nk-header-wrap">
      <div class="nk-header-brand">
        <a href="/dashboard" class="logo-link">
          <img class="logo-light logo-img" src="/assets/images/logo-01-2.png" srcset="/assets/images/logo2x.png 2x" alt="logo">
          <img class="logo-dark logo-img" src="/assets/images/logo-01-2.png" srcset="/assets/images/logo-dark2x.png 2x" alt="logo-dark">
          <span class="nio-version text-dark">Fiber Portal</span>
        </a>
      </div><!-- .nk-header-brand -->
      <div class="nk-header-tools">
        <ul class="nk-quick-nav">
          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <div class="user-toggle">
                <div class="user-avatar sm">
                  <em class="icon ni ni-user-alt"></em>
                </div>
                <div class="user-name dropdown-indicator d-none d-sm-block"><?=$session->get('name')?></div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
              <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                <div class="user-card">
                  <div class="user-avatar">
                    <em class="icon ni ni-user-alt"></em>
                  </div>
                  <div class="user-info">
                    <span class="lead-text"><?=$session->get('name')?></span>
                    <span class="sub-text"><?=$session->get('is_admin') == 1 ? 'Admin':'Customer' ?></span>
                  </div>
                </div>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  <?php if (!$session->is_admin):?>
                  <li><a href="/profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                  <?php endif?>
                  <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                </ul>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  <li><a href="/auth/logout"><em class="icon ni ni-signout"></em><span>Logout</span></a></li>
                </ul>
              </div>
            </div>
          </li><!-- .dropdown -->
          <li class="d-lg-none">
            <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
          </li>
        </ul><!-- .nk-quick-nav -->
      </div><!-- .nk-header-tools -->
    </div><!-- .nk-header-wrap -->
  </div><!-- .container-fliud -->
</div>