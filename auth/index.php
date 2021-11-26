<?php 
    require_once 'authController.php'; 
    if(!isset($_SESSION['id'])){
        header('location: login.php');
        exit();
    }

    // verify the user using token
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        verifyUser($token);
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
            <img class="" style=" max-width: 20%; margin-left:auto; margin-right:auto; margin-top:-220px" src="../image/logo.png"><br>
            <div class="container" id="loginErrorDiv"></div>
            <div class="row justify-content-around">
                <div class="card col-6">
                    <div class="card-body">
                    
                        <?php if(isset($_SESSION['message'])): ?>
                            <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                                <?php 
                                    echo $_SESSION['message']; 
                                    unset($_SESSION['message']);
                                    unset($_SESSION['alert-class']);
                                ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="card-title text-center">Welcome, <?php echo $_SESSION['email']; ?></h2><br>

                        <?php if(!$_SESSION['verified']): ?>
                            <div class='alert alert-warning'>
                                You need to verified your account.
                                Sign in to your email account and click on the 
                                verification link we emailed you at
                                <strong><?php echo $_SESSION['email']; ?></strong>
                            </div><br>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
