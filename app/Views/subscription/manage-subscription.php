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
                        <?=$subscription['plan']['name']?>
                      </h2>
                      <div class="nk-block-des">
                        <p>This subscription expires on
                          <?php
                            $date = date_create($subscription['end_date']);
                            echo date_format($date, 'd M Y');
                          ?>
                          <span class="text-soft">
                            (
                              <?php
                                $interval = date_diff(date_create($subscription['start_date']), date_create($subscription['end_date']), true);
                                echo $interval->format('%a days remaining')
                              ?>
                            )
                          </span>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools justify-content-md-end g-4 flex-wrap">
                        <li class="order-md-last">
                          <a href="#" class="btn btn-auto btn-dim btn-danger" data-toggle="modal" data-target="#subscription-cancel"><em class="icon ni ni-cross"></em><span>Cancel Subscription</span></a>
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
                                <span class="sp-plan-status text-warning">Due</span> <span class="amount"><em class="icon ni ni-sign-kobo"></em> <?=number_format($subscription['plan']['price'])?></span>
                              </div>
                            </div>
                            <div class="sp-plan-payopt">
                              <div class="cc-pay">
                                <h6 class="title">Pay With</h6>
                                <ul class="cc-pay-method">
                                  <li class="cc-pay-dd dropdown">
                                    <a href="#" class="btn btn-white btn-outline-light dropdown-toggle dropdown-indicator" data-toggle="dropdown">
                                      <em class="icon ni ni-visa"></em>
                                      <span><span class="cc-pay-star">**** **** ****</span> 9484</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-auto">
                                      <ul class="link-list-plain">
                                        <li>
                                          <a href="#" class="cc-pay-item">
                                            <em class="cc-pay-item-icon icon ni ni-cc-visa"></em>
                                            <span class="cc-pay-item-name">
                                              <span class="cc-pay-item-method"><span class="cc-pay-star">**** **** ****</span> 9484</span>
                                              <span class="cc-pay-item-meta">Last paid Oct 12, 2018</span>
                                            </span>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#" class="cc-pay-item">
                                            <em class="cc-pay-item-icon icon ni ni-cc-paypal"></em>
                                            <span class="cc-pay-item-name">
                                              <span class="cc-pay-item-method">PayPal (info@***io.com)</span>
                                              <span class="cc-pay-item-meta">Last paid Oct 12, 2017</span>
                                            </span>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#" class="cc-pay-item">
                                            <span class="cc-pay-item-name">
                                              <span class="cc-pay-item-method-new">Add New Credit Card</span>
                                            </span>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </li>
                                  <li class="cc-pay-btn">
                                    <a href="#" class="btn btn-secondary"><span>Pay Now</span> <em class="icon ni ni-arrow-long-right"></em></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div><!-- .card-inner -->
                          <div class="card-inner">
                            <div class="sp-plan-head-group">
                              <div class="sp-plan-head">
                                <h6 class="title">Last Payment</h6>
                                <span class="ff-italic text-soft">Paid at Jun 24, 2019</span>
                              </div>
                              <div class="sp-plan-amount">
                                <span class="sp-plan-status text-success">Paid</span> <span class="amount">$599.00</span>
                              </div>
                            </div>
                          </div><!-- .card-inner -->
                          <div class="card-inner">
                            <div class="sp-plan-link">
                              <a href="#" class="link">
                                <span><em class="icon ni ni-edit-alt"></em> Modify Subscription</span>
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
                          <a href="html/subscription/payments.html" class="link link-sm">View All</a>
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
<?php include(APPPATH.'/Views/_scripts.php'); ?>
</body>
</html>