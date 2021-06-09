<script src="/assets/js/bundle.js?ver=2.4.0"></script>
<script src="/assets/js/scripts.js?ver=2.4.0"></script>
<script>
  $(document).ready(function () {
    function testDecimals(currentVal) {
      let count
      currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g)
      return count
    }
    function replaceCommas(yourNumber) {
      let components = yourNumber.toString().split(".");
      if (components.length === 1)
        components[0] = yourNumber;
      components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      if (components.length === 2)
        components[1] = components[1].replace(/\D/g, "");
      return components.join(".");
    }
    $('input.number').keyup(function (event) {
      if (event.which >= 37 && event.which <= 40) event.preventDefault()
      let currentVal = $(this).val()
      let testDecimal = testDecimals(currentVal)
      if (testDecimal.length > 1) currentVal = currentVal.slice(0, -1)
      $(this).val(replaceCommas(currentVal))
    })

    function checkSubscriptionIsValid() {
      $.ajax({
        type: 'get',
        url: '<?=site_url('subscription/check_subscription_is_valid')?>',
        dataType: 'json',
      })
    }
    checkSubscriptionIsValid()
    setInterval(function () { checkSubscriptionIsValid() }, 5000)
  })
</script>