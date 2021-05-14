<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#add-admin-form').submit(function (e) {
      e.preventDefault()
      let fullName = $('#name').val()
      let login = $('#login').val()
      let email = $('#email').val()
      let password = $('#password').val()
      if (!fullName) {
        Swal.fire("Invalid Submission", "A full name is required!", "error");
      } else if (!login) {
        Swal.fire("Invalid Submission", "A login key is required!", "error");
      } else if (!email) {
        Swal.fire("Invalid Submission", "An email address is required!", "error");
      } else if (!password) {
        Swal.fire("Invalid Submission", "A password is required!", "error");
      } else {
        let formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new admin user to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('user/create_admin')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => location.reload())
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
