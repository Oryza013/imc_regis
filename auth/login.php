<?php
    require_once 'authController.php'; 

    if(isset($_SESSION['id'])){
        header('location: dashboard.php');
        exit();
    }
?>

<html>
    <head>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/scroll_ani.css">
      <script src="js/bootstrap.bundle.js"></script>
      <link rel="stylesheet" href="css/features.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique:wght@300;400&display=swap" rel="stylesheet">
      <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icons.min.css" integrity="sha512-UwbBNAFoECXUPeDhlKR3zzWU3j8ddKIQQsDOsKhXQGdiB5i3IHEXr9kXx82+gaHigbNKbTDp3VY/G6gZqva6ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <div class="container-fluid bg-imc-animate d-flex justify-content-center flex-column h-100">
            <img class="" style=" max-width: 20%; margin-left:auto; margin-right:auto" src="../image/logo.png"><br>
            <div class="container" id="loginErrorDiv"></div>
            <div class="row justify-content-around">
                <div class="card col-6">
                    <div class="card-body">
                        <h2 class="card-title text-center"><strong>Sign in</strong></h2>

                        <?php if(count($errors)>0): ?><>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach ?>
                            </div>
                        <?php endif; ?>

                        <form id="loginForm" method="POST" action="login.php">
                            <div class="row">
                            <div class="col-12">
                                <label for="loginEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="loginEmail" value="<?php echo $user_email; ?>" name="user_email">
                            </div>
                            <div class="col-12">
                                <label for="loginPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="loginPassword" name="user_password">
                            </div>
                            </div><br>
                            <div class="d-flex justify-content-center">
                            <button class="btn btn-warning btn-lg" type="submit" value="submit" id="loginBtn" name="login_btn">Login</button>
                            </div>
                            <br>
                        </form>
                        <p>Don't have an account yet? <a href="sign up.php">Sign up Here</a></p>
                    </div>
                </div>
            </div>
        </div>
<!--อันนี้ลองเรียก JAVASCRIPT เล่น ๆ ไม่ต้องใส่ใจ -->
<script>
    /*function userLogin(){
        var loginEmail = $("#loginEmail").val();
        var loginPassword = $("#loginPassword").val();
        console.log(loginEmail+" Password: "+loginPassword)
    }
    function alert(type,message){
        const loginErrorDiv = document.getElementById("loginErrorDiv")
        loginErrorDiv.innerHTML = "<div class='alert alert-"+type+" alert-dismissible' role='alert'>"+message
    }
    $("#loginForm").submit(function(){
        event.preventDefault();
        var loginEmailLength = $("#loginEmail").val().length;
        var loginPasswordLength = $("#loginPassword").val().length;
        if(0===loginPasswordLength && 0===loginEmailLength){
            alert("danger","Email and Password must be provided")
        }else if(0===loginPasswordLength){
            alert("danger","Password must be provided")
        }else if(0===loginEmailLength){
            alert("danger","Email must be provided")
        }else{
            userLogin();
        }
    })
</script>
    </body>
</html>
