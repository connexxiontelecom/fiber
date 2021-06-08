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
                  <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                      <h2 class="nk-block-title fw-normal">Tickets</h2>
                      <div class="nk-block-des">
                        <p>Here are support tickets that have been sent.
                      </div>
                    </div>
                    <div class="nk-block-head-content">
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
              </div>
              <div class="nk-block">
                <div class="card card-bordered">
                  <table class="table table-tickets">
                    <thead class="tb-ticket-head">
                    <tr class="tb-ticket-title">
                      <th class="tb-ticket-id"><span>Ticket</span></th>
                      <th class="tb-ticket-desc">
                        <span>Subject</span>
                      </th>
                      <th class="tb-ticket-date tb-col-md">
                        <span>Submitted</span>
                      </th>
                      <th class="tb-ticket-seen">
                        <span>Category</span>
                      </th>
                      <th class="tb-ticket-seen">
                        <span>Priority</span>
                      </th>
                      <th class="tb-ticket-status">
                        <span>Status</span>
                      </th>
                      <th class="tb-ticket-action" style="width: 5%"> &nbsp; </th>
                    </tr><!-- .tb-ticket-title -->
                    </thead>
                    <tbody class="tb-ticket-body">
                    <?php if(empty($tickets)):?>
                      <tr class="tb-ticket-item">
                        <td colspan="7" class="font-weight-bolder text-center">No Tickets Exist</td>
                      </tr>
                    <?php else: foreach ($tickets as $ticket):?>
                      <tr class="tb-ticket-item">
                        <td class="tb-ticket-id"><a href="/ticket/view_ticket/<?=$ticket['ticket_id']?>"><?=$ticket['id']?></a></td>
                        <td class="tb-ticket-desc">
                          <a href="/ticket/view_ticket/<?=$ticket['ticket_id']?>"><span class="title"><?=$ticket['subject']?></span></a>
                        </td>
                        <td class="tb-ticket-date tb-col-md">
                              <span class="date">
                                <?php
                                $date = date_create($ticket['created_at']);
                                echo date_format($date, 'd M Y H:i a');
                                ?>
                              </span>
                        </td>
                        <td class="tb-ticket-seen">
                              <span class="font-weight-bold">
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
                              </span>
                        </td>
                        <td class="tb-ticket-seen">
                          <?php if ($ticket['priority'] == 0):?>
                            <span class="badge badge-dot badge-success">Normal</span>
                          <?php elseif ($ticket['priority'] == 1):?>
                            <span class="badge badge-dot badge-primary">Important</span>
                          <?php elseif ($ticket['priority'] == 2):?>
                            <span class="badge badge-dot badge-warning">High</span>
                          <?php endif;?>
                        </td>
                        <td class="tb-ticket-status">
                          <?php if ($ticket['status'] == 0):?>
                            <span class="badge badge-light">Closed</span>
                          <?php elseif ($ticket['status'] == 1):?>
                            <span class="badge badge-success">Open</span>
                          <?php endif;?>
                        </td>
                        <td class="tb-ticket-action">
                          <a href="/ticket/view_ticket/<?=$ticket['ticket_id']?>" class="btn btn-icon btn-trigger">
                            <em class="icon ni ni-chevron-right"></em>
                          </a>
                        </td>
                      </tr><!-- .tb-ticket-item -->
                    <?php endforeach; endif;?>
                    </tbody>
                  </table>
                </div>
              </div><!-- .nk-block -->
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
