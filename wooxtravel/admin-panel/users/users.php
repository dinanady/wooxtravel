<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../Model/Person.php");

$users = new Person("","","","");
$allusers = $users->getAllUsers();
$count = 1;
?>
    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-users.php" class="btn btn-primary mb-4 text-center float-right">Create User</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">Actions</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allusers as $user):?>
                  <tr>
                    <th scope="row"><?php echo $count;?></th>
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><a href="../crud_admin/delete_user.php?id=<?php echo $user['id'];?>" class="btn btn-danger  text-center ">Delete</a></td>
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