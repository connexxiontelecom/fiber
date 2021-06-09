<?php
  $session = session();
?>
<!DOCTYPE html>
<html lang="en" class="js">
  <?php include('_head.php'); ?>
  <body class="nk-body bg-white npc-default has-aside">
    <div class="nk-app-root">
      <div class="nk-main">
        <div class="nk-wrap">
          <?php include('_header.php'); ?>
          <div class="nk-content">
            <div class="container wide-xl">
              <div class="nk-content-inner">
                <?php include('_sidebar.php'); ?>
                <div class="nk-content-body">
                  <div class="nk-content-wrap">
                    <div class="nk-block-head nk-block-head-lg">
                      <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                          <h2 class="nk-block-title fw-normal">Welcome, <?=$session->get('name')?></h2>
                          <div class="nk-block-des">
                            <p>Welcome to your admin dashboard. You can manage the Connexxion Telecom Fibre portal here.</p>
                          </div>
                        </div>
                      </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                      <div class="row g-gs">
                        <div class="col-sm-4">
                          <div class="card card-bordered">
                            <div class="card-inner">
                              <div class="card-title-group align-start mb-2">
                                <div class="card-title">
                                  <h6 class="title">Requests</h6>
                                </div>
                                <div class="card-tools">
                                  <a href="/request" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount"><?=count($pending_requests)?></span>
                                  <span class="sub-title">pending requests</span>
                                </div>
                              </div>
                            </div>
                          </div><!-- .card -->
                        </div>
                        <div class="col-sm-4">
                          <div class="card card-bordered">
                            <div class="card-inner">
                              <div class="card-title-group align-start mb-2">
                                <div class="card-title">
                                  <h6 class="title">Subscriptions</h6>
                                </div>
                                <div class="card-tools">
                                  <a href="/subscription" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount"><?=count($active_subscriptions)?></span>
                                  <span class="sub-title">active subscriptions</span>
                                </div>
                              </div>
                            </div>
                          </div><!-- .card -->
                        </div>
                        <div class="col-sm-4">
                          <div class="card card-bordered">
                            <div class="card-inner">
                              <div class="card-title-group align-start mb-2">
                                <div class="card-title">
                                  <h6 class="title">Tickets</h6>
                                </div>
                                <div class="card-tools">
                                  <a href="/ticket" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount"><?=count($open_tickets)?></span>
                                  <span class="sub-title">open tickets</span>
                                </div>
                              </div>
                            </div>
                          </div><!-- .card -->
                        </div>
                        <div class="col-sm-4">
                          <div class="card card-bordered">
                            <div class="card-inner">
                              <div class="card-title-group align-start mb-2">
                                <div class="card-title">
                                  <h6 class="title">Invoices</h6>
                                </div>
                                <div class="card-tools">
                                  <a href="/invoice" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount"><?=count($unpaid_invoices)?></span>
                                  <span class="sub-title">unpaid invoices</span>
                                </div>
                              </div>
                            </div>
                          </div><!-- .card -->
                        </div>
                        <div class="col-sm-4">
                          <div class="card card-bordered">
                            <div class="card-inner">
                              <div class="card-title-group align-start mb-2">
                                <div class="card-title">
                                  <h6 class="title">Payments</h6>
                                </div>
                                <div class="card-tools">
                                  <a href="/payment" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount"><?=count($all_payments)?></span>
                                  <span class="sub-title">payments received</span>
                                </div>
                              </div>
                            </div>
                          </div><!-- .card -->
                        </div>
                      </div><!-- .row -->
                    </div><!-- .nk-block -->
                  </div>
                  <!-- footer @s -->
                  <?php include('_footer.php'); ?>
                  <!-- footer @e -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('_scripts.php'); ?>
  </body>
</html>
