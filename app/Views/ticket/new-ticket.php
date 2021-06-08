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
                  <div class="nk-block-head-sub"><a class="back-to" href="/ticket"><em class="icon ni ni-arrow-left"></em><span>Tickets</span></a></div>
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">New Ticket</h2>
                      <div class="nk-block-des">
                        <p>You can submit questions and enquiries about your Fiber account here.
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="card card-bordered">
                    <div class="card-inner">
                      <form action="" class="form-contact" id="submit-ticket-form">
                        <div class="row g-4">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="category"><span>Category</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select" data-search="off" data-ui="lg" id="category" name="category">
                                  <option value="0">General</option>
                                  <option value="1">Subscriptions</option>
                                  <option value="2">Payments</option>
                                  <option value="3">Invoices</option>
                                  <option value="4">Account</option>
                                </select>
                              </div>
                            </div>
                          </div><!-- .col -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="priority"><span>Priority</span></label>
                              <div class="form-control-wrap">
                                <select class="form-select" data-search="off" data-ui="lg" id="priority" name="priority">
                                  <option value="0">Normal</option>
                                  <option value="1">Important</option>
                                  <option value="2">High Priority</option>
                                </select>
                              </div>
                            </div>
                          </div><!-- .col -->
                          <div class="col-12">
                            <div class="form-group">
                              <label class="form-label" for="subject">Subject <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-lg" id="subject" name="subject">
                              </div>
                            </div>
                          </div><!-- .col -->
                          <div class="col-12">
                            <div class="form-group">
                              <label class="form-label" for="body">Body <span style="color: red"> *</span></label>
                              <div class="form-control-wrap">
                                <textarea class="form-control form-control-lg" id="body" name="body"></textarea>
                              </div>
                            </div>
                          </div><!-- .col -->
                          <div class="col-12">
                            <button class="btn btn-primary">Submit Ticket</button>
                          </div><!-- .col -->
                        </div><!-- .row -->
                      </form><!-- .form-contact -->
                    </div><!-- .card-inner -->
                  </div><!-- .card -->
                </div><!-- .nk-block -->
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
<?php include('_ticket-scripts.php')?>
</body>
</html>
