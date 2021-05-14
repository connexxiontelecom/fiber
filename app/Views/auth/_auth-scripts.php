<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#login-form').submit(function (e) {
      e.preventDefault()
      let login = $('#login').val()
      let password = $('#password').val()
      if (!login) {
        Swal.fire("Invalid Submission", "A login key is required!", "error");
      } else if (!password) {
        Swal.fire("Invalid Submission", "A password is required!", "error");
      } else {
        let formData = new FormData(this)
        $.ajax({
          url: '<?=site_url('auth/login')?>',
          type: 'post',
          data: formData,
          success: function (data) {
            if (data.success) {
              window.location.href = '<?=site_url('dashboard')?>'
            } else {
              Swal.fire('Sorry!', data.msg, 'error')
            }
          },
          cache: false,
          contentType: false,
          processData: false
        })
      }
    })
  })
</script>
