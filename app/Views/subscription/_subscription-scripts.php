<?php
  $session = session();
?>

<script>
  $(document).ready(function () {
    $('form#add-subscription-form').submit(function (e) {
      e.preventDefault()
      let description = $('#description').val()
      let user = $('#user').val()
      let plan = $('#plan').val()
      let duration = $('#duration').val()
      let startDate = $('#start-date').val()
      let endDate = $('#end-date').val()
      if (!description) {
        Swal.fire("Invalid Submission", "A description is required!", "error");
      } else if (!user || user === 'default') {
        Swal.fire("Invalid Submission", "A customer is required!", "error");
      } else if (!plan || plan === 'default') {
        Swal.fire("Invalid Submission", "A plan is required!", "error");
      } else if (!duration) {
        Swal.fire("Invalid Submission", "A duration is required!", "error");
      } else if (!startDate) {
        Swal.fire("Invalid Submission", "A start date is required!", "error");
      } else if (!endDate) {
        Swal.fire("Invalid Submission", "An end date is required!", "error");
      } else {
        let formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will add a new subscription to the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('subscription/create_subscription')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                    location.href = '<?=site_url('/subscription')?>'
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

    $('form#extend-subscription-form').submit(function (e) {
      e.preventDefault()
      let duration = $('#duration').val()
      let startDate = $('#start-date').val()
      let endDate = $('#end-date').val()
      let subscriptionID = $('.subscription-id').val()
      if (!duration) {
        Swal.fire("Invalid Submission", "A duration is required!", "error");
      } else if (!startDate) {
        Swal.fire("Invalid Submission", "A start date is required!", "error");
      } else if (!endDate) {
        Swal.fire("Invalid Submission", "An end date is required!", "error");
      } else {
        let formData = new FormData(this)
        formData.set('subscription_id', subscriptionID)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will extend the subscription the fiber self-service',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('subscription/extend_subscription')?>',
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
    
    $('form#request-subscription-form').submit(function (e) {
      e.preventDefault();
      let duration = $('#duration').val()
      let plan = $('#plan').val()
      if (!plan) {
        Swal.fire("Invalid Submission", "A plan is required!", "error");
      } else if (!duration) {
        Swal.fire("Invalid Submission", "A duration is required!", "error");
      } else {
        let formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will submit a request for a new subscription.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('subscription/request_new_subscription')?>',
              type: 'post',
              data: formData,
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
    })

    $('form#request-extension-form').submit(function (e) {
      e.preventDefault();
      let duration = $('#duration').val()
      let subscriptionID = $('.subscription-id').val()
      if (!duration) {
        Swal.fire("Invalid Submission", "A duration is required!", "error");
      } else {
        let formData = new FormData(this)
        formData.set('subscription_id', subscriptionID)
        Swal.fire({
          title: 'Are you sure?',
          text: 'This will submit a request for a subscription extension.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('subscription/request_extend_subscription')?>',
              type: 'post',
              data: formData,
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
    })
  })

  function cancelSubscription(subscriptionID) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will cancel the subscription',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        $.ajax({
          url: '<?=site_url('subscription/cancel_subscription')?>/'+subscriptionID,
          type: 'get',
          success: function (data) {
            if (data.success) {
              Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                location.href = '<?=site_url('/subscription')?>'
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

  function requestCancellation(subscriptionID) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will submit a request to cancel the subscription',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        $.ajax({
          url: '<?=site_url('subscription/request_cancel_subscription')?>/'+subscriptionID,
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

  function sendWarningAlert(subscriptionID) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will send a warning email to the customer. Please ensure the subscription end date is at least 1 week from today.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        $.ajax({
          url: '<?=site_url('subscription/send_warning_alert')?>/'+subscriptionID,
          type: 'get',
          success: function (data) {
            if (data.success) {
              Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                location.href = '<?=site_url('/subscription/manage_subscription/')?>'+subscriptionID
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

  function sendExpiryAlert(subscriptionID) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will send a warning email to the customer. Please ensure the subscription has expired before sending this message.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        $.ajax({
          url: '<?=site_url('subscription/send_expiry_alert')?>/'+subscriptionID,
          type: 'get',
          success: function (data) {
            if (data.success) {
              Swal.fire('Confirmed!', data.msg, 'success').then(() => {
                location.href = '<?=site_url('/subscription/manage_subscription/')?>'+subscriptionID
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
