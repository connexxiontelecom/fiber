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
                      <h2 class="nk-block-title fw-normal">My Requests</h2>
                      <div class="nk-block-des">
                        <p>Here is a list of the pending subscription requests you have made.
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools gx-3">
                        <li class="order-md-last"><a href="/subscription" class="btn btn-white btn-dim btn-outline-primary"><span>My Subscriptions</span></a></li>
                      </ul>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <?php if (empty($requests)): ?>
                  <?php else: foreach ($requests as $request):?>
                    <?php if ($request['type'] == 'new_sub'): ?>
                      <div class="card card-bordered">
                        <div class="card-inner-group">
                          <div class="card-inner">
                            <div class="between-center flex-wrap flex-md-nowrap g-3">
                              <div class="nk-block-text">
                                <h6>New Subscription Request</h6>
                                <ul class="list-inline list-col2 text-soft">
                                  <li>
                                    Plan:
                                    <strong class="text-base"><?=$request['plan']['name']?></strong> at
                                    <strong class="text-base"><em class="icon ni ni-sign-kobo"></em> <?=number_format($request['plan']['price'])?> per month</strong> for
                                    <strong class="text-base"><?=$request['duration']?> months</strong>
                                  </li>
                                  <br>
                                  <li>
                                    Request Made:
                                    <?php
                                      $date = date_create($request['created_at']);
                                      echo date_format($date, 'd M Y, H:i:s a');
                                    ?>
                                  </li>
                                </ul>
                              </div>
                              <div class="nk-block-actions">
                                <ul class="align-center gx-3">
                                  <li class="order-md-last">
                                    <a href="#" class="link link-primary">Cancel Request</a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div><!-- .nk-card-inner -->
                        </div>
                      </div><!-- .card -->
                    <?php elseif ($request['type'] == 'extend_sub'):?>
                      <div class="card card-bordered">
                        <div class="card-inner-group">
                          <div class="card-inner">
                            <div class="between-center flex-wrap flex-md-nowrap g-3">
                              <div class="nk-block-text">
                                <h6>Extend Subscription Request</h6>
                                <ul class="list-inline list-col2 text-soft">
                                  <li>
                                    Subscription:
                                    <strong class="text-base"><?=$request['subscription']['description']?></strong> ending
                                    <strong class="text-base">
                                      <?php
                                      $date = date_create($request['subscription']['end_date']);
                                      echo date_format($date, 'd M Y');
                                      ?>
                                    </strong> for
                                    <strong class="text-base"><?=$request['duration']?> months</strong> extension
                                  </li>
                                  <br/>
                                  <li>
                                    Request Made:
                                    <?php
                                    $date = date_create($request['created_at']);
                                    echo date_format($date, 'd M Y, H:i:s a');
                                    ?>
                                  </li>
                                </ul>
                              </div>
                              <div class="nk-block-actions">
                                <ul class="align-center gx-3">
                                  <li class="order-md-last">
                                    <a href="#" class="link link-primary">Cancel Request</a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div><!-- .nk-card-inner -->
                        </div>
                      </div><!-- .card -->
                    <?php else: ?>
                      <div class="card card-bordered">
                        <div class="card-inner-group">
                          <div class="card-inner">
                            <div class="between-center flex-wrap flex-md-nowrap g-3">
                              <div class="nk-block-text">
                                <h6>Cancel Subscription Request</h6>
                                <ul class="list-inline list-col2 text-soft">
                                  <li>
                                    Subscription:
                                    <strong class="text-base"><?=$request['subscription']['description']?></strong> ending
                                    <strong class="text-base">
                                      <?php
                                      $date = date_create($request['subscription']['end_date']);
                                      echo date_format($date, 'd M Y');
                                      ?>
                                    </strong>
                                  </li>
                                  <br/>
                                  <li>
                                    Request Made:
                                    <?php
                                    $date = date_create($request['created_at']);
                                    echo date_format($date, 'd M Y, H:i:s a');
                                    ?>
                                  </li>
                                </ul>
                              </div>
                              <div class="nk-block-actions">
                                <ul class="align-center gx-3">
                                  <li class="order-md-last">
                                    <a href="#" class="link link-primary">Cancel Request</a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div><!-- .nk-card-inner -->
                        </div>
                      </div><!-- .card -->

                    <?php endif;?>
                  <?php endforeach; endif?>
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
