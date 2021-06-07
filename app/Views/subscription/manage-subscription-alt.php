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
                        <p>This is a <?=$subscription['duration']?> month subscription and it <?=$subscription['status'] == 1 ? 'expires' : 'expired' ?> on
                          <span class="font-weight-bolder">
                            <?php
                            $date = date_create($subscription['end_date']);
                            echo date_format($date, 'd M Y');
                            ?>
                          </span>
                        </p>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools justify-content-md-end g-4 flex-wrap">
                        <li class="order-md-last">
                          <button onclick="requestCancellation(<?=$subscription['subscription_id']?>)" class="btn btn-auto btn-dim btn-danger"><em class="icon ni ni-cross"></em><span>Cancel Subscription</span></button>
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
                              <h6 class="title">Subscription Details</h6>
                            </div>
                            <div class="sp-plan-desc sp-plan-desc-mb">
                              <ul class="row gx-1">
                                <li class="col-sm-4">
                                  <p>
                                    <span class="text-soft">Started On</span>
                                    <?php
                                      $date = date_create($subscription['start_date']);
                                      echo date_format($date, 'd M Y');
                                    ?>
                                  </p>
                                </li>
                                <li class="col-sm-4">
                                  <p>
                                    <span class="text-soft">Plan</span><?=$subscription['plan']['name']?>
                                  </p>
                                </li>
                                <li class="col-sm-4">
                                  <p>
                                    <span class="text-soft">Amount</span>
                                    <em class="icon ni ni-sign-kobo"></em> <?=number_format($subscription['plan']['price'] * $subscription['duration'])?>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div><!-- .card-inner -->
                          <div class="card-inner">
                            <div class="sp-plan-link">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#request-extension" class="link">
                                <span><em class="icon ni ni-edit-alt"></em> Request Subscription Extension</span>
                                <em class="icon ni ni-arrow-right"></em>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="card card-bordered card-full d-none d-xl-block">
                        <div class="nk-help-plain card-inner text-center">
                          <div class="nk-help-text pt-4">
                            <h5>Subscription Support</h5>
                            <p class="text-soft">You can request support regarding this subscription.</p>
                          </div>
                          <div class="nk-help-action">
                            <a href="#" class="btn btn-primary">Get Support Now</a>
                          </div>
                        </div>
                      </div><!-- .card -->
                      <div class="card card-bordered d-xl-none">
                        <div class="card-inner">
                          <div class="nk-help">
                            <div class="nk-help-text">
                              <h5>Subscription Support</h5>
                              <p class="text-soft">
                                You can request support regarding this subscription.
                              </p>
                            </div>
                            <div class="nk-help-action">
                              <a href="#" class="btn btn-primary">Get Support Now</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- .card -->
                    </div><!-- .col -->
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
                            <span>Customer</span>
                          </span>
                          <span class="tb-tnx-date d-md-inline-block d-none">
                            <span class="d-md-none">Date</span>
                            <span class="d-none d-md-block">
                              <span>Due Date</span>
                              <span>Paid Date</span>
                            </span>
                          </span>
                        </th>
                        <th class="tb-tnx-amount">
                          <span class="tb-tnx-total">Amount</span>
                          <span class="tb-tnx-status d-none d-md-inline-block">Actions</span>
                        </th>
                      </tr><!-- .tb-tnx-head -->
                      </thead>
                      <tbody>
                      <?php if (empty($invoices)):?>
                        <tr class="tb-member-item">
                          <td colspan="5" class="text-center font-weight-bold">No Payments Exist</td>
                        </tr>
                      <?php else: foreach ($invoices as $invoice): foreach ($invoice['payments'] as $payment):?>
                        <tr class="tb-tnx-item">
                          <td class="tb-tnx-id">
                            <a href="javascript:void(0)"><span><?=$payment['id']?></span></a>
                          </td>
                          <td class="tb-tnx-info">
                            <div class="tb-tnx-desc">
                              <span class="title"><?=$invoice['customer']['name']?></span>
                            </div>
                            <div class="tb-tnx-date">
                              <span class="date">
                               <?php
                               $date = date_create($invoice['due_date']);
                               echo date_format($date, 'd M Y');
                               ?>
                              </span>
                              <span class="date">
                               <?php
                               $date = date_create($payment['date']);
                               echo date_format($date, 'd M Y');
                               ?>
                              </span>
                            </div>
                          </td>
                          <td class="tb-tnx-amount">
                            <div class="tb-tnx-total">
                              <span class="amount"><em class="icon ni ni-sign-kobo"></em> <?=number_format($payment['amount'])?></span>
                            </div>
                            <div class="tb-tnx-status">
                              <a href="/invoice/view_invoice/<?=$invoice['invoice_id']?>" class="link link-sm"><span>Invoice</span></a>
                              <a href="/invoice/view_invoice/<?=$invoice['invoice_id']?>" class="link link-sm"><span>Receipt</span></a>
                            </div>
                          </td>
                        </tr><!-- .tb-tnx-item -->
                      <?php endforeach; endforeach; endif;?>
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
<div class="modal fade zoom" tabindex="-1" id="request-extension">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Subscription Extension</h5>
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
      </div>
      <div class="modal-body">
        <form action="" id="request-extension-form">
          <div class="row gy-4">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="duration">Duration (Months) <span style="color: red"> *</span></label>
                <div class="form-control-wrap">
                  <input autocomplete="off" type="number" class="form-control" id="duration" name="duration" min="1">
                </div>
              </div>
            </div>
            <div class="col-12">
              <input type="hidden" value="<?=$subscription['subscription_id']?>" class="subscription-id">
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
<?php include(APPPATH.'/Views/_scripts.php'); ?>
<?php include('_subscription-scripts.php'); ?>
</body>
</html>