<?php include('header.php');
include('connection.php');
$q="select * from role";
$run=mysqli_query($con,$q);
?>   


<section id="main-content">
      <section class="wrapper">
      
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Add a new Role</h4>
              <form class="form-horizontal style-form" method="POST" action="">
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="us">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ps" placeholder="Enter Your Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Contact</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cn">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                  <select name="rl" class="form-control">
<option selected disabled>Select a Role</option>
                      <?php while($data=mysqli_fetch_assoc($run)) { ?>
<option value="<?php echo $data['id']?>"> <?php echo $data['role_name'] ?>   </option>
<?php } ?>

</select>
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
$us_name=$_POST['us'];
$pswd=$_POST['ps'];
$cntct=$_POST['cn'];
$role=$_POST['rl'];



$q="INSERT INTO `users`( `user_name`, `password`, `contact`, `role_id_FK`) VALUES ('$us_name','$pswd','$cntct','$role')";
$result=mysqli_query($con,$q);
if($result){
    echo "<script>alert('Inserted');window.location.href='User_show.php'</script>";
}
else{
   echo mysqli_error($con);
}
}

?>





<?php include('footer.php')?>   