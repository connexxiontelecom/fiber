<?php
  $session = session();
?>
<script src="https://js.paystack.co/v1/inline.js"></script>
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

  function payWithPayStack(invoiceRef) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will complete the payment for invoice #'+invoiceRef,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Confirm'
    }).then(function (confirm) {
      if (confirm.value) {
        $.ajax({
          url: '<?=site_url('invoice/get_invoice_by_ref/')?>'+invoiceRef,
          type: 'get',
          success: function (data) {
            if (data.success) {
              let invoice = data.invoice
              if (parseInt(invoice.is_paid) === 1) {
                Swal.fire('Sorry!', 'Error while processing your payment. This invoice is already paid.', 'error').then(() => location.reload())
              } else {
                let key = 'pk_test_3867b2b50fe4f5d7c72a4ad9bcae7c06945c0440'
                let amountInKobo = parseInt(invoice.price) * parseInt(invoice.period) * 100
                let handler = PaystackPop.setup({
                  key,
                  email: invoice.user.email,
                  amount: amountInKobo,
                  currency: "NGN",
                  ref: 'PR<?=substr(md5(time()), 0, 7)?>', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  metadata: {
                    custom_fields: [
                      {
                        display_name: "Customer Name",
                        variable_name: "customer_name",
                        value: invoice.user.name
                      },
                      {
                        display_name: "Invoice Reference",
                        variable_name: "invoice_ref",
                        value: invoiceRef
                      },
                      {
                        display_name: "Description",
                        variable_name: "description",
                        value: invoice.subscription.description + ' Fiber Subscription'
                      },
                    ]
                  },
                  callback: function(response){
                    if (response.message === 'Approved') {
                      let amount = (amountInKobo/100).toString()
                      let formData = new FormData()
                      formData.set('invoice_id', invoice.invoice_id)
                      formData.set('payment_ref', response.reference)
                      formData.set('amount', amount)
                      $.ajax({
                        url: '<?=site_url('invoice/complete_payment')?>',
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
                  },
                  onClose: function(){
                    location.reload()
                  }
                });
                handler.openIframe();
              }
            } else {
              Swal.fire('Sorry!', 'Error while processing your payment. Please contact support team.', 'error').then(() => location.reload())
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
