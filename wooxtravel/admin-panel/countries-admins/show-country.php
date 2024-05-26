<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../Model/country.php");

$countries = new country("","","","","","");
$allcountries = $countries->allcountries();
$count = 1;
?>
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Countries</h5>
             <a  href="create-country.php" class="btn btn-primary mb-4 text-center float-right">Create Country</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">continent</th>
                    <th scope= "col" >image</th>
                    <th scope="col">population</th>
                    <th scope="col">territory</th>

                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($allcountries as $country):?>
                  <tr>
                    <th scope="row"><?php echo $count;?></th>
                    <td><?php echo $country['name'];?></td>
                    <td><?php echo $country['continent'];?></td>
                    <td><img src ="../../assets/images/<?php echo $country['image'];?>" width="50" height="50"> </td>
                    <td><?php echo $country['population'];?></td>
                    <td><?php echo $country['territory'];?></td>
                    <td>
                      <a href="../crud_admin/delete_country.php?id=<?php echo $country['id'];?>" class="btn btn-danger  text-center ">Delete</a>
                      <a href="edit-country.php?id=<?php echo $country['id'];?>" class="btn btn-info text-center ">Edit</a>

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