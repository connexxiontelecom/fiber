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
                  <div class="nk-block-head-sub"><a class="back-to" href="/plan"><em class="icon ni ni-arrow-left"></em><span>Plans</span></a></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Add New Plan</h2>
                      <div class="nk-block-des">
                        <p>Add a plan here.</p>
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
                            <h5 class="card-title">Plan Info</h5>
                          </div>
                          <form action="" class="pt-3" id="add-plan-form">
                            <div class="form-group">
                              <label class="form-label" for="name">Name <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control" id="name" name="name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="price">Price <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control number" id="price" name="price">
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Create New Plan</button>
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
<?php include('_plan-scripts.php')?>
</body>
</html>