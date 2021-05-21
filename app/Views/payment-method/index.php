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
                          <h2 class="nk-block-title fw-normal">Payment Method</h2>
                          <div class="nk-block-des">
                            <p>You can add and disable the self-service payment methods here.</p>
                          </div>
                        </div>
                        <div class="nk-block-head-content">
                          <ul class="nk-block-tools gx-3">
                            <li><a href="/payment_method/new_payment_method" class="btn btn-primary">Add New Payment Method</a></li>
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
                              <span class="overline-title">Name</span>
                            </th>
                            <th class="tb-member-role tb-col-sm text-center">
                              <span class="overline-title">Status</span>
                            </th>
                            <th class="tb-member-action">
                              <span class="overline-title">Action</span>
                            </th>
                          </tr>
                          </thead>
                          <tbody class="tb-member-body">
                          <?php if (empty($payment_methods)):?>
                            <tr class="tb-member-item">
                              <td colspan="3" class="text-center font-weight-bold">No Payment Methods Exist</td>
                            </tr>
                          <?php else: foreach ($users as $user):?>
                            <tr class="tb-member-item">
                              <td class="tb-member-info">
                                <div class="user-card">
                                  <div class="user-avatar bg-primary">
                                    <!--                                  <span>AB</span>-->
                                    <em class="icon ni ni-user-alt"></em>
                                  </div>
                                  <div class="user-info">
                                    <span class="lead-text"><?=$user['name']?></span>
                                    <span class="sub-text"><?=$user['login']?></span>
                                  </div>
                                </div>
                              </td>
                              <td class="tb-member-type tb-col-md">
                                <span><?=$user['email']?></span>
                              </td>
                              <td class="tb-member-type tb-col-sm font-weight-bold">
                                <span><?=$user['is_admin'] == 1 ? 'Admin' : 'Customer'?></span>
                              </td>
                              <td class="tb-member-type tb-col-sm text-center">
                                <?php if ($user['status'] == 1): ?>
                                  <div class="badge badge-dot badge-success">Active</div>
                                <?php else:?>
                                  <div class="badge badge-dot badge-danger">Inactive</div>
                                <?php endif;?>
                              </td>
                              <td class="tb-member-action">
                                <div class="d-none d-md-inline">
                                  <?php if ($user['is_admin'] == 1):?>
                                    <a href="javascript:void(0)" class="link link-sm" data-toggle="modal" data-target="#edit-form-<?=$user['user_id']?>"><span>Edit</span></a>
                                  <?php else:?>
                                    <a href="/user/manage_customer/<?=$user['user_id']?>" class="link link-sm"><span>Manage</span></a>
                                  <?php endif?>
                                  <?php if ($user['status'] == 1): ?>
                                    <a href="#" class="link link-sm link-danger" onclick="toggleStatus(<?=$user['user_id']?>, <?=$user['status']?>)"><span>Disable</span></a>
                                  <?php else: ?>
                                    <a href="#" class="link link-sm link-success" onclick="toggleStatus(<?=$user['user_id']?>, <?=$user['status']?>)"><span>Enable</span></a>
                                  <?php endif?>
                                </div>
                                <div class="dropdown d-md-none">
                                  <a class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-plain no-bdr">
                                      <li class="active">
                                        <?php if ($user['is_admin'] == 1):?>
                                          <a href="javascript:void(0)" class="link link-sm" data-toggle="modal" data-target="#edit-form-<?=$user['user_id']?>"><span>Edit</span></a>
                                        <?php else:?>
                                          <a href="/user/manage_customer/<?=$user['user_id']?>" class="link link-sm"><span>Manage</span></a>
                                        <?php endif?>
                                      </li>
                                      <?php if ($user['status'] == 1): ?>
                                        <a href="#" class="link link-sm link-danger" onclick="toggleStatus(<?=$user['user_id']?>, <?=$user['status']?>)"><span>Disable</span></a>
                                      <?php else: ?>
                                        <a href="#" class="link link-sm link-success" onclick="toggleStatus(<?=$user['user_id']?>, <?=$user['status']?>)"><span>Enable</span></a>
                                      <?php endif?>
                                    </ul>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; endif;?>
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
