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
                        <p>You can view your payment history here.</p>
                      </div>
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
                              <span class="title"><?=$session->name?></span>
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
                <div class="nk-block">
                  <div class="card card-bordered">
                    <div class="card-inner card-inner-lg">
                      <div class="nk-help">
                        <div class="nk-help-img">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                            <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff" />
                            <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                            <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                            <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                            <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                            <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                            <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                            <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff" />
                            <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff" />
                            <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                            <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                            <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                            <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10" /></svg>
                        </div>
                        <div class="nk-help-text">
                          <h5>We’re here to help you!</h5>
                          <p class="text-soft">File a support ticket to report any issues. Our team support team will get back to you by email.</p>
                        </div>
                        <div class="nk-help-action">
                          <a href="#" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                        </div>
                      </div><!-- .nk-help -->
                    </div>
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
