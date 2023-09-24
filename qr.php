<?php
require('php-includes/database.php');

$ticket_num = mysqli_escape_string($con, $_GET['ticket_num']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>PICK 3 | QR PAGE</title>
    <link href="../layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="../src/assets/css/dark/elements/alert.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
</head>
<body class="layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <!-- Navbar Goes Here -->
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <!-- Sidebar Goes Here -->
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content ms-0 mt-0">
            <div class="layout-px-spacing">

                <div class="middle-content">


    
                    <!-- CONTENT AREA -->
                    <div class="row layout-top-spacing">
                        <div class="col-xxl-6 col-xl-8 col-lg-9 col-md-9 col-sm-12 mx-auto">
							<div class="product-reviews mb-5">
								<?php
                                  $query = mysqli_query($con,"select * from bets where ticket_number = '$ticket_num'");
                                  if(mysqli_num_rows($query)>0){
                                    while($row=mysqli_fetch_assoc($query)){
										$encode_by = $row['username'];
										$combinations = $row['combinations'];
										$combi_type = $row['combi_type'];
										$combi_pick = $row['combi_pick'];
										$amount = $row['amount'];
										$raffle_code = $row['raffle_code'];
										$status = $row['status'];
										$win_status = $row['win_status'];
										$date_placed = $row['date_placed'];
                                      ?>
                                      <div class="row" style="background-color: #0f1226;border-radius: 8px;padding: 20px;margin-bottom: 20px;">
										  <div class="col-sm-6 align-self-center">
											  <div class="reviews">
												  <h5 class="mb-0"><?php echo $ticket_num;?></h5>
												  <br>
												  <h3 class="mb-0">Combinations: <?php echo $combinations;?></h3>
												  <span><?php echo "₱ ".number_format("$amount",2);?></span>
											  </div>
										  </div>
										  
										  <div class="col-sm-6">
											  <div class="row review-progress mb-sm-1 mb-3">
												  <div class="col-sm-4">
													  <p>Kiosk ID: <?php echo $encode_by?></p>
													  <p>Bet Status: <?php if($status == 'Open'){
										  echo '<span class="badge badge-primary mb-2 me-4">In Game</span>';
									  }elseif($status == 'Win'){
									  echo '<span class="badge badge-success mb-2 me-4">Win</span>';
									  }else{
									  echo '<span class="badge badge-danger mb-2 me-4">Loss</span>';
									  }?></p>
													  <?php if($status == 'Win'){
										  echo '<p>Payout: '.$win_status.'</p>';
									  }else{}?>
													  <p>Type of Bet: <?php if($combi_type == 'Straight Ball'){
									  echo "Tumbok";
									  }else{
									  echo "Rambolito";
									  }?></p>
													  <?php if($combi_pick == 'Lucky'){
										  echo '<p>Raffle Code: '.$raffle_code.'</p>';
									  }else{}?>
													  
												  </div>
											  </div>                
										  </div>
								       </div>
                                              <?php
                                              $i++;
                                            }
                                            mysqli_free_result($query);
                                            mysqli_close($con);
                                          }
                                          else{
                                            ?>
                                            <div class="row">
												<div class="col-12 align-self-center" style="text-align:center;">
													<div class="reviews">
														<h1 class="mb-0">ERROR</h1>
														<span>Ticket number not valid.</span>
													</div>
												</div>
								            </div>
                                            <?php
                                          }
                                          ?>    
                                                    
        
                                                </div>

                                            </div>
                    </div>
                    <!-- CONTENT AREA -->

                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>