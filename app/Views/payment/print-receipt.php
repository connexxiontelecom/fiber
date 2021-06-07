<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en" class="js">
<?php include(APPPATH.'/Views/_head.php'); ?>
<body class="bg-white" onload="printPrompt()">
<div class="nk-block">
  <div class="invoice invoice-print">
    <div class="invoice-wrap">
      <div class="invoice-brand ml-n2">
        <img src="/assets/images/logo-01-2.png" width="200" srcset="/assets/images/logo-01-2.png 2x" alt="">
      </div>
      <div class="invoice-head">
        <div class="invoice-contact">
          <span class="overline-title">Receipt To</span>
          <div class="invoice-contact-info">
            <h4 class="title"><?=$receipt['customer']['name']?></h4>
            <ul class="list-plain">
              <li><em class="icon ni ni-map-pin-fill"></em><span><?=$receipt['customer_info']['address']?></span></li>
              <li><em class="icon ni ni-call-fill"></em><span><?=$receipt['customer_info']['phone']?></span></li>
            </ul>
          </div>
        </div>
        <div class="invoice-desc">
          <h3 class="title">Payment Receipt</h3>
          <ul class="list-plain">
            <li class="invoice-id"><span>Payment ID</span>:<span>#<?=$payment['id']?></span></li>
            <li class="invoice-date"><span>Payment Date</span>:
              <span>
                                <?php
                                $date = date_create($payment['date']);
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
              <th style="width: 50%">Invoice</th>
              <th></th>
              <th></th>
              <th></th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td class="font-weight-bold">
                <a href="/invoice/view_invoice/<?= $receipt['invoice_id'] ?>">
                  #<?=$receipt['id']?>
                </a>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($receipt['price'] * $receipt['period'])?></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">Amount Paid</td>
              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($receipt['price'] * $receipt['period'])?></td>
            </tr>
            </tfoot>
          </table>
        </div>
      </div><!-- .invoice-bills -->
    </div><!-- .invoice-wrap -->
  </div><!-- .invoice -->
</div><!-- .nk-block -->
<script>
  function printPrompt() {
    window.print();
  }
</script>
<?php include(APPPATH.'/Views/_scripts.php'); ?>
</body>
</html>
