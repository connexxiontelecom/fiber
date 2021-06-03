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
          <span class="nio-version text-dark">Fiber</span>
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
                  <li><a href="html/subscription/profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
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
          <li class="dropdown notification-dropdown">
            <a href="#" class="dropdown-toggle nk-quick-nav-icon mr-lg-n1" data-toggle="dropdown">
              <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
            </a>
            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
              <div class="dropdown-head">
                <span class="sub-title nk-dropdown-title">Notifications</span>
                <a href="#">Mark All as Read</a>
              </div>
              <div class="dropdown-body">
                <div class="nk-notification">
                  <div class="nk-notification-item dropdown-inner">
                    <div class="nk-notification-icon">
                      <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                    </div>
                    <div class="nk-notification-content">
                      <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                      <div class="nk-notification-time">2 hrs ago</div>
                    </div>
                  </div>
                  <div class="nk-notification-item dropdown-inner">
                    <div class="nk-notification-icon">
                      <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                    </div>
                    <div class="nk-notification-content">
                      <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                      <div class="nk-notification-time">2 hrs ago</div>
                    </div>
                  </div>
                  <div class="nk-notification-item dropdown-inner">
                    <div class="nk-notification-icon">
                      <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                    </div>
                    <div class="nk-notification-content">
                      <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                      <div class="nk-notification-time">2 hrs ago</div>
                    </div>
                  </div>
                  <div class="nk-notification-item dropdown-inner">
                    <div class="nk-notification-icon">
                      <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                    </div>
                    <div class="nk-notification-content">
                      <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                      <div class="nk-notification-time">2 hrs ago</div>
                    </div>
                  </div>
                  <div class="nk-notification-item dropdown-inner">
                    <div class="nk-notification-icon">
                      <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                    </div>
                    <div class="nk-notification-content">
                      <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                      <div class="nk-notification-time">2 hrs ago</div>
                    </div>
                  </div>
                  <div class="nk-notification-item dropdown-inner">
                    <div class="nk-notification-icon">
                      <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                    </div>
                    <div class="nk-notification-content">
                      <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                      <div class="nk-notification-time">2 hrs ago</div>
                    </div>
                  </div>
                </div><!-- .nk-notification -->
              </div><!-- .nk-dropdown-body -->
              <div class="dropdown-foot center">
                <a href="#">View All</a>
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