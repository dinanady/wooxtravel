<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../Model/bookings.php");
require_once __DIR__ .("/../../Model/payment.php");
$bookings = new bookings("", "", "", "", "", "", "", "", ""); 
$ALLbookings = $bookings->getAllbooking();
$payments = new payments(); 
$count=1;
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">num_of_geusts</th>
                    <th scope="col">checkin_date</th>
                    <th scope="col">destination</th>
                    <th scope="col">status</th>
                    <th scope="col">payment</th>
                    <th scope="col">actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($ALLbookings as $booking):?>
                  <tr>
                    <th scope="row"><?php echo $count;?></th>
                    <td><?php echo $booking['username'];?></td>
                    <td><?php echo $booking['phone_num'];?></td>
                    <td><?php echo $booking['num_of_guests'];?></td>
                    <td><?php echo $booking['checkIn'];?></td>
                    <td><?php echo $booking['destination'];?></td>
                    <td>
                    <?php if( $booking['status'] ==='pending'):?>
                    <span class="badge bg-info text-light"><?php echo $booking['status'];?> </span>
                    <?php elseif( $booking['status'] ==='paid'): ?>  
                    <span class="badge bg-success text-light"><?php echo $booking['status'];?></span>
                    <?php elseif( $booking['status'] ==='reject'): ?>
                     <span class="badge bg-danger text-light"><?php echo $booking['status'];?></span>
                      <?php elseif( $booking['status'] ==='accept'): ?>
                        <span class="badge bg-Secondary text-light"><?php echo $booking['status'];?></span>
                     <?php endif; ?>
                  </td>
                    <td>$<?php echo $booking['payment'];?></td>
                     <td>
                     <?php if( $booking['status'] ==='pending'):?>
                    <a href="../crud_admin/booking.php?id=<?php echo $booking['id'];?> && status=reject" class="btn btn-danger  text-center ">Reject</a>
                    <a href="../crud_admin/booking.php?id=<?php echo $booking['id'];?> && status=accept" class="btn btn-success  text-center ">Accept</a>
                    <?php elseif( $booking['status'] ==='paid'): ?>  
                              <?php  $details = $payments->getPaymentDetailsByBookingId($booking['id'])?>
                                <p><?php  echo  "Payment Time :". $details['payment_time']?> </p>
                           
                    <?php elseif( $booking['status'] ==='reject'): ?>
                    <a href="../crud_admin/booking.php?id=<?php echo $booking['id'];?> && status=pending" class="btn btn-info  text-center ">make pending</a>
                    
                    <?php elseif( $booking['status'] ==='accept'): ?>
                    <a href="../crud_admin/booking.php?id=<?php echo $booking['id'];?> && status=pending" class="btn btn-info  text-center ">make pending</a>
                   
                     <?php endif; ?>

                  </td>
                  </tr>
                  <?php $count++;?>
                  <?php endforeach;?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  </div>
<script type="text/javascript">

</script>
</body>
</html>