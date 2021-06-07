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
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Payment History</h2>
                      <div class="nk-block-des">
                        <p>You can manage payment history here.</p>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools gx-3">
                        <li><a href="/payment/new_payment" class="btn btn-primary">Add New Payment</a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="card card-bordered">
                    <table class="table table-tranx table-billing">
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
                        <?php if (empty($payments)):?>
                          <tr class="tb-member-item">
                            <td colspan="5" class="text-center font-weight-bold">No Payments Exist</td>
                          </tr>
                        <?php else: foreach ($payments as $payment):?>
                          <tr class="tb-tnx-item">
                            <td class="tb-tnx-id">
                              <a href="javascript:void(0)"><span><?=$payment['id']?></span></a>
                            </td>
                            <td class="tb-tnx-info">
                              <div class="tb-tnx-desc">
                                <span class="title"><?=$payment['customer']['name']?></span>
                              </div>
                              <div class="tb-tnx-date">
                                <span class="date">
                                   <?php
                                   $date = date_create($payment['invoice']['due_date']);
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
                                <a href="/invoice/view_invoice/<?=$payment['invoice']['invoice_id']?>" class="link link-sm"><span>Invoice</span></a>
                                <a href="/payment/view_payment_receipt/<?=$payment['payment_id']?>" class="link link-sm"><span>Receipt</span></a>
                              </div>
                            </td>
                          </tr><!-- .tb-tnx-item -->
                        <?php endforeach; endif;?>
                      </tbody>
                    </table>
                  </div>
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
