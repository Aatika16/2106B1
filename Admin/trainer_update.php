<?php
include('connection.php');
$id=$_GET['x'];
$q="select * from trainers where id='$id'";
$run=mysqli_query($con,$q);
$data=mysqli_fetch_assoc($run);



?>
<?php include('header.php')?>   
<section id="main-content">
      <section class="wrapper"> 
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Trainer Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="us" value="<?php echo $data['Trainer_name'] ?>">
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Experiance</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cn" value="<?php echo $data['Experiance'] ?>">
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Experiance</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="img" onChange="abc(this)">
                  </div>
                </div>
                <img src="<?php echo $data['Trainer_Image']  ?>" id="myimage" height="100"/>

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
$t_name=$_POST['us'];
$exp=$_POST['cn'];
//image ki 4 cheezein uthao jasakti hain, type,size,name,temp name
$i_name=$_FILES['img']['name'];
$i_type=$_FILES['img']['type'];
$i_size=$_FILES['img']['size'];
$i_temp_name=$_FILES['img']['tmp_name'];
$folder="DB_images/Trainers/";
if(is_uploaded_file($_FILES['img']['tmp_name'])){
$path=$folder.$i_name;
move_uploaded_file($i_temp_name,$path);   // to move image in folder
$q="UPDATE `trainers` SET `Trainer_name`='$t_name',`Experiance`='$exp',`Trainer_Image`='$path' WHERE id='$id'";
$res=mysqli_query($con,$q);
if($res){
  echo "<script>alert('updated');window.location.href='trainer_show.php'</script>";
}
else{
  echo mysqli_error($con);
}
}
else{
  $q="UPDATE `trainers` SET `Trainer_name`='$t_name',`Experiance`='$exp' WHERE id='$id'";
  $res=mysqli_query($con,$q);
  if($res){
      echo "<script>alert('updated');window.location.href='trainer_show.php'</script>";
  }
  else{
      echo mysqli_error($con);
  }
}
}

?>





<?php include('footer.php')?>   

<script>
function abc(input){
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#myimage')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200)
                   .css( "visibility", "visible" );		
            };

            reader.readAsDataURL(input.files[0]);
        }
}
    </script>