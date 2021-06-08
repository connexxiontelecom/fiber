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
                        <span>Submited</span>
                      </th>
                      <th class="tb-ticket-seen tb-col-md">
                        <span>Last Seen</span>
                      </th>
                      <th class="tb-ticket-status">
                        <span>Status</span>
                      </th>
                      <th class="tb-ticket-action"> &nbsp; </th>
                    </tr><!-- .tb-ticket-title -->
                    </thead>
                    <tbody class="tb-ticket-body">
                    <tr class="tb-ticket-item is-unread">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C506223</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">Request for approve payment</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">26 Jan 2020</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date-last"><em class="icon-avatar bg-danger-dim icon ni ni-user-fill nk-tooltip" title="Support Team"></em> 27 Jan 2020 <span class="d-none d-xl-inline">10:20am</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-success">Open</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C503095</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">Payment was rejected</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">02 Dec 2019</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>04 Dec 2019 <span class="d-none d-xl-inline">04:45pm</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-light">Close</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C502049</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">We cannot install on our server</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">02 Nov 2019</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>04 Nov 2019 <span class="d-none d-xl-inline">04:45pm</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-success">Open</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C502035</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">Support for website</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">17 Oct 2019</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date"><em class="icon-avatar bg-danger-dim icon ni ni-user-fill nk-tooltip" title="Support Team"></em>21 Oct 2019 <span class="d-none d-xl-inline">04:45pm</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-light">Close</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item is-unread">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501783</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">We cannot install on our server</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">02 Oct 2019</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>07 Feb 2020 <span class="d-none d-xl-inline">02:28pm</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-success">Open</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501624</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">Setup Local Payment Gateway</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">01 Oct 2019</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date"><em class="icon-avatar bg-warning-dim icon ni ni-user-fill nk-tooltip" title="Technical Team"></em>04 Oct 2019 <span class="d-none d-xl-inline">04:15pm</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-success">Open</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501605</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">Unable to set automated email response</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">24 Sep 2019</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date"><em class="icon-avatar icon ni ni-user-alt-fill nk-tooltip" title="You"></em>01 Oct 2019 <span class="d-none d-xl-inline">02:29am</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-light">Close</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
                    <tr class="tb-ticket-item">
                      <td class="tb-ticket-id"><a href="html/subscription/ticket-details.html">C501579</a></td>
                      <td class="tb-ticket-desc">
                        <a href="html/subscription/ticket-details.html"><span class="title">Setup Local Payment Gateway</span></a>
                      </td>
                      <td class="tb-ticket-date tb-col-md">
                        <span class="date">17 Sep 2019</span>
                      </td>
                      <td class="tb-ticket-seen tb-col-md">
                        <span class="date"><em class="icon-avatar bg-warning-dim icon ni ni-user-fill nk-tooltip" title="Technical Team"></em>29 Sep 2019 <span class="d-none d-xl-inline">06:17am</span></span>
                      </td>
                      <td class="tb-ticket-status">
                        <span class="badge badge-light">Close</span>
                      </td>
                      <td class="tb-ticket-action">
                        <a href="html/subscription/ticket-details.html" class="btn btn-icon btn-trigger">
                          <em class="icon ni ni-chevron-right"></em>
                        </a>
                      </td>
                    </tr><!-- .tb-ticket-item -->
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
