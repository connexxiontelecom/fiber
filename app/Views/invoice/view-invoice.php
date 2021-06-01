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
                      <h2 class="nk-block-title fw-normal">Invoice #<?=$invoice['id']?></h2>
                      <div class="nk-block-des">
                        <p>The invoice details are given bellow.</p>
                      </div>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="invoice">
                    <div class="invoice-action">
                      <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="/invoice/print_invoice/<?=$invoice['invoice_id']?>" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                    </div><!-- .invoice-actions -->
                    <div class="invoice-wrap">
                      <div class="invoice-brand ml-n2">
                        <img src="/assets/images/logo-01-2.png" width="200" srcset="/assets/images/logo-01-2.png 2x" alt="">
                      </div>
                      <div class="invoice-head">
                        <div class="invoice-contact">
                          <span class="overline-title">Invoice To</span>
                          <div class="invoice-contact-info">
                            <h4 class="title"><?=$invoice['customer']['name']?></h4>
                            <ul class="list-plain">
                              <li><em class="icon ni ni-map-pin-fill"></em><span><?=$invoice['customer_info']['address']?></span></li>
                              <li><em class="icon ni ni-call-fill"></em><span><?=$invoice['customer_info']['phone']?></span></li>
                            </ul>
                          </div>
                        </div>
                        <div class="invoice-desc">
                          <h3 class="title">Invoice</h3>
                          <ul class="list-plain">
                            <li class="invoice-id"><span>Invoice ID</span>:<span>#<?=$invoice['id']?></span></li>
                            <li class="invoice-date"><span>Issue Date</span>:
                              <span>
                                <?php
                                  $date = date_create($invoice['issue_date']);
                                  echo date_format($date, 'd M Y');
                                ?>
                              </span>
                            </li>
                            <li class="invoice-date"><span>Due Date</span>:
                              <span>
                                <?php
                                  $date = date_create($invoice['due_date']);
                                  echo date_format($date, 'd M Y');
                                ?>
                              </span>
                            </li>
                          </ul>
                        </div>
                      </div><!-- .invoice-head -->
                      <div class="invoice-bills">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th style="width: 50%">Subscription</th>
                              <th>Plan</th>
                              <th>Price</th>
                              <th>Period</th>
                              <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td class="font-weight-bold"><?=$invoice['subscription']['description']?></td>
                              <td><?=$invoice['plan']['name']?></td>
                              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['plan']['price'])?></td>
                              <td><?=$invoice['subscription']['duration']?> months</td>
                              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['plan']['price'] * $invoice['subscription']['duration'])?></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                              <td colspan="2"></td>
                              <td colspan="2">Subtotal</td>
                              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['plan']['price'] * $invoice['subscription']['duration'])?></td>
                            </tr>
                            <tr>
                              <td colspan="2"></td>
                              <td colspan="2">Processing fee</td>
                              <td>-</td>
                            </tr>
                            <tr>
                              <td colspan="2"></td>
                              <td colspan="2">TAX</td>
                              <td>-</td>
                            </tr>
                            <tr>
                              <td colspan="2"></td>
                              <td colspan="2">Grand Total</td>
                              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['plan']['price'] * $invoice['subscription']['duration'])?></td>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div><!-- .invoice-bills -->
                    </div><!-- .invoice-wrap -->
                  </div><!-- .invoice -->
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
