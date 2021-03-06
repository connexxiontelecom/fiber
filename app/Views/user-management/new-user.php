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
                  <div class="nk-block-head-sub"><a class="back-to" href="/user"><em class="icon ni ni-arrow-left"></em><span>User Management</span></a></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Add New User</h2>
                      <div class="nk-block-des">
                        <p>Add an admin or customer here.</p>
                      </div>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="row g-gs">
                    <div class="col-lg-8">
                      <div class="card card-bordered">
                        <div class="card-inner">
                          <div class="card-head">
                            <h5 class="card-title">User Info</h5>
                          </div>
                          <form action="" class="pt-3" id="add-user-form">
                            <div class="form-group">
                              <label class="form-label" for="name">Full Name <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control" id="name" name="name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="login">Login Key <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="nope" type="text" class="form-control" id="login" name="login">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="email">Email <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="email" class="form-control" id="email" name="email">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="password">Password <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="new-password" type="password" class="form-control" id="password" name="password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="">User Role</label><br>
                              <div class="custom-control custom-radio">
                                <input type="radio" id="admin-role" name="is_admin" class="custom-control-input is_admin" value="1" checked>
                                <label class="custom-control-label" for="admin-role">Admin</label>
                              </div>
                              <div class="custom-control custom-radio ml-3">
                                <input type="radio" id="customer-role" name="is_admin" class="custom-control-input is_admin" value="0">
                                <label class="custom-control-label" for="customer-role">Customer</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Create New User</button>
                            </div>
                          </form>
                        </div>
                      </div>
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
<?php include('_user-management-scripts.php')?>
</body>
</html>