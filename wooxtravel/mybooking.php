<?php
 require_once "includes/header.php";
require_once __DIR__ . "/Model/bookings.php";
require_once __DIR__ . "/Model/payment.php";

if (!isset($_SESSION['id'])) {
    // Redirect to login page if user is not logged in
    header("Location: http://localhost/wooxtravel/wooxtravel/auth/login.php");
    exit;
}

$user_id = $_SESSION['id'];

$bookings = new bookings("", "", "", "", "", "", "", "", ""); 
$ALLbookings = $bookings->getbookings($user_id);
$payments = new payments(); 
$count = 1;
?>

<div class="container-fluid my-5 " style="height:75vh;">
<div class="row">
        <div class="col">
          <div class="card mt-5">
            <div class="card-body">
            <?php if (!empty($ALLbookings)) : ?>
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
           
           <table class="table text-center  table-striped">
           <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">phone_number</th>
                <th  scope="col">Destination</th>
                <th  scope="col">Number Of Guests</th>
                <th scope="col">checkin_date</th>
                <th  scope="col">Price</th>
                <th scope="col">status</th>
                <th scope="col">Actions</th>
               
               
                
            </tr>
        </thead>
        <tbody>
            
                <?php foreach ($ALLbookings as $booking) : ?>
                    <tr>
                        <th scope="row"><?php echo $count;?></th>
                        <td><?php echo $booking['username'];?></td>
                        <td><?php echo $booking['phone_num'];?></td>
                        <td><?php echo $booking['destination']; ?></td>
                        <td><?php echo $booking['num_of_guests']; ?></td>
                        <td><?php echo $booking['checkIn']; ?></td>
                        <td>$<?php echo $booking['payment']; ?></td>
                        <td>
                        <?php if( $booking['status'] ==='pending'):?>
                      <span class="badge bg-info text-light"><?php echo $booking['status'];?> </span>
                       <?php elseif( $booking['status'] ==='paid'||$booking['status'] ==='accept'): ?>  
                    <span class="badge bg-success text-light"><?php echo $booking['status'];?></span>
                    <?php elseif( $booking['status'] ==='reject'): ?>
                     <span class="badge bg-danger text-light"><?php echo $booking['status'];?></span>
                     
                     <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($booking['status'] == "pending" || $booking['status'] == "reject") : ?>  
                                <a href="Controllers/deletebooking.php?id=<?php echo $booking['id']; ?>" class="btn btn-danger">Cancel</a>
                                
                          
                            <?php elseif ($booking['status'] == "accept") : ?>  
                                <a class="btn btn-success" href="pay.php?id=<?php echo $booking['id']; ?>">Pay</a>
                           
                            <?php elseif ($booking['status'] == "paid") : ?>  
                              <?php  $details = $payments->getPaymentDetailsByBookingId($booking['id'])?>
                                <p><?php  echo "Payment Time :". $details['payment_time']?> </p>
                            <?php endif; ?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                
                    <p  class="text-center fw-bold">No bookings found.</p>
                
            <?php endif; ?>
        </tbody>
    </table>
</div>
            </div>
            </div>
            </div>
            </div>



<?php
require_once "includes/footer.php";
?>


