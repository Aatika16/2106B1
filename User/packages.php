
<?php include('header.php');

include('../Admin/connection.php');

@$cat=$_GET['cat_id'];
@$tr=$_GET['tr_id'];
if(isset($cat)){
  $q="select packages.*,categories.cat_name,trainers.Trainer_name from packages JOIN categories ON packages.Category_id_FK=categories.id JOIN trainers on trainers.id=packages.Trainer_id_FK where categories.id='$cat'";

}
else if(isset($tr)){
  $q="select packages.*,categories.cat_name,trainers.Trainer_name from packages JOIN categories ON packages.Category_id_FK=categories.id JOIN trainers on trainers.id=packages.Trainer_id_FK where trainers.id='$tr'";

}
else{
  $q="select packages.*,categories.cat_name,trainers.Trainer_name from packages JOIN categories ON packages.Category_id_FK=categories.id JOIN trainers on trainers.id=packages.Trainer_id_FK";

}
$run=mysqli_query($con,$q);



?>
<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="index.html">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Our Courses</li>
        </ul>
        <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="section">
  <div class="container">
    <!-- course list -->
<div class="row justify-content-center">
  <!-- course item -->
<?php while($data=mysqli_fetch_assoc($run)) { ?>
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
     
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"></i>Trainer: <a href="trainer-single.php?id=<?php echo $data['Trainer_id_FK']?>"><?php echo $data['Trainer_name']?></a></li>
          <li class="list-inline-item"><a class="text-color" href="course-single.html"> Category: <?php echo $data['cat_name']?></a></li>
          <li class="list-inline-item"><a class="text-color" href="course-single.html">Price: <?php echo $data['price']?></a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title"><?php echo $data['package_name']?></h4>
        </a>
      
        <a href="trainer-single.php?id=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm">Details</a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- course item -->
  
</div>

<!-- /course list -->
  </div>
</section>
<!-- /courses -->

<!-- footer -->
<footer>
  <!-- newsletter -->
  <div class="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-md-9 ml-auto bg-primary py-5 newsletter-block">
          <h3 class="text-white">Subscribe Now</h3>
          <form action="#">
            <div class="input-wrapper">
              <input type="email" class="form-control border-0" id="newsletter" name="newsletter" placeholder="Enter Your Email...">
              <button type="submit" value="send" class="btn btn-primary">Join</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php') ?>