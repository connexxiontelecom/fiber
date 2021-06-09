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
                      <h2 class="nk-block-title fw-normal">SpeedTest Gauge</h2>
                      <div class="nk-block-des">
                        <p>Test your Fiber speed here.
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <!--OST Widget code start-->
                  <div style="text-align:left;">
                    <div style="min-height:360px;">
                      <div style="width:100%;height:0;padding-bottom:50%;position:relative;">
                        <iframe style="border:none;position:absolute;top:0;left:0;width:100%;height:100%;min-height:360px;border:none;overflow:hidden !important;" src="//openspeedtest.com/Get-widget.php"></iframe>
                      </div>
                    </div>
                  </div>
                  <!-- OST Widget code end -->
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
