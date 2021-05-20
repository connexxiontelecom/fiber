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
                                  <h6 class="title">Subscriptions</h6>
                                </div>
                                <div class="card-tools">
                                  <a href="/subscription" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount">1</span>
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
                                  <a href="/subscription" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount">0</span>
                                  <span class="sub-title">new tickets</span>
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
                                  <a href="/subscription" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount">0</span>
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
                                  <a href="/subscription" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount">0</span>
                                  <span class="sub-title">new payments</span>
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
                                  <h6 class="title">Notifications</h6>
                                </div>
                                <div class="card-tools">
                                  <a href="/subscription" class="link link-sm">View More</a>
                                </div>
                              </div>
                              <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                <div class="nk-sale-data">
                                  <span class="amount">0</span>
                                  <span class="sub-title">new notifications</span>
                                </div>
                              </div>
                            </div>
                          </div><!-- .card -->
                        </div>
                        <div class="col-md-6">
                          <div class="card card-bordered card-full">
                            <div class="nk-wg1">
                              <div class="nk-wg1-block">
                                <div class="nk-wg1-img">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                    <path d="M40.74,5.16l38.67,9.23a6,6,0,0,1,4.43,7.22L70.08,80a6,6,0,0,1-7.17,4.46L24.23,75.22A6,6,0,0,1,19.81,68L33.56,9.62A6,6,0,0,1,40.74,5.16Z" fill="#eff1ff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M50.59,6.5,11.18,11.73a6,6,0,0,0-5.13,6.73L13.85,78a6,6,0,0,0,6.69,5.16l39.4-5.23a6,6,0,0,0,5.14-6.73l-7.8-59.49A6,6,0,0,0,50.59,6.5Z" fill="#eff1ff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="15" y="15" width="54" height="70" rx="6" ry="6" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="42" y1="77" x2="58" y2="77" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="38" cy="77" r="0.5" fill="#c4cefe" stroke="#c4cefe" stroke-miterlimit="10" />
                                    <line x1="42" y1="72" x2="58" y2="72" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="38" cy="72" r="0.5" fill="#c4cefe" stroke="#c4cefe" stroke-miterlimit="10" />
                                    <line x1="42" y1="66" x2="58" y2="66" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="38" cy="66" r="0.5" fill="#c4cefe" stroke="#c4cefe" stroke-miterlimit="10" />
                                    <path d="M46,40l-15-.3V40A15,15,0,1,0,46,25h-.36Z" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M42,22A14,14,0,0,0,28,36H42V22" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="33.47 30.07 28.87 23 23 23" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="25 56 35 56 40.14 49" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                  </svg>
                                </div>
                                <div class="nk-wg1-text">
                                  <h5 class="title">Internet Statistics</h5>
                                  <p>Manage the statistical information related to internet usage.</p>
                                </div>
                              </div>
                              <div class="nk-wg1-action">
                                <a href="#" class="link"><span>Manage Internet Statistics</span> <em class="icon ni ni-chevron-right"></em></a>
                              </div>
                            </div>
                          </div>
                        </div><!-- .col -->
                        <div class="col-md-6">
                          <div class="card card-bordered card-full">
                            <div class="nk-wg1">
                              <div class="nk-wg1-block">
                                <div class="nk-wg1-img">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                    <rect x="5" y="8" width="70" height="50" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="15" y="16" width="70" height="50" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="35" y="74" width="30" height="8" rx="1" ry="1" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="42" y1="66" x2="42" y2="74" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="58" y1="66" x2="58" y2="74" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="25" y="24" width="50" height="34" rx="3" ry="3" fill="#eff1ff" />
                                    <line x1="63" y1="51" x2="63" y2="48" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="63" y1="41" x2="63" y2="31" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="63" cy="45" r="3" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="54" y1="31" x2="54" y2="34" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="54" y1="41" x2="54" y2="51" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="54" cy="37" r="3" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="44" y1="31" x2="44" y2="38" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="44" y1="44" x2="44" y2="51" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="44" cy="41" r="3" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="34" y1="31" x2="34" y2="34" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="34" y1="41" x2="34" y2="51" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="34" cy="37" r="3" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                  </svg>
                                </div>
                                <div class="nk-wg1-text">
                                  <h5 class="title">SpeedTest Gauges</h5>
                                  <p>Manage the 3rd-party SpeedTest integrations for the self-service portal.</p>
                                </div>
                              </div>
                              <div class="nk-wg1-action">
                                <a href="#" class="link"><span>Manage SpeedTest Gauges</span> <em class="icon ni ni-chevron-right"></em></a>
                              </div>
                            </div>
                          </div>
                        </div><!-- .col -->
                      </div><!-- .row -->
                    </div><!-- .nk-block -->
                    <div class="nk-block">
                      <div class="card card-bordered">
                        <div class="card-inner card-inner-md">
                          <div class="card-title-group">
                            <h6 class="card-title">Recent Activities</h6>
                            <div class="card-action">
                              <a href="html/subscription/payments.html" class="link link-sm">View All</a>
                            </div>
                          </div>
                        </div>
                        <table class="table table-member">
                          <thead class="tb-member-head thead-light">
                          <tr class="tb-member-item">
                            <th class="tb-member-info">
                              <span class="overline-title">Activity</span>
                            </th>
                            <th class="tb-member-type tb-col-md">
                              <span class="overline-title">User</span>
                            </th>
                            <th class="tb-member-type tb-col-sm">
                              <span class="overline-title">Role</span>
                            </th>
                            <th class="tb-member-action">
                              <span class="overline-title">Time</span>
                            </th>
                          </tr>
                          </thead>
                          <tbody class="tb-member-body">
                          <tr class="tb-member-item">
                            <td colspan="4" class="text-center font-weight-bold">No Recent Activities</td>
                          </tr>
                          </tbody>
                        </table>

                      </div><!-- .card -->
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
