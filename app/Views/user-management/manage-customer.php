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
                    </ul><!-- .nav-tabs -->
                    <div class="card-inner card-inner-lg">
                      <div class="nk-block-head">
                        <div class="nk-block-head-content">
                          <h4 class="nk-block-title">Personal Information</h4>
                        </div>
                      </div><!-- .nk-block-head -->
                      <div class="nk-block">
                        <div class="nk-data data-list data-list-s2">
                          <div class="data-head">
                            <h6 class="overline-title">User Details</h6>
                          </div>
                          <div class="data-item" data-toggle="modal" data-target="#user-details">
                            <div class="data-col">
                              <span class="data-label">Full Name</span>
                              <span class="data-value"><?=$customer['name']?></span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                          <div class="data-item">
                            <div class="data-col">
                              <span class="data-label">Login Key</span>
                              <span class="data-value"><?=$customer['login']?></span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                          </div><!-- data-item -->
                          <div class="data-item"  data-toggle="modal" data-target="#user-details">
                            <div class="data-col">
                              <span class="data-label">Email</span>
                              <span class="data-value"><?=$customer['email']?></span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                          </div><!-- data-item -->
                        </div><!-- data-list -->
                        <div class="nk-data data-list data-list-s2">
                          <div class="data-head">
                            <h6 class="overline-title">Customer Info</h6>
                          </div>
                          <div class="data-item" data-toggle="modal" data-target="#customer-info">
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
                          <div class="data-item" data-toggle="modal" data-target="#customer-info">
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
                          <div class="data-item" data-toggle="modal" data-target="#customer-info">
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
                        </div>
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
<div class="modal fade zoom" tabindex="-1" id="user-details">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update User Details</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <form action="" id="edit-user-form">
          <div class="row gy-4">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="name">Full Name  <span style="color: red"> *</span></label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" id="name" name="name" value="<?=$customer['name']?>">
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="email">Email  <span style="color: red"> *</span></label>
                <div class="form-control-wrap">
                  <input type="email" class="form-control" id="email" name="email" value="<?=$customer['email']?>">
                </div>
              </div>
            </div>
            <div class="col-12">
              <input type="hidden" value="<?=$customer['user_id']?>" class="user-id">
              <div class="form-group">
                <a href="#" data-dismiss="modal" class="btn btn-light">Cancel</a>
                <button class="btn btn-primary ml-3">Save Information</button>
              </div>
            </div>
          </div>
        </form>
      </div><!-- .modal-body -->
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->
<div class="modal fade zoom" tabindex="-1" id="customer-info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Customer Info</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <form action="" id="edit-customer-info-form">
          <div class="row gy-4">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="payment-method">Payment Method <span style="color: red"> *</span></label>
                <div class="form-control-wrap">
                  <select class="form-select form-control" data-search="on" id="payment-method" name="payment_method">
                    <option value="default">Default Option</option>
                    <?php foreach ($payment_methods as $payment_method):?>
                      <option value="<?= $payment_method['payment_method_id'] ?>" <?=$customer['customer_info'] && $customer['payment_method']['payment_method_id'] == $payment_method['payment_method_id'] ? 'selected': ''?>>
                        <?=$payment_method['name']?>
                      </option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-note">
                  <a href="/payment_method"><em class="icon ni ni-help mr-1"></em>Manage payment methods</a>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="phone">Phone Number <span style="color: red"> *</span></label>
                <div class="form-control-wrap">
                  <input type="number" class="form-control" id="phone" name="phone" value="<?=$customer['customer_info'] ? $customer['customer_info']['phone'] : ''?>">
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="address">Address <span style="color: red"> *</span></label>
                <div class="form-control-wrap">
                  <textarea class="form-control" id="address" name="address" ><?=$customer['customer_info'] ? $customer['customer_info']['address'] : ''?></textarea>
                </div>
              </div>
            </div>
            <div class="col-12">
              <input type="hidden" value="<?=$customer['user_id']?>" class="user-id">
              <div class="form-group">
                <a href="#" data-dismiss="modal" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-primary ml-3">Save Information</button>
              </div>
            </div>
          </div>
        </form>
      </div><!-- .modal-body -->
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->
<?php include(APPPATH.'/Views/_scripts.php'); ?>
<?php include('_user-management-scripts.php')?>
</body>
</html>