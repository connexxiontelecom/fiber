<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en" class="js">
<?php include(APPPATH.'/Views/_head.php'); ?>
<body class="nk-body bg-white npc-default has-aside">
<div class="nk-app-root">
  <div class="nk-main">
    <div class="nk-wrap">
      <?php include(APPPATH.'/Views/_header.php'); ?>
      <div class="nk-content">
        <div class="container wide-xl">
          <div class="nk-content-inner">
            <?php include(APPPATH.'/Views/_sidebar.php'); ?>
            <div class="nk-content-body">
              <div class="nk-content-wrap">
                <div class="nk-block-head nk-block-head-lg">
                  <div class="nk-block-head-sub"><a class="back-to" href="/user"><em class="icon ni ni-arrow-left"></em><span>User Management</span></a></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Manage Customer</h2>
                      <div class="nk-block-des">
                        <p>You have full control over a customer's account settings.</p>
                      </div>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="card card-bordered">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                      <li class="nav-item">
                        <a class="nav-link active" href="/user/manage_customer/<?=$customer['user_id']?>"><em class="icon ni ni-user-fill-c"></em><span>Personal</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="html/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="html/user-profile-setting.html"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a>
                      </li>
                    </ul><!-- .nav-tabs -->
                    <div class="card-inner card-inner-lg">
                      <div class="nk-block-head">
                        <div class="nk-block-head-content">
                          <h4 class="nk-block-title">Personal Information</h4>
                        </div>
                      </div><!-- .nk-block-head -->
                      <div class="nk-block">
                        <div class="nk-data data-list data-list-s2">
                          <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                              <span class="data-label">Full Name</span>
                              <span class="data-value"><?=$customer['name']?></span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                          <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                              <span class="data-label">Login Key</span>
                              <span class="data-value"><?=$customer['login']?></span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                          <div class="data-item"  data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                              <span class="data-label">Email</span>
                              <span class="data-value"><?=$customer['email']?></span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                          <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                              <span class="data-label">Phone Number</span>
                              <?php if ($customer['customer_info'] && $customer['customer_info']['phone']): ?>
                                <span class="data-value"><?=$customer['customer_info']['phone']?></span>
                              <?php else:?>
                                <span class="data-value text-soft">Not added yet</span>
                              <?php endif;?>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                          <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                            <div class="data-col">
                              <span class="data-label">Address</span>
                              <?php if ($customer['customer_info'] && $customer['customer_info']['address']): ?>
                                <span class="data-value"><?=$customer['customer_info']['address']?></span>
                              <?php else:?>
                                <span class="data-value text-soft">Not added yet</span>
                              <?php endif;?>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                          <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                            <div class="data-col">
                              <span class="data-label">Payment Method</span>
                              <?php if ($customer['customer_info'] && $customer['payment_method']['name']): ?>
                                <span class="data-value"><?=$customer['payment_method']['name']?></span>
                              <?php else:?>
                                <span class="data-value text-soft">Not added yet</span>
                              <?php endif;?>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                        </div><!-- data-list -->
                      </div><!-- .nk-block -->
                    </div><!-- .card-inner -->
                  </div><!-- .card -->
                </div><!-- .nk-block -->
              </div>
              <?php include(APPPATH.'/Views/_footer.php'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH.'/Views/_scripts.php'); ?>
</body>
</html>