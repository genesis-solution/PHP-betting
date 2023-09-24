<?php
require('php-includes/database.php');
include('php-includes/check-session.php');

$username = $_SESSION['username'];
date_default_timezone_set("Asia/Manila");
$date = date("y-m-d h:i:sa");
date('h:i:s a m/d/Y', strtotime($date));

$query = mysqli_query($con, "select * from users where username = '$username'");
$result = mysqli_fetch_assoc($query);
$wallet = $result['wallet'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="src/assets/img/smc-logo.png"/>
    <link href="layouts/modern-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="layouts/modern-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="layouts/modern-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="layouts/modern-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="layouts/modern-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="php-includes/custom-style.css" />
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="src/assets/css/dark/elements/alert.css">
	<link href="src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link rel="stylesheet" href="src/assets/css/dashboard.style.css">
    <style>
    div:where(.swal2-container) div:where(.swal2-popup) {
    display: none;
    position: relative;
    box-sizing: border-box;
    grid-template-columns: minmax(0, 100%);
    width: 32em;
    max-width: 100%;
    padding: 0 0 1.25em;
    border: none;
    border-radius: 5px;
    background: #080e17 !important;
    color: white !important;
    font-family: inherit;
    font-size: 1rem;
}
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
		.container {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
		body.dark .card .card-title {
    color: #e2a03f !important;
    line-height: 1.5;
			font-weight: 900 !important;
    font-size: 25px !important;
}
		body.dark p {
    margin-top: 0;
    margin-bottom: 0.625rem;
    color: #00ab55;
    font-weight: 900 !important;

}
		body.dark .input-group .input-group-text {
    border: 1px solid #1b2e4b;
    background-color: #e2a03f;
    color: #ffffff;
    height: 100%;
}
		.col-3 {
    flex: 0 0 auto;
    width: 25%;
    text-align: center;
}
		body.dark .btn-outline-secondary {
    border: 1px solid #ffffff !important;
    color: #ffffff !important;
    background-color: transparent;
    box-shadow: none;
}
    .swal2-icon {
        font-size: 10px !important;
    }

    .stream_btn {
        color: #0099e6 !important;
        outline: none !important;
        border: none !important;
    }

    .stream_btn:hover {
        background: #002233 !important;
        outline: none !important;
        border: none !important;
    }


</style>
</head>
<body class="layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
	<?php include('php-includes/navbar.php');?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
		<?php include('php-includes/sidebar.php')?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">
    
                    <!-- CONTENT AREA -->
                    <div class="row layout-top-spacing">
                        
                        <div class="col-12 col-xl-12">
                            <marquee class="marquee-announce" style="background-color:#009688;color:white;padding: 5px;border-radius: 6px;min-height: 31px;"><?php echo $date;?></marquee>
                            
                            <button type="button" class="form-control mt-3 stream_btn" id="stream_btn"> Stream </button>
                            
                            <div class="d-flex align-items-center gap-1 mt-4 mb-3">
                                <img src="src/assets/img/money-icon.png" class="money-icon mb-1 mb-sm-2" alt="money-icon" height="30" width="30">
                                <h5 class="my-0 balance" style="color:#e2a03f;" >
                                    Balance : <span id="balance"> Loading... </span>
                                </h5>
                            </div>

                            <?php include('php-includes/stream-modal.php');?>
                            <?php include('templates/betting-buttons.php')?>
                            <?php include('templates/transaction-history.php')?>
                            <?php include('templates/game-history.php')?>
                            <?php include('php-includes/betting-modal.php');?>
                            <?php include('php-includes/number-modal.php');?>
                            <?php include('php-includes/receipt-modal.php');?>

							<!-- <p class="result"></p> -->
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="src/plugins/src/waves/waves.min.js"></script>
    <script src="layouts/modern-dark-menu/app.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="php-includes/js/msgBox.js"></script>
    <script src="php-includes/js/apiRequest.js"></script>
    <script src="php-includes/js/program.js"></script>
    <script src="php-includes/js/transactionHistory.js"></script>
    <script src="php-includes/js/gameHistory.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>