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
                      <h2 class="nk-block-title fw-normal">Subscriptions</h2>
                      <div class="nk-block-des">
                        <p>The list of packages that your customers are subscribed to.</p>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools gx-3">
                        <li><a href="/subscription/new_subscription" class="btn btn-primary">Add New Subscription</a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                  <div class="nk-block-head">
                    <div class="nk-block-head-content">
                      <h4 class="nk-block-title">All Subscriptions</h4>
<!--                      <div class="nk-block-des">-->
<!--                        <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p>-->
<!--                      </div>-->
                    </div>
                  </div>
                  <div class="card card-preview">
                    <div class="card-inner">
                      <table class="datatable-init table">
                        <thead>
                          <tr>
                            <th>Customer</th>
                            <th>Plan</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($subscriptions as $subscription):?>
                            <tr>
                              <td><?=$subscription['customer']['name']?></td>
                              <td><?=$subscription['plan']['name']?></td>
                              <td><?=number_format($subscription['plan']['price'])?></td>
                              <td>
                                <?php
                                  $date = date_create($subscription['start_date']);
                                  echo date_format($date, 'd M Y');
                                ?>
                              </td>
                              <td>
                                <?php if ($subscription['status'] == 1): ?>
                                  <div class="badge badge-dot badge-success">Active</div>
                                <?php else:?>
                                  <div class="badge badge-dot badge-danger">Inactive</div>
                                <?php endif;?>
                              </td>
                              <td>
                                <div class="drodown">
                                  <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                      <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                      <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                      <li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a></li>
                                      <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                      <li class="divider"></li>
                                      <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                      <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                      <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                    </ul>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach;?>
                        </tbody>
                      </table>
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
</body>
</html>