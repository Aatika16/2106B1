<?php include('header.php');
include('connection.php');

//Trainers
$Q="SELEcT COUNT(*) as tr from trainers";
$run=mysqli_query($con,$Q);
$data=mysqli_fetch_assoc($run);


//Pacakes
$Q1="SELEcT COUNT(*) as pk from packages";
$run1=mysqli_query($con,$Q1);
$data1=mysqli_fetch_assoc($run1);

//Equipments
$Q2="SELEcT COUNT(*) as count_eqpmt from Equipments";
$run2=mysqli_query($con,$Q2);
$data2=mysqli_fetch_assoc($run2);

?>   
 <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
          
          
            <!--custom chart end-->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>TRAINERS</h5>
                  </div>
                  <canvas id="serverstatus01" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 70,
                        color: "#FF6B6B"
                      },
                      {
                        value: 30,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Usage<br/>Increase:</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h2><?php echo  $data['tr']?></h2>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>PACAKGES</h5>
                  </div>
                  <canvas id="serverstatus02" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#1c9ca7"
                      },
                      {
                        value: 40,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <p>April 17, 2014</p>
                  <footer>
                    <div class="pull-left">
                      <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                    </div>
                    <div class="pull-right">
                      <h5><?php echo $data1['pk'] ?></h5>
                    </div>
                  </footer>
                </div>
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>EQUIPEMTS</h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                  </div>
                  <p class="mt"><b><?php ECHO $data2['count_eqpmt']?></b><br/>Month Income</p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
        
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
        
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>


    <?php include('footer.php')?>   