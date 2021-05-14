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
                  <div class="nk-block-head-sub"><span>Admin Config</span></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">User Management</h2>
                      <div class="nk-block-des">
                        <p>You can add and disable the self-service users here.</p>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools gx-3">
                        <li class="nk-block-tools-opt">
                          <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <ul class="link-list-opt no-bdr">
                                <li><a href="/user/new_admin"><span>Add Admin</span></a></li>
                                <li><a href="#"><span>Add Member</span></a></li>
                              </ul>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="card card-bordered">
                    <table class="table table-member">
                      <thead class="tb-member-head thead-light">
                        <tr class="tb-member-item">
                          <th class="tb-member-info">
                            <span class="overline-title">User</span>
                          </th>
                          <th class="tb-member-type tb-col-sm">
                            <span class="overline-title">Role</span>
                          </th>
                          <th class="tb-member-role tb-col-md">
                            <span class="overline-title">Status</span>
                          </th>
                          <th class="tb-member-action">
                            <span class="overline-title">Action</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="tb-member-body">
                      </tbody>
                    </table>
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