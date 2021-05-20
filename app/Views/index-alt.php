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
                            <p>Welcome to your self-service dashboard. You can manage your Connexxion Telecom Fibre account here.</p>
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
                        <div class="col-md-6">
                          <div class="card card-bordered card-full">
                            <div class="nk-wg1">
                              <div class="nk-wg1-block">
                                <div class="nk-wg1-img">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                    <rect x="5" y="7" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="25" y="27" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <rect x="15" y="17" width="60" height="56" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="15" y1="29" x2="75" y2="29" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                    <circle cx="53" cy="23" r="2" fill="#c4cefe" />
                                    <circle cx="60" cy="23" r="2" fill="#c4cefe" />
                                    <circle cx="67" cy="23" r="2" fill="#c4cefe" />
                                    <rect x="22" y="39" width="20" height="20" rx="2" ry="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="40" x2="69" y2="40" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="51" x2="69" y2="51" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="57" x2="59" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="64" y1="57" x2="66" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="49" y1="46" x2="59" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="64" y1="46" x2="66" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
                                </div>
                                <div class="nk-wg1-text">
                                  <h5 class="title">Profile</h5>
                                  <p>See your profile data and manage your account on the self-service system.</p>
                                </div>
                              </div>
                              <div class="nk-wg1-action">
                                <a href="#" class="link"><span>Manage Your Profile</span> <em class="icon ni ni-chevron-right"></em></a>
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
                                    <path d="M68.14,80.86,30.21,72.69a5.93,5.93,0,0,1-4.57-7l12.26-56A6,6,0,0,1,45,5.14l28.18,6.07L85.5,29.51,75.24,76.33A6,6,0,0,1,68.14,80.86Z" fill="#eff1ff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="73 12.18 69.83 26.66 85.37 30.08" fill="#eff1ff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M66.26,71.15,29.05,82.46a6,6,0,0,1-7.46-4L4.76,23.15a6,6,0,0,1,4-7.47l27.64-8.4L56.16,17.39,70.24,63.68A6,6,0,0,1,66.26,71.15Z" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="36.7 8.22 41.05 22.53 56.33 17.96" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path d="M68,85H29a6,6,0,0,1-6-6V21a6,6,0,0,1,6-6H58L74,30.47V79A6,6,0,0,1,68,85Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <polyline points="58 16 58 31 74 31.07" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="45" y1="41" x2="61" y2="41" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="48" x2="61" y2="48" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="55" x2="61" y2="55" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="63" x2="61" y2="63" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <line x1="35" y1="69" x2="51" y2="69" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /><text transform="translate(34.54 43.18) scale(0.99 1)" font-size="9.31" fill="#6576ff" font-family="Nunito-Black, Nunito Black">$</text></svg>
                                </div>
                                <div class="nk-wg1-text">
                                  <h5 class="title">Payment History</h5>
                                  <p>Track all payments you have made for Connexxion Telecom's Fiber service.</p>
                                </div>
                              </div>
                              <div class="nk-wg1-action">
                                <a href="html/subscription/payments.html" class="link"><span>Payment History</span> <em class="icon ni ni-chevron-right"></em></a>
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
                                    <polyline points="25 56 35 56 40.14 49" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
                                </div>
                                <div class="nk-wg1-text">
                                  <h5 class="title">Internet Statistics</h5>
                                  <p>View the statistical information related to your internet usage.</p>
                                </div>
                              </div>
                              <div class="nk-wg1-action">
                                <a href="#" class="link"><span>View Statistics</span> <em class="icon ni ni-chevron-right"></em></a>
                              </div>
                            </div>
                          </div>
                        </div><!-- .col -->
                      </div><!-- .row -->
                    </div><!-- .nk-block -->
                    <div class="nk-block">
                      <div class="card card-bordered">
                        <div class="card-inner">
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
                              <p class="text-soft">File a support ticket to report any issues. Our support team will get back to you by email.</p>
                            </div>
                            <div class="nk-help-action">
                              <a href="html/subscription/contact.html" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                            </div>
                          </div>
                        </div>
                      </div>
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
