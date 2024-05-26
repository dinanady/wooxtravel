<?php
require_once "includes/header.php";
require_once __DIR__ . "/Model/bookings.php";
require_once __DIR__ . "/Model/payment.php";
session_start(); // Make sure session is started
if (!isset($_SESSION['id'])) {
    // Redirect to login page if user is not logged in
    header("Location: http://localhost/travel/wooxtravel/wooxtravel/auth/login.php");
    exit;
}

$user_id = $_SESSION['id'];

$bookings = new bookings("", "", "", "", "", "", "", "", ""); 
$ALLbookings = $bookings->getbookings($user_id);
$payments = new payments(); 

?>

<div class="container mt-5">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Destination</th>
                <th>Number Of Guests</th>
                <th>Date</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($ALLbookings)) : ?>
                <?php foreach ($ALLbookings as $booking) : ?>
                    <tr>
                        <td><?php echo $booking['destination']; ?></td>
                        <td><?php echo $booking['num_of_guests']; ?></td>
                        <td><?php echo $booking['checkIn']; ?></td>
                        <td><?php echo $booking['payment']; ?></td>
                        <td><?php echo $booking['status']; ?></td>
                        <td>
                            <?php if ($booking['status'] == "pending" || $booking['status'] == "reject") : ?>  
                                <a href="Controllers/deletebooking.php?id=<?php echo $booking['id']; ?>" class="btn btn-danger">Cancel</a>
                                
                            <?php endif; ?> 
                            <?php if ($booking['status'] == "accept") : ?>  
                                <a class="btn btn-success" href="pay.php?id=<?php echo $booking['id']; ?>">Pay</a>
                            <?php endif; ?> 
                            <?php if ($booking['status'] == "paid") : ?>  
                              <?php  $details = $payments->getPaymentDetailsByBookingId($booking['id'])?>
                                <p><?php  echo $details['payment_time']?> </p>
                            <?php endif; ?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center fw-bold">No bookings found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal for displaying payment details -->
<!-- <div class="modal fade" id="paymentDetailsModal" tabindex="-1" aria-labelledby="paymentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentDetailsModalLabel">Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Booking ID:</strong> <span id="modalBookingId"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Payment Amount:</strong> <span id="modalPaymentAmount"></span></p>
                <p><strong>Order ID:</strong> <span id="modalOrderId"></span></p>
                <p><strong>Payer ID:</strong> <span id="modalPayerId"></span></p>
                <p><strong>Payment Time:</strong> <span id="modalPaymentTime"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<?php
require_once "includes/footer.php";
?>
<script>
$(document).ready(function (){
$(".view_data").click(function(e){
    e.preventDefault();

    var booking_id = $(this).data('booking-id');
    console.log(booking_id);
})
})
</script>

