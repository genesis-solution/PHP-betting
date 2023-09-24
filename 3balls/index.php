<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/smc-logo.png"/>
    <link href="layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="layouts/vertical-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="src/assets/css/light/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    
    <link href="layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <link href="src/assets/css/dark/authentication/auth-boxed.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3" style="text-align: center;">
                                    <img src="src/assets/img/pick3-logo.png" style="height:136px;">                  
                                </div>
								<marquee width="100%" direction="left" height="auto" style="color:#009688;font-weight:700;">WELCOME TO EZY TRES</marquee>
								<form class="row g-3" action="php-includes/login.php" method="post">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Enter your username" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                                    </div>
                                </div>
                                
                                
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary w-100" >SIGN IN</button>
                                    </div>
                                </div>
                                </form>
                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="mb-0">Dont't have an account ? <a href="#" class="text-warning">Sign Up</a></p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
    $(document).ready(function(){
    
    $("#btn-eye-show").css('display','none');
    //Clear TextBox ===============================================================================
    var timesRun = 0;
    var interval = setInterval(function () {
        $('#txt-username').val("");
        $('#txt-password').val("");

        timesRun += 1;
        if(timesRun === 1){
            clearInterval(interval);
        }
        //console.log(timesRun);
    }, 1000);  

    $(window).click(function() {
        var username = $('#txt-username').val();
        var password = $('#txt-password').val();

        $('#txt-username').val(username);
        $('#txt-password').val(password);
    });
    //Clear TextBox End ============================================================================

    //Tab Functions ================================================================================
    $('body').on('keydown', '#txt-username', function(e) {
        if (e.which == 9) {
            e.preventDefault();
            // do your code
            var username = $('#txt-username').val();
            $('#txt-username').val(username);
            $('#txt-password').focus();
        }
    });

    $('body').on('keydown', '#txt-password', function(e) {
        if (e.which == 9) {
            e.preventDefault();
            // do your code
            var username = $('#txt-password').val();
            $('#txt-password').val(username);
            $('#btn-signIn').focus();
        }
    });
    //Tab Functions End =============================================================================
    
    function userSession() {
        return JSON.parse(localStorage.getItem("user"));
    }
    
    // Check User Session =================================================================
        setInterval(() => {
            isLogin();
        }, 1000);    
         
        function isLogin(){

            if(userSession()) {
                $.ajax({
                  url:"system/api/sabong/sb-check-user-session.php",
                  method: "GET",
                  data: {
                      username: userSession().username,
                      session: 'checkUserSession'
                  },
                  success: function(data) {
                      const res = JSON.parse(data);
                      
                      if(res.data.user_session_id === userSession().user_session_id && res.data.username === userSession().username){
                            sessionStorage.setItem("user", JSON.stringify(res.data));
                            window.location.replace("/system/main/arena/dashboard.php");
                      } 
                      
                  }
                }); 
            } 
            
            
        }
    // Check User Session =============================================================
    
    //Alerts ========================================================================================
    var alertTrigger = document.getElementById('btn-signIn');
      
      if (alertTrigger) {
        alertTrigger.addEventListener('click', function () {

          if($('#txt-username').val() == "" || $('#txt-password').val() == "") {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: "<h5 style='color:white'> Please input your username and password! </h5>",
                    showConfirmButton: false,
                    background: '#333333',
                    width: '300px',
                    timer: 1500,
                });

          } else {

                var username = $("#txt-username").val();
                var password = $("#txt-password").val();
                
                $.ajax({
                url:"system/api/sabong/getuser.php",
                method: "GET",
                data: {username: username,
                       password: password,
                       user: 'userlogin'
                    },
                success: function(data) {
                    var res = JSON.parse(data);
                    
                    if(res){
                        sessionStorage.setItem("user", JSON.stringify(res));
                        localStorage.setItem("user", JSON.stringify(res));
                    }
                
                if(res.msg == "Deactivated"){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: "<h5 style='color:white'> Account Deactivated! </h5>",
                        showConfirmButton: false,
                        background: '#333333',
                        width: '300px',
                        timer: 1500,
                    });
                    return;
                } else if (res.msg == "Canceled"){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: "<h5 style='color:white'> Account Canceled! </h5>",
                        showConfirmButton: false,
                        background: '#333333',
                        width: '300px',
                        timer: 1500,
                    });
                    return;
                } else if (res.msg == "Agent"){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: "<h5 style='color:white'> This is agent account, please login to Agent Dashboard! </h5>",
                        showConfirmButton: false,
                        background: '#333333',
                        width: '300px',
                        timer: 1500,
                    }).then(function() {
                        window.location.replace("https://agent.sabongmastercup.com");
                    });
                    return;
                }
                        
                if(Object.keys(res).length > 1){

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: "<h5 style='color:white'> Welcome " + res.username + "</h5>",
                            showConfirmButton: false,
                            background: '#333333',
                            width: '300px',
                            timer: 1500,
                            }).then(function() {
                                window.location.replace("system/main/arena/dashboard.php");
                        });

                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: "<h5 style='color:white'> Wrong username or password! </h5>",
                        showConfirmButton: false,
                        background: '#333333',
                        width: '300px',
                        timer: 1500,
                    });
                }

                
            }
            }); //ajax end
                
                

          }

        })
      }
    //Alerts End =====================================================================================
});  
</script>
</body>
</html>