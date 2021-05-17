<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#add-subscription-form').submit(function (e) {
      e.preventDefault()
      let user = $('#user').val()
      let plan = $('#plan').val()
      let startDate = $('#start-date').val()
      let endDate = $('#end-date').val()
      if (!user || user === 'default') {
        Swal.fire("Invalid Submission", "A customer is required!", "error");
      } else if (!plan || plan === 'default') {
        Swal.fire("Invalid Submission", "A plan is required!", "error");
      } else if (!startDate) {
        Swal.fire("Invalid Submission", "A start date is required!", "error");
      } else if (!endDate) {
        Swal.fire("Invalid Submission", "An end date is required!", "error");
      } else {
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new subscription to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        })
      }
    })
  })
</script>
