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
                      <h2 class="nk-block-title fw-normal">
                        <?=$subscription['description']?>
                      </h2>
                      <div class="nk-block-des">
                        <p>This is a <?=$subscription['duration']?> month subscription and it <?=$subscription['status'] == 1 ?> expires on
                          <span class="font-weight-bolder">
                            <?php
                              $date = date_create($subscription['end_date']);
                              echo date_format($date, 'd M Y');
                            ?>
                          </span>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools justify-content-md-end g-4 flex-wrap">
                        <li class="order-md-last">
                          <a href="#" class="btn btn-auto btn-dim btn-danger" data-toggle="modal" data-target="#subscription-cancel"><em class="icon ni ni-cross"></em><span>Cancel Subscription</span></a>
                        </li>
                        <li>
                          <?php if ($subscription['status'] == 1): ?>
                            <div class="badge badge-dim badge-success">Active</div>
                          <?php else:?>
                            <div class="badge badge-dim badge-warning">Inactive</div>
                          <?php endif;?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="row">
                    <div class="col-xl-8">
                      <div class="card card-bordered">
                        <div class="card-inner-group">
                          <div class="card-inner">
                            <div class="sp-plan-head">
                              <h6 class="title">Plan Details</h6>
                            </div>
                            <div class="sp-plan-desc sp-plan-desc-mb">
                              <ul class="row gx-1">
                                <li class="col-sm-3">
                                  <p>
                                    <span class="text-soft">Started On</span>
                                    <?php
                                      $date = date_create($subscription['start_date']);
                                      echo date_format($date, 'd M Y');
                                    ?>
                                  </p>
                                </li>
                                <li class="col-sm-3">
                                  <p>
                                    <span class="text-soft">Price</span>
                                    <em class="icon ni ni-sign-kobo"></em> <?=number_format($subscription['plan']['price'])?>
                                  </p>
                                </li>
                                <li class="col-sm-6">
                                  <p><span class="text-soft">Customer</span> <?=$subscription['customer']['name']?></p>
                                </li>
                              </ul>
                            </div>
                          </div><!-- .card-inner -->
                          <div class="card-inner">
                            <div class="sp-plan-head-group">
                              <div class="sp-plan-head">
                                <h6 class="title">Next Payment</h6>
                              </div>
                              <div class="sp-plan-amount">
                                <?php if ($subscription['status'] == 1): ?>
                                  <span class="sp-plan-status text-success">Paid</span>
                                  <span class="amount"><em class="icon ni ni-sign-kobo"></em> <?=number_format($subscription['plan']['price'] * $subscription['duration'])?></span>
                                <?php else:?>
                                  <span class="sp-plan-status text-warning">Due</span>
                                  <span class="amount"><em class="icon ni ni-sign-kobo"></em> <?=number_format($subscription['plan']['price'])?></span>
                                <?php endif;?>
                              </div>
                            </div>
                            <div class="sp-plan-payopt">
                              <div class="cc-pay">
                                <h6 class="title">Due By</h6>
                                <ul class="cc-pay-method">
                                  <li class="cc-pay-dd dropdown">
                                    <a href="javascript:void(0)" class="btn btn-white btn-outline-light">
                                      <em class="icon ni ni-calender-date"></em>
                                      <span>
                                        <?php
                                        $date = date_create($subscription['end_date']);
                                        echo date_format($date, 'd M Y');
                                        ?>
                                      </span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div><!-- .card-inner -->
                          <div class="card-inner">
                            <div class="sp-plan-link">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#extend-subscription" class="link">
                                <span><em class="icon ni ni-edit-alt"></em> Extend Subscription</span>
                                <em class="icon ni ni-arrow-right"></em>
                              </a>
                            </div>
                          </div><!-- .card-inner -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="nk-block">
                  <div class="card card-bordered">
                    <div class="card-inner card-inner-md">
                      <div class="card-title-group">
                        <h6 class="card-title">Payment History</h6>
                        <div class="card-action">
                          <a href="/payment" class="link link-sm">View All</a>
                        </div>
                      </div>
                    </div>
                    <table class="table table-tranx">
                      <thead>
                      <tr class="tb-tnx-head">
                        <th class="tb-tnx-id"><span class="">#</span></th>
                        <th class="tb-tnx-info">
                                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                <span>Bill For</span>
                                                            </span>
                          <span class="tb-tnx-date d-md-inline-block d-none">
                                                                <span class="d-md-none">Date</span>
                                                                <span class="d-none d-md-block">
                                                                    <span>Issue Date</span>
                                                                    <span>Due Date</span>
                                                                </span>
                                                            </span>
                        </th>
                        <th class="tb-tnx-amount">
                          <span class="tb-tnx-total">Total</span>
                          <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                        </th>
                      </tr><!-- .tb-tnx-item -->
                      </thead>
                      <tbody>
                      <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                          <a href="#"><span>4947</span></a>
                        </td>
                        <td class="tb-tnx-info">
                          <div class="tb-tnx-desc">
                            <span class="title">Enterprize Year Subscrition</span>
                          </div>
                          <div class="tb-tnx-date">
                            <span class="date">10-05-2019</span>
                            <span class="date">10-13-2019</span>
                          </div>
                        </td>
                        <td class="tb-tnx-amount">
                          <div class="tb-tnx-total">
                            <span class="amount">$599.00</span>
                          </div>
                          <div class="tb-tnx-status">
                            <span class="badge badge-dot badge-warning">Due</span>
                          </div>
                        </td>
                      </tr><!-- .tb-tnx-item -->
                      <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                          <a href="#"><span>4904</span></a>
                        </td>
                        <td class="tb-tnx-info">
                          <div class="tb-tnx-desc">
                            <span class="title">Maintenance Year Subscription</span>
                          </div>
                          <div class="tb-tnx-date">
                            <span class="date">06-19-2019</span>
                            <span class="date">06-26-2019</span>
                          </div>
                        </td>
                        <td class="tb-tnx-amount">
                          <div class="tb-tnx-total">
                            <span class="amount">$99.00</span>
                          </div>
                          <div class="tb-tnx-status"><span class="badge badge-dot badge-success">Paid</span></div>
                        </td>
                      </tr><!-- .tb-tnx-item -->
                      <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                          <a href="#"><span>4829</span></a>
                        </td>
                        <td class="tb-tnx-info">
                          <div class="tb-tnx-desc">
                            <span class="title">Enterprize Year Subscrition</span>
                          </div>
                          <div class="tb-tnx-date">
                            <span class="date">10-04-2018</span>
                            <span class="date">10-12-2018</span>
                          </div>
                        </td>
                        <td class="tb-tnx-amount">
                          <div class="tb-tnx-total">
                            <span class="amount">$599.00</span>
                          </div>
                          <div class="tb-tnx-status"><span class="badge badge-dot badge-success">Paid</span></div>
                        </td>
                      </tr><!-- .tb-tnx-item -->
                      </tbody>
                    </table>
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
<div class="modal fade" tabindex="-1" id="extend-subscription">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
      <div class="modal-body modal-body-md">
        <h4 class="nk-modal-title title">Extend Subscription</h4>
        <form action="" id="extend-subscription-form">
          <div class="form-group">
            <label class="form-label" for="duration">Enter the new duration <span style="color: red"> *</span></label>
            <div class="form-control-wrap">
              <input autocomplete="off" type="number" class="form-control" id="duration" name="duration" min="1">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="start-date">Select the new start date <span style="color: red"> *</span></label>
            <div class="form-control-wrap">
              <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="start-date" name="start_date">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="end-date">Select the new end date <span style="color: red"> *</span></label>
            <div class="form-control-wrap">
              <input autocomplete="off" type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="end-date" name="end_date">
            </div>
          </div>
          <input type="hidden" value="<?=$subscription['subscription_id']?>" class="subscription-id">
          <div class="form-group">
            <a href="#" data-dismiss="modal" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary ml-3">Save Information</button>
          </div>
        </form>
      </div>
    </div><!-- .modal-content -->
  </div><!-- .modla-dialog -->
</div><!-- .modal -->
<?php include(APPPATH.'/Views/_scripts.php'); ?>
<?php include('_subscription-scripts.php'); ?>
</body>
</html>