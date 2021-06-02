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
                          <form action="" class="pt-3" id="add-payment-form">
                            <div class="form-group">
                              <label class="form-label" for="invoice">Invoice <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select form-control form-control-lg" data-search="on" id="invoice" name="invoice">
                                  <option value="default">Default Option</option>
                                  <?php foreach ($invoices as $invoice):?>
                                    <option value="<?= $invoice['invoice_id'] ?>">Invoice #<?=$invoice['id']?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                              <div class="form-note">
                                <a href="/invoice"><em class="icon ni ni-help mr-1"></em>Manage invoices</a>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="date">Date <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="date" name="date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="amount">Amount <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control number" id="amount" name="amount">
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
<?php include('_payment-scripts.php'); ?>
</body>
</html>