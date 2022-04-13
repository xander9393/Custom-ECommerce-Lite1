<!-- Bootstrap -->
<script src="./assets/js/bootstrap.bundle.min.js"></script>

<!-- slick js -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/slick.js"></script>

<!-- scroll-top -->
<script src="./assets/js/scroll-top.js"></script>

<!-- Input quantity -->
<script src="./assets/js/input-quantity.js"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/c4359b8e83.js" crossorigin="anonymous"></script>

<!-- paypal -->
<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AU4iPqGcHNQZYr3l7XZVc8XnObEU5o7d1tIBlfuLSW3z64Og2dqlDUgkteIrBZ6-S0t43adDL5_3yBbF&currency=PHP"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo $total + $shipping ?>
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }


    }).render('#paypal-button-container');
</script>