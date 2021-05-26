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
                      <h2 class="nk-block-title fw-normal">Invoices</h2>
                      <div class="nk-block-des">
                        <p>You can manage invoices here.</p>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools gx-3">
                        <li><a href="/invoice/new_invoice" class="btn btn-primary">Add New Invoice</a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="card card-bordered">
                    <table class="table table-member">
                      <thead class="tb-member-head thead-light">
                        <tr class="tb-member-item">
                          <th class="tb-member-info">
                            <span class="overline-title">Customer</span>
                          </th>
                          <th class="tb-member-type tb-col-md">
                            <span class="overline-title">Invoice</span>
                          </th>
                          <th class="tb-member-type tb-col-sm">
                            <span class="overline-title">Amount</span>
                          </th>
                          <th class="tb-member-role tb-col-sm text-center">
                            <span class="overline-title">Status</span>
                          </th>
                          <th class="tb-member-action">
                            <span class="overline-title">Action</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="tb-member-body">
                      <?php if (empty($invoices)):?>
                        <tr class="tb-member-item">
                          <td colspan="5" class="text-center font-weight-bold">No Invoices Exist</td>
                        </tr>
                      <?php else: foreach ($invoices as $invoice):
                        $amount = 0;
                        foreach($invoice['payments'] as $payment){
                          $amount += $payment['amount'];
                        }
                      ?>
                        <tr class="tb-member-item">
                          <td class="tb-member-info">
                            <div class="user-card">
                              <div class="user-avatar bg-primary">
                                <em class="icon ni ni-user-alt"></em>
                              </div>
                              <div class="user-info">
                                <span class="lead-text"><?=$invoice['customer']['name']?></span>
                                <span class="sub-text"><?=$invoice['customer']['login']?></span>
                              </div>
                            </div>
                          </td>
                          <td class="tb-member-type tb-col-md">
                            <span><?=$invoice['invoice_id']?></span>
                          </td>
                          <td class="tb-member-type tb-col-sm font-weight-bold">
                            <span><?=number_format($amount)?></span>
                          </td>
                          <td class="tb-member-type tb-col-sm text-center">
                            <?php if ($invoice['is_paid'] == 0): ?>
                              <div class="badge badge-dot badge-danger">Unpaid</div>
                            <?php elseif($invoice['is_paid'] == 1):?>
                              <div class="badge badge-dot badge-warning">Partially Paid</div>
                            <?php else :?>
                              <div class="badge badge-dot badge-success">Paid</div>
                            <?php endif;?>
                          </td>
                          <td class="tb-member-action">
                            <div class="d-none d-md-inline">
                              <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                              <a href="/invoice/view_invoice/<?=$invoice['invoice_id']?>" class="btn btn-dim btn-sm btn-primary">View</a>
                            </div>
                            <div class="dropdown d-md-none">
                              <a class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                <div class="link-list-plain no-bdr">
                                  <a href="html/subscription/invoice-print.html" target="_blank" class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em class="icon ni ni-printer-fill"></em></a>
                                  <a href="/invoice/view_invoice/<?=$invoice['invoice_id']?>" class="btn btn-dim btn-sm btn-primary">View</a>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; endif;?>
                      </tbody>
                    </table>
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
