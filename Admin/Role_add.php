<?php include('header.php')?>   


<section id="main-content">
      <section class="wrapper">
      
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Add a new Role</h4>
              <form class="form-horizontal style-form" method="POST" action="">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="role">
                  </div>
                </div>
                <button type="submit" class="btn btn-theme" name="sub">Submit</button>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
    
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>

<?php
include('connection.php');
if(isset($_POST['sub'])){
$r=$_POST['role'];
$q="insert into role(role_name) values('$r')";
$result=mysqli_query($con,$q);
if($result){
    echo "<script>alert('Inserted')</script>";
}
else{
   echo mysqli_error($con);
}
}

?>





<?php include('footer.php')?>   