<?php
  $session = session();
?>
<div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
  <div class="nk-sidebar-menu" data-simplebar>
    <!-- Menu -->
    <ul class="nk-menu">
      <li class="nk-menu-heading">
        <h6 class="overline-title">Menu</h6>
      </li>
      <li class="nk-menu-item">
        <a href="/dashboard" class="nk-menu-link">
          <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
          <span class="nk-menu-text">Dashboard</span>
        </a>
      </li>
<!--      <li class="nk-menu-item">-->
<!--        <a href="html/subscription/subscriptions.html" class="nk-menu-link">-->
<!--          <span class="nk-menu-icon"><em class="icon ni ni-bar-chart"></em></span>-->
<!--          <span class="nk-menu-text">Internet Statistics</span>-->
<!--        </a>-->
<!--      </li>-->
      <li class="nk-menu-item">
        <a href="/subscription" class="nk-menu-link">
          <span class="nk-menu-icon"><em class="icon ni ni-file-text"></em></span>
          <span class="nk-menu-text">Subscriptions</span>
        </a>
        <ul class="nk-menu-sub">
          <li class="nk-menu-item"><a href="/request" class="nk-menu-link"><span class="nk-menu-text">Requests</span></a></li>
        </ul>
      </li>
      <li class="nk-menu-item">
        <a href="/speedtest" class="nk-menu-link">
          <span class="nk-menu-icon"><em class="icon ni ni-meter"></em></span>
          <span class="nk-menu-text">SpeedTest Gauges</span>
        </a>
      </li>
      <li class="nk-menu-item">
        <a href="/payment" class="nk-menu-link">
          <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
          <span class="nk-menu-text">Payment History</span>
        </a>
      </li>
      <li class="nk-menu-item">
        <a href="/invoice" class="nk-menu-link">
          <span class="nk-menu-icon"><em class="icon ni ni-task"></em></span>
          <span class="nk-menu-text">Invoices</span>
        </a>
      </li>
      <li class="nk-menu-item">
        <a href="/ticket" class="nk-menu-link">
          <span class="nk-menu-icon"><em class="icon ni ni-ticket"></em></span>
          <span class="nk-menu-text">Tickets</span>
        </a>
      </li>
      <?php if (!$session->is_admin):?>
        <li class="nk-menu-item">
          <a href="/profile" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
            <span class="nk-menu-text">Profile</span>
          </a>
        </li>
      <?php endif;?>
      <!-- // admin-->
      <?php if ($session->is_admin): ?>
        <li class="nk-menu-item">
          <a href="#" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
            <span class="nk-menu-text">Admin Configuration</span>
          </a>
          <ul class="nk-menu-sub">
            <li class="nk-menu-item"><a href="/user" class="nk-menu-link"><span class="nk-menu-text">User Management</span></a></li>
            <li class="nk-menu-item"><a href="/plan" class="nk-menu-link"><span class="nk-menu-text">Plan</span></a></li>
            <li class="nk-menu-item"><a href="/payment_method" class="nk-menu-link"><span class="nk-menu-text">Payment Method</span></a></li>
            </ul>
        </li>
      <?php endif;?>
    </ul>
  </div><!-- .nk-sidebar-menu -->
  <div class="nk-aside-close">
    <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
  </div><!-- .nk-aside-close -->
</div><!-- .nk-aside -->
