<?php include('header.php');
include('connection.php');
$id=$_GET['x'];
$q="SELECT users.*,role.role_name FROM `users` JOIN ROLE ON users.role_id_FK=role.id where users.id='$id'";
$run=mysqli_query($con,$q);
$data=mysqli_fetch_assoc($run);

?>


<section id="main-content">
      <section class="wrapper">
      
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
       


<h1>Username:  <?php echo $data['user_name'] ?></h1>
<h2>Contact :<?php echo $data['contact'] ?></h2>
<h2>Role :<?php echo $data['role_name'] ?></h2>
<h3>Are you sure you want to delete</h3>
<form method="POST" action="">
<Button name="btn" type="submit" class="btn btn-danger"> YES </button> 
</form>

<a href="User_show.php" class="btn btn-theme"> Cancel </a> 

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
if(isset($_POST['btn'])){
include('connection.php');
$q="delete from users where id='$id'";
$r=mysqli_query($con,$q);
if($r){
    echo "<script>alert('Deleted!');window.location.href='User_show.php'</script>";
}else{
    echo "<script>alert('Not Deleted!');window.location.href='User_show.php'</script>";
}
}



?>

<?php include('footer.php') ?>