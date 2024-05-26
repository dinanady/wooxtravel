<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../Model/city.php");

$cities = new city("","","","","","");
$allcities = $cities->getCities();
$count = 1;
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Cities</h5>
              <a  href="create-cities.php" class="btn btn-primary mb-4 text-center float-right">Create cities</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">trip_days</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($allcities as $city):?>
                  <tr>
                    <th scope="row"><?php echo $count;?></th>
                    <td><?php echo $city['name'];?></td>
                   
                    <td><img src ="../../assets/images/<?php echo $city['image'];?>" width="50" height="50"> </td>
                    <td><?php echo $city['trip_days'];?></td>
                    <td>$<?php echo $city['price'];?></td>
                     <td><a href="../crud_admin/delete_city.php?id=<?php echo $city['id'];?>" class="btn btn-danger  text-center ">delete</a>
                     <a href="edit-cities.php?id=<?php echo $city['id'];?>" class="btn btn-info  text-center ">Edit</a> 
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