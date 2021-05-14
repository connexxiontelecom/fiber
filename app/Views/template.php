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