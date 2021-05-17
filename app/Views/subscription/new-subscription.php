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
                  <div class="nk-block-head-sub"><a class="back-to" href="/subscription"><em class="icon ni ni-arrow-left"></em><span>Subscriptions</span></a></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Add New Subscription</h2>
                      <div class="nk-block-des">
                        <p>Add a subscription here.</p>
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
                            <h5 class="card-title">Subscription Info</h5>
                          </div>
                          <form action="" class="pt-3" id="add-subscription-form">
                            <div class="form-group">
                              <label class="form-label" for="user">Customer <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select form-control form-control-lg" data-search="on" id="user">
                                  <option value="default_option">Default Option</option>
                                  <?php foreach ($customers as $customer):?>
                                    <option value="<?= $customer['user_id'] ?>"><?=$customer['name']?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
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