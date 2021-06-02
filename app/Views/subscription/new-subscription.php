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
                              <label class="form-label" for="description">Description <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control" id="description" name="description">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="user">Customer <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select form-control form-control-lg" data-search="on" id="user" name="user">
                                  <option value="default">Default Option</option>
                                  <?php foreach ($customers as $customer):?>
                                    <option value="<?= $customer['user_id'] ?>"><?=$customer['name']?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                              <div class="form-note">
                                <a href="/user"><em class="icon ni ni-help mr-1"></em>Manage users</a>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="plan">Plan <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select form-control form-control-lg" data-search="on" id="plan" name="plan">
                                  <option value="default">Default Option</option>
                                  <?php foreach ($plans as $plan):?>
                                    <option value="<?= $plan['plan_id'] ?>"><?=$plan['name']?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                              <div class="form-note">
                                <a href="/plan"><em class="icon ni ni-help mr-1"></em>Manage plans</a>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="duration">Duration <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="number" class="form-control" id="duration" name="duration" min="1">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="start-date">Start Date <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="start-date" name="start_date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="end-date">End Date <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="end-date" name="end_date">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="ip-addr">IPv4 Address </label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control" id="ip-addr" name="ip_addr">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="mac-addr">MAC Address </label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control" id="mac-addr" name="mac_addr">
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Create New Subscription</button>
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
<?php include('_subscription-scripts.php'); ?>
</body>
</html>