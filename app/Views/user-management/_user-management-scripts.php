<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#add-user-form').submit(function (e) {
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
          text: 'This will add a new user to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('user/create_user')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/user')?>'
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

    $('form#edit-user-form').submit(function (e) {
      e.preventDefault()
      let fullName = $('#name').val()
      let email = $('#email').val()
      let userID = $('.user-id').val()
      if (!fullName) {
        Swal.fire("Invalid Submission", "A full name is required!", "error");
      } else if (!email) {
        Swal.fire("Invalid Submission", "An email address is required!", "error");
      } else {
        let formData = new FormData(this)
        formData.set('user_id', userID)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will update the user information',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('user/edit_user')?>',
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

  function toggleStatus(userID, status) {
    Swal.fire({
      title: 'Are you sure?',
      text: status === 1 ? 'This will disable the user account' : 'This will enable the user account',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        let formData = new FormData()
        formData.set('user_id', userID)
        formData.set('status', status)
        $.ajax({
          url: '<?=site_url('user/toggle_status')?>',
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
</script>
