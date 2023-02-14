
<?php include('header.php');
include('connection.php');
$qu="SELECT * from trainers";
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
                <h4><i class="fa fa-angle-right"></i> All Trainers</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Id</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Trainer Name</th>
                    <th><i class="fa fa-bullhorn"></i> Exp</th>
                    <th><i class="fa fa-bullhorn"></i> Image </th>
              
            
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_assoc($res)) { ?>
                  <tr>
                    <td>
                      <a href="basic_table.html#"><?php echo $data['id'] ?></a>
                    </td>
                    <td class="hidden-phone"><?php echo $data['Trainer_name'] ?></td>
                 
                    <td>
                      <a href="basic_table.html#"><?php echo $data['Experiance'] ?></a>
                    </td>
                    <td>
                      <a href="basic_table.html#"><img src="<?php echo $data['Trainer_Image'] ?>" height=100/></a>
                    </td>
                    <?php if(isset($_SESSION['ADMIN'])) {?>
                    <td>
                      <a class="btn btn-primary btn-xs" href="trainer_update.php?x=<?php echo $data['id'] ?>"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger btn-xs" href="trainer_delete.php?x=<?php echo $data['id'] ?>" ><i class="fa fa-trash-o "></i></a>
                    </td>
                    <?php } ?>
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