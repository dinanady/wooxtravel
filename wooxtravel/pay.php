<?php
require_once __DIR__ . "/Model/bookings.php";
require_once __DIR__ . "/Model/payment.php";
 require_once "includes/header.php";
// User checkout
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bookings = new bookings("", "", "", "", "", "", "", "", ""); 
    $reservation = $bookings->getonlybooking($id);
} else {
    die("No booking ID provided.");
}
?>

<div class="container text-center" style="padding: 50px; width: 700px; height: 60vh; margin: auto; margin-top:170px;">
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AUK-XcLe0EDsJ4EuEYYhOfAnxjQbmeQNbup_Kv-XNMd_w9hr_XhRzQv4aORuAL5iMjsdimR6twbYtJyN&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $reservation['payment']; ?>' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                console.log(data)
                return actions.order.capture().then(function(orderData) {
                    // Send AJAX request to update the order status
                    fetch('Controllers/update_order_status.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            booking_id: '<?php echo $reservation['id']; ?>',
                            order_id: orderData.id,
                            payer_id: orderData.payer.payer_id,
                            payment_amount: orderData.purchase_units[0].amount.value,
                            currency: orderData.purchase_units[0].amount.currency_code,
                            payment_time: orderData.update_time
                        })
                        
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.status);
                        if (data.status === 'success') {
                            // Redirect to the index.php page after a successful payment and status update
                            window.location.href = 'mybooking.php';
                        } else {
                            alert('Failed to update booking status');
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>
</div>

<?php
require_once "includes/footer.php";
?>
