<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#submit-ticket-form').submit(function (e) {
      e.preventDefault()
      let subject = $('#subject').val()
      let body = $('#body').val()
      if (!subject) {
        Swal.fire("Invalid Submission", "A subject is required!", "error");
      } else if (!body) {
        Swal.fire("Invalid Submission", "A body is required!", "error");
      } else {
        let formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will submit a new ticket to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('ticket/create_ticket')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/ticket')?>'
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
    })
  })
</script>
