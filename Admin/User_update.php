<?php
include('connection.php');
$id=$_GET['x'];
$q="select * from users where id='$id'";
$run=mysqli_query($con,$q);
$data=mysqli_fetch_assoc($run);


$q1="select * from role";
$run1=mysqli_query($con,$q1);



?>
<?php include('header.php')?>   
<section id="main-content">
      <section class="wrapper"> 
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" method="POST" action="">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="us" value="<?php echo $data['user_name'] ?>">
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Contact</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cn" value="<?php echo $data['contact'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select name="role" class="form-control">
                        <?php while($data1=mysqli_fetch_assoc($run1)) { ?>
 <option value="<?php echo $data1['id'] ?>"   <?php  if($data1['id']==$data['role_id_FK']){ echo 'selected';}  ?>          ><?php echo $data1['role_name']?></option>
                        <?php }?>
</select>
                  </div>
                </div>





                <button type="submit" class="btn btn-theme" name="sub">Update</button>
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
$us=$_POST['us'];
$cn=$_POST['cn'];
$rolee=$_POST['role'];


$q="UPDATE `users` SET `user_name`='$us',`contact`='$cn',`role_id_FK`='$rolee' WHERE id='$id'";
$result=mysqli_query($con,$q);
if($result){
    echo "<script>alert('Updated');window.location.href='User_show.php'</script>";
}
else{
   echo mysqli_error($con);
}
}

?>





<?php include('footer.php')?>   