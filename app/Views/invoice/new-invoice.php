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
                  <div class="nk-block-head-sub"><a class="back-to" href="/invoice"><em class="icon ni ni-arrow-left"></em><span>Invoices</span></a></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Add New Invoices</h2>
                      <div class="nk-block-des">
                        <p>Add an invoice here.</p>
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
                            <h5 class="card-title">Invoice Info</h5>
                          </div>
                          <form action="" class="pt-3" id="add-invoice-form">
                            <div class="form-group">
                              <label class="form-label" for="subscription">Subscription <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select form-control form-control-lg" data-search="on" id="subscription" name="subscription">
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
                              <label class="form-label" for="issue-date">Issue Date <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="issue-date" name="issue_date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="due-date">Due Date <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="due-date" name="due_date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="">Invoice Status</label><br>
                              <div class="custom-control custom-radio">
                                <input type="radio" id="unpaid" name="is_paid" class="custom-control-input is_paid" value="0" checked>
                                <label class="custom-control-label" for="unpaid">Unpaid</label>
                              </div>
                              <div class="custom-control custom-radio ml-3">
                                <input type="radio" id="paid" name="is_paid" class="custom-control-input is_paid" value="1">
                                <label class="custom-control-label" for="paid">Paid</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Create New Invoice</button>
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
<?php include('_invoice-scripts.php'); ?>
</body>
</html>