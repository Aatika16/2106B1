<?php include('header.php');
?>   


<section id="main-content">
      <section class="wrapper">
      
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Add a new Trainer</h4>
              <form class="form-horizontal style-form" method="POST" action="" enctype="multipart/form-data">
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Trainer Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tr_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Experieance</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="exp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="img" accept="image/*" onChange="abc(this)">
                    <img src="" id="myimage"/>
                  </div>
                </div>
              

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
$t=$_POST['tr_name'];
$e=$_POST['exp'];
//image ki 4 cheezein uthao jasakti hain, type,size,name,temp name
$i_name=$_FILES['img']['name'];
$i_type=$_FILES['img']['type'];
$i_size=$_FILES['img']['size'];
$i_temp_name=$_FILES['img']['tmp_name'];
$folder="DB_images/Trainers/";
$path=$folder.$i_name;
move_uploaded_file($i_temp_name,$path);   // to move image in folder
if($i_type=='image/png' || $i_type=='image/jpg' || $i_type=='image/jpeg' ){
    $q="INSERT INTO `trainers`(`Trainer_name`, `Experiance`, `Trainer_Image`) VALUES ('$t','$e','$path')";
$result=mysqli_query($con,$q);
if($result){
    echo "<script>alert('Inserted');window.location.href='trainer_show.php'</script>";
}
else{
   echo mysqli_error($con);
}
}
elsE{
    echo "<script>alert('Incorrect file type')</script>";
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