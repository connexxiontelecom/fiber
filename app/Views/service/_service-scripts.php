<?php  $session = session() ?>
<script>
  $(document).ready(function () {
    $('form#add-service-form').submit(function (e) {
      e.preventDefault()
      let name = $('#name').val()
      let price = $('#price').val()
      if (!name) {
        Swal.fire("Invalid Submission", "A service name is required!", "error");
      } else if (!price) {
        Swal.fire("Invalid Submission", "A service price is required!", "error");
      } else {
        let formData = new FormData(this)
        formData.set('price', formData.get('price').replace(/,/g, ''))
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new service to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('service/create_service')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/service')?>'
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
