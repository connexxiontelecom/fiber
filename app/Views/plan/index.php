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
                      <h2 class="nk-block-title fw-normal">Plan</h2>
                      <div class="nk-block-des">
                        <p>You can add and disable the self-service plans here.</p>
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                      <ul class="nk-block-tools gx-3">
                        <li><a href="/plan/new_plan" class="btn btn-primary">Add New Plan</a></li>
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
                          <span class="overline-title">Plan</span>
                        </th>
                        <th class="tb-member-type tb-col-sm">
                          <span class="overline-title">Price</span>
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
                      <?php if (empty($plans)):?>
                        <tr class="tb-member-item">
                          <td colspan="4" class="text-center font-weight-bold">No Plans Exist</td>
                        </tr>
                      <?php else: foreach ($plans as $plan):?>
                        <tr class="tb-member-item">
                          <td class="tb-member-info">
                            <span class="font-weight-bold"><?=$plan['name']?></span>
                          </td>
                          <td class="tb-member-type tb-col-sm">
                            <span><em class="icon ni ni-sign-kobo"></em> <?=number_format($plan['price'])?></span>
                          </td>
                          <td class="tb-member-type tb-col-sm text-center">
                            <?php if ($plan['status'] == 1): ?>
                              <div class="badge badge-dot badge-success">Active</div>
                            <?php else:?>
                              <div class="badge badge-dot badge-danger">Inactive</div>
                            <?php endif;?>
                          </td>
                          <td class="tb-member-action">
                            <div class="d-none d-md-inline">
                              <a href="javascript:void(0)" class="link link-sm" data-toggle="modal" data-target=""><span>Edit</span></a>
                              <?php if ($plan['status'] == 1): ?>
                                <a href="#" class="link link-sm link-danger" onclick="toggleStatus(<?=$plan['plan_id']?>, <?=$plan['status']?>)"><span>Disable</span></a>
                              <?php else: ?>
                                <a href="#" class="link link-sm link-success" onclick="toggleStatus(<?=$plan['plan_id']?>, <?=$plan['status']?>)"><span>Enable</span></a>
                              <?php endif?>
                            </div>
                            <div class="dropdown d-md-none">
                              <a class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                <ul class="link-list-plain no-bdr">
                                  <li class="active"><a class="link link-sm" href="javascript:void(0)" data-toggle="modal" data-target="#edit-form-<?=$plan['plan_id']?>">Edit</a></li>
                                  <?php if ($plan['status'] == 1): ?>
                                    <a href="#" class="link link-sm link-danger" onclick="toggleStatus(<?=$plan['plan_id']?>, <?=$plan['status']?>)"><span>Disable</span></a>
                                  <?php else: ?>
                                    <a href="#" class="link link-sm link-success" onclick="toggleStatus(<?=$plan['plan_id']?>, <?=$plan['status']?>)"><span>Enable</span></a>
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
<?php foreach ($plans as $plan): ?>
  <div class="modal fade zoom" tabindex="-1" id="edit-form-<?=$plan['plan_id']?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">User Info</h5>
          <a href="#" class="close" data-dismiss="modal" aria-label="Close">
            <em class="icon ni ni-cross"></em>
          </a>
        </div>
        <div class="modal-body">
          <form action="" id="edit-user-form">
            <div class="form-group">
              <label class="form-label" for="name">Full Name  <span style="color: red"> *</span></label>
              <div class="form-control-wrap">
                <input type="text" class="form-control" id="name" name="name" value="<?=$plan['name']?>">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label" for="email">Email  <span style="color: red"> *</span></label>
              <div class="form-control-wrap">
                <input type="email" class="form-control" id="email" name="email" value="<?=$plan['price']?>">
              </div>
            </div>
            <input type="hidden" value="<?=$plan['plan_id']?>" class="user-id">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Save Information</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach;?>
<?php include(APPPATH.'/Views/_scripts.php'); ?>
</body>
</html>