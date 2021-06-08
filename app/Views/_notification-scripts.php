<?php $session = session();?>
<script>
  $(document).ready(function () {
    function loadUnseenNotifications () {
      $.ajax({
        type: 'GET',
        url: '/notification/get_user_notifications',
        dataType: 'json',
        success: function (data) {
          if (data) {
            $('.nk-notification').empty()
            if (data.length) {
              $('#notification-icon').addClass('icon-status-success')
              $.each(data, function (index, notification) {
                let notificationTime = new Date(notification.created_at).toLocaleString()
                $('.nk-notification').append(`
                <a href="javascript:void(0)" class="nk-notification-item dropdown-inner">
                  <div class="nk-notification-icon">
                    <em class="icon icon-circle bg-warning-dim ni ni-clipboad-check"></em>
                  </div>
                  <div class="nk-notification-content">
                    <div class="nk-notification-text">${notification.topic}</div>
                    <div class="nk-notification-time">${notificationTime}</div>
                  </div>
                </a>
              `)
              })
            } else {
              $('#notification-icon').removeClass('icon-status-success')
              $('.nk-notification').append(`
                <div class="nk-notification-item dropdown-inner text-center">
                  <div class="nk-notification-content">
                    <div class="nk-notification-text">No Unread Notifications</div>
                  </div>
                </div>
              `)
            }
          }
        }
      })
    }
    loadUnseenNotifications()
    setInterval(function () {
      loadUnseenNotifications()
    }, 5000)
  })
</script>
