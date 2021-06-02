<?php
$session = session();
?>

<script>
  $(document).ready(function () {
    $('form#add-payment-form').submit(function (e) {
      e.preventDefault()
      let invoice = $('#invoice').val()
      let date = $('#date').val()
      let amount = $('#amount').val()
      if (!invoice || invoice === 'default') {
        Swal.fire("Invalid Submission", "An invoice is required!", "error");
      } else if (!date) {
        Swal.fire("Invalid Submission", "A date is required!", "error");
      } else if (!amount) {
        Swal.fire("Invalid Submission", "An amount is required!", "error");
      } else {
        let formData = new FormData(this)
        formData.set('amount', formData.get('amount').replace(/,/g, ''))
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new payment to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('payment/create_payment')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/payment')?>'
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
