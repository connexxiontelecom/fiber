<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en" class="js">
  <?php include(APPPATH.'/Views/_head.php'); ?>
  <body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
      <div class="nk-main">
        <div class="nk-wrap nk-wrap-nosidebar">
          <div class="nk-content">
            <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
              <div class="brand-logo pb-4 text-center">
                <a href="/dashboard" class="logo-link">
                  <img class="logo-light logo-img logo-img-lg" src="/assets/images/logo-01-2.png" srcset="./images/logo2x.png 2x" alt="logo">
                  <img class="logo-dark logo-img logo-img-lg" src="/assets/images/logo-01-2.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                </a>
              </div>
              <div class="card card-bordered">
                <div class="card-inner card-inner-lg">
                  <div class="nk-block-head">
                    <div class="nk-block-head-content">
                      <h4 class="nk-block-title">Login</h4>
                      <div class="nk-block-des">
                        <p>Login to your Fiber Self-Service portal with your credentials.</p>
                      </div>
                    </div>
                  </div>
                  <form action="" class="pt-3" id="login-form">
                    <div class="form-group">
                      <div class="form-label-group">
                        <label class="form-label" for="login">Login Key</label>
                      </div>
                      <input autocomplete="off" type="text" class="form-control" id="login" name="login">
                    </div>
                    <div class="form-group">
                      <div class="form-label-group">
                        <label class="form-label" for="password">Passcode</label>
                        <a class="link link-primary link-sm" href="javascript:void(0)">Forgot Code?</a>
                      </div>
                      <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                          <em class="passcode-icon icon-show icon ni ni-eye"></em>
                          <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input autocomplete="off" type="password" class="form-control" id="password" name="password">
                      </div>
                    </div>
                    <div class="form-group mt-4">
                      <button class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="nk-footer nk-auth-footer-full">
              <div class="container wide-lg">
                <div class="nk-block-content text-center">
                  <p class="text-soft">
                    &copy; 2021 Fiber Self-Service. Powered by <a href="https://telecom.connexxiongroup.com" target="_blank">Connexxion Telecom</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include(APPPATH.'/Views/_scripts.php'); ?>
    <?php include('_auth-scripts.php'); ?>
  </body>
</html>