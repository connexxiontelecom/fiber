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
              <td class="font-weight-bold"><?=$invoice['subscription']?></td>
              <td><?=$invoice['plan']?></td>
              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['price'])?></td>
              <td><?=$invoice['period']?> months</td>
              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['price'] * $invoice['period'])?></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">Subtotal</td>
              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['price'] * $invoice['period'])?></td>
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
              <td><em class="icon ni ni-sign-kobo"></em> <?=number_format($invoice['price'] * $invoice['period'])?></td>
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
