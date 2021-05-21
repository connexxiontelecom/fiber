<?php  $session = session() ?>
<script>
  $(document).ready(function () {
    $('form#add-payment-method-form').submit(function (e) {
      e.preventDefault()
      let name = $('#name').val()
      if (!name) {
        Swal.fire("Invalid Submission", "A payment method name is required!", "error");
      } else {
        let formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new payment method to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('payment_method/create_payment_method')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                console.log(data)
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/payment_method')?>'
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
