<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en" class="js">
<?php include(APPPATH.'/Views/_head.php'); ?>
<body class="nk-body bg-white npc-default pg-error">
<div class="nk-app-root">
  <div class="nk-main">
    <div class="nk-wrap nk-wrap-nosidebar">
      <div class="nk-content">
        <div class="nk-content ">
          <div class="nk-block nk-block-middle wide-xs mx-auto">
            <div class="nk-block-content nk-error-ld text-center">
              <h1 class="nk-error-head">401</h1>
              <h3 class="nk-error-title">Unauthorized</h3>
              <p class="nk-error-text">We are very sorry for the inconvenience. It looks like you’re try to access a page that you're not authorized to access.</p>
              <a href="/dashboard" class="btn btn-lg btn-primary mt-2">Back To Home</a>
            </div>
          </div><!-- .nk-block -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH.'/Views/_scripts.php'); ?>
</body>
</html>