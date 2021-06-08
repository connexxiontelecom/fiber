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
                      <h2 class="nk-block-title fw-normal">View Ticket #<?=$ticket['id']?></h2>
                    </div>
                    <div class="nk-block-head-content">
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                  <div class="ticket-info">
                    <ul class="ticket-meta">
                      <li class="ticket-id"><span>Ticket Subject:</span> <strong><?=$ticket['subject']?></strong></li>
                      <br>
                      <li class="ticket-date">
                        <span>Submitted:</span>
                        <strong>
                          <?php
                            $date = date_create($ticket['created_at']);
                            echo date_format($date, 'd M Y');
                          ?>
                        </strong>
                      </li>
                      <br>
                      <li>
                        <span>Category:</span>
                        <?php
                        switch ($ticket['category']) {
                          case 1:
                            $category = 'Subscriptions';
                            break;
                          case 2:
                            $category = 'Payments';
                            break;
                          case 3:
                            $category = 'Invoices';
                            break;
                          case 4:
                            $category = 'Account';
                            break;
                          default:
                            $category = 'General';
                            break;
                        }
                        echo $category;
                        ?>
                      </li>
                      <br>
                      <li>
                        <span>Priority:</span>
                        <?php if ($ticket['priority'] == 0):?>
                          <span class="badge badge-dot badge-success">Normal</span>
                        <?php elseif ($ticket['priority'] == 1):?>
                          <span class="badge badge-dot badge-primary">Important</span>
                        <?php elseif ($ticket['priority'] == 2):?>
                          <span class="badge badge-dot badge-warning">High</span>
                        <?php endif;?>
                      </li>
                    </ul>
                    <div class="ticket-status">
                      <?php if ($ticket['status'] == 0):?>
                        <span class="badge badge-light">Closed</span>
                      <?php elseif ($ticket['status'] == 1):?>
                        <span class="badge badge-success">Open</span>
                      <?php endif;?>
                    </div>
                  </div>
                </div><!-- .nk-block -->
                <div class="nk-block nk-block-lg">
                  <div class="card card-bordered">
                    <div class="card-inner">
                      <div class="ticket-msgs">
                        <div class="ticket-msg-item">
                          <div class="ticket-msg-from">
                            <div class="ticket-msg-user user-card">
                              <div class="user-avatar bg-primary">
                                <span><em class="icon ni ni-user-alt"></em></span>
                              </div>
                              <div class="user-info">
                                <span class="lead-text"><?=$ticket['customer']['name']?></span>
                                <span class="text-soft">You</span>
                              </div>
                            </div>
                            <div class="ticket-msg-date">
                              <span class="sub-text">
                                <?php
                                  $date = date_create($ticket['created_at']);
                                  echo date_format($date, 'd M Y H:i a');
                                ?>
                              </span>
                            </div>
                          </div>
                          <div class="ticket-msg-comment">
                            <?=$ticket['body']?>
                          </div>
                        </div><!-- .ticket-msg-item -->
                        <?php if (!empty($ticket['responses'])): foreach ($ticket['responses'] as $res):?>
                          <div class="ticket-msg-item">
                            <div class="ticket-msg-from">
                              <?php if ($res['sender']['user_id'] == $session->user_id):?>
                                <div class="ticket-msg-user user-card">
                                  <div class="user-avatar bg-primary">
                                    <span><em class="icon ni ni-user-alt"></em></span>
                                  </div>
                                  <div class="user-info">
                                    <span class="lead-text"><?=$res['sender']['name']?></span>
                                    <span class="text-soft">You</span>
                                  </div>
                                </div>
                              <?php else: ?>
                                <div class="ticket-msg-user user-card">
                                  <div class="user-avatar bg-warning">
                                    <span><em class="icon ni ni-user-alt"></em></span>
                                  </div>
                                  <div class="user-info">
                                    <span class="lead-text"><?=$res['sender']['name']?></span>
                                    <span class="text-soft">Support Team</span>
                                  </div>
                                </div>
                              <?php endif;?>
                              <div class="ticket-msg-date">
                                <span class="sub-text">
                                  <?php
                                    $date = date_create($res['created_at']);
                                    echo date_format($date, 'd M Y H:i a');
                                  ?>
                                </span>
                              </div>
                            </div>
                            <div class="ticket-msg-comment">
                              <?=$res['body']?>
                            </div>
                          </div><!-- .ticket-msg-item -->
                        <?php endforeach; endif?>
                        <?php if ($ticket['status'] == 0):?>
                          <div class="ticket-msg-reply">
                            <strong class="font-weight-bolder">This ticket is closed and is no longer accepting responses</strong>
                          </div><!-- .ticket-msg-reply -->
                        <?php elseif ($ticket['status'] == 1):?>
                          <div class="ticket-msg-reply">
                            <h5 class="title">Reply</h5>
                            <form action="#" id="customer-ticket-reply-form">
                              <div class="form-group">
                                <textarea class="form-control" placeholder="Write a message..." name="body" id="body"></textarea>
                              </div>
                              <input type="hidden" value="<?=$ticket['ticket_id']?>" id="ticket-id">
                              <div class="form-action">
                                <ul class="form-btn-group">
                                  <li class="form-btn-primary"><button class="btn btn-primary">Send</button></li>
                                  <li class="form-btn-secondary"><button type="button" onclick="closeTicket(<?=$ticket['ticket_id']?>)" class="btn btn-dim btn-outline-light">Mark as close</button></li>
                                </ul>
                              </div>
                            </form>
                          </div><!-- .ticket-msg-reply -->
                        <?php endif;?>
                      </div><!-- .ticket-msgs -->
                    </div>
                  </div>
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
