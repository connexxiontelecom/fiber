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
                  <div class="nk-block-head-sub"><a class="back-to" href="/payment"><em class="icon ni ni-arrow-left"></em><span>Payment History</span></a></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Add New Payment</h2>
                      <div class="nk-block-des">
                        <p>Add a payment here.</p>
                      </div>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="row g-gs">
                    <div class="col-lg-8">
                      <div class="card card-bordered">
                        <div class="card-inner">
                          <div class="card-head">
                            <h5 class="card-title">Payment Info</h5>
                          </div>
                          <form action="" class="pt-3" id="add-subscription-form">
                            <div class="form-group">
                              <label class="form-label" for="user">Subscription <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select form-control form-control-lg" data-search="on" id="user" name="user">
                                  <option value="default">Default Option</option>
                                  <?php foreach ($subscriptions as $subscription):?>
                                    <option value="<?= $subscription['subscription_id'] ?>"><?=$subscription['tag']?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                              <div class="form-note">
                                <a href="/subscription"><em class="icon ni ni-help mr-1"></em>Manage subscriptions</a>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="start-date">Issue Date <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="start-date" name="issue_date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="end-date">Due Date <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="end-date" name="due_date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="price">Amount <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control number" id="price" name="amount">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="price-1">Amount Paid <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control number" id="price-1" name="amount_paid">
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Create New Payment</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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