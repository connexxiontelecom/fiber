<script>
  function cancelRequest(subscriptionRequestID) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will cancel the request',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        $.ajax({
          url: '<?=site_url('request/cancel_request')?>/'+subscriptionRequestID,
          type: 'get',
          success: function (data) {
            if (data.success) {
              Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                location.href = '<?=site_url('/request')?>'
              })
            } else {
              Swal.fire('Sorry!', data.msg, 'error')
              console.log(data.meta)
            }
          },
          cache: false,
          contentType: false,
          processData: false
        })
      }
    })
  }
</script>