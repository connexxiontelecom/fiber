<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#add-invoice-form').submit(function (e) {
      e.preventDefault()
      let subscription = $('#subscription').val()
      let issue_date = $('#issue-date').val()
      let due_date = $('#due-date').val()
      if (!subscription || subscription === 'default') {
        Swal.fire("Invalid Submission", "A subscription is required!", "error");
      } else if (!issue_date) {
        Swal.fire("Invalid Submission", "An issue date is required!", "error");
      } else if (!due_date) {
        Swal.fire("Invalid Submission", "A due date is required!", "error");
      } else {
        let formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new invoice to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('invoice/create_invoice')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/invoice')?>'
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
  function showPayments(num_payments) {
    let formData = new FormData()
    formData.set('num_payments', num_payments);
    $.ajax({
      type: "POST",
      url: "<?=site_url('invoice/manage_num_payments')?>",
      data: formData,
      success: function(response) {
        $('.options').remove();
        $('#set_number_plans').after(response);
      },
      cache: false,
      contentType: false,
      processData: false
    })
  }
</script>
