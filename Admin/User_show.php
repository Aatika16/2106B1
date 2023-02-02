
<?php include('header.php');
include('connection.php');
$qu="SELECT users.*,role.role_name FROM `users` JOIN ROLE ON users.role_id_FK=role.id";
$res=mysqli_query($con,$qu);

?>   

   <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Data Of Roles</h3>
       
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> All Roles</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Id</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> User Name</th>
                    <th><i class="fa fa-bullhorn"></i> Contact</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Role</th>
            
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_assoc($res)) { ?>
                  <tr>
                    <td>
                      <a href="basic_table.html#"><?php echo $data['id'] ?></a>
                    </td>
                    <td class="hidden-phone"><?php echo $data['user_name'] ?></td>
                 
                    <td>
                      <a href="basic_table.html#"><?php echo $data['contact'] ?></a>
                    </td>
                    <td class="hidden-phone"><?php echo $data['role_name'] ?></td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="User_update.php?x=<?php echo $data['id'] ?>"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger btn-xs" href="User_delete.php?x=<?php echo $data['id'] ?>" ><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
             <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>

    
<?php include('footer.php')?>   