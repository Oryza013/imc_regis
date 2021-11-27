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
      <script> 
        $(function(){
          $("#footerContent").load("footer.html");
          $("#navContent").load("head.html");
        });
      </script>
    </head>
    <div id="navContent"></div>
    
	<body>
        <div class="container-fluid bg-imc-animate">
            <div class="row animate-text">
              <div class="col-3 d-flex justify-content-end" style="min-height:200px;"><img src="../image/logo-white.png" style="height:130; width: auto;" class="align-self-center"></div>
              <div class="col-6 d-flex justify-content-center align-self-center"><h1 class="display-4">Team Dashboard</h1></div>
              <div class="col-3 justify-content-end"></div>
                    <br>
            </div>
		    </div>
		
		<br>
      <div class="container text-center">
           <?php if(isset($_SESSION['message'])): ?>
              <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                  <?php 
                      echo $_SESSION['message']; 
                      unset($_SESSION['message']);
                      unset($_SESSION['alert-class']);
                  ?>
              </div>
          <?php endif; ?>
                <div class='alert alert-warning d-none' id="verifiedAlert">
                    You need to verified your account.
                    Sign in to your email account and click on the 
                    verification link we emailed you at
                    <strong><?php echo $_SESSION['email']; ?></strong>
                </div>
          <h2 id="teamName">Team name is not set yet!</h2>
          <small id="schoolName" class="text-muted">We don't know where you are from!</small>
      </div> <br>
    <div class="container">
      <div class="row">
        <div class="col col-md-4">
          <div class="card">
            <div class="card-header">Step 1: Verify your Email</div>
            <div class="card-body">
                <div id="verified" class="text-danger"></div>
          </div>
          </div>
        </div>
        <div class="col col-md-4">
          <div class="card">
            <div class="card-header">Step 2: Fill and submit application form</div>
            <div class="card-body" > 
              <div class="text-danger text-center" id = "applicationStatus"><i class='bx bx-error'></i> Application form is not submitted</div>
            </div>
          </div>
        </div>
        <div class="col col-md-4">
          <div class="card ">
              <div class="card-header">Step 3: Application fee payment</div>
              <div class="card-body"> 
              <div id="paymentStat" class="text-danger text-center"><i class='bx bx-error'></i> Application form is not submitted</div>
          </div>
        </div>
      <br>
    </div>
  </div>

      <div class="container">
          <div class="table-responsive">
          <table class="table" id="statData">
                <thead>
              <tr>
                    <th scope="col">#</th>
                    <th scope="col">Details</th>
                    <th scope="col">Status</th>
                  </tr>
            </thead>
            <tbody>
              <tr>
                    <th scope="row"></th>
                    <td><strong>Application Status</strong></td>
                    <td></td>
                  </tr>
              <tr>
                    <th scope="row">1</th>
                    <td>School and team information <span class="text-danger">(Required)</span></td>
                    <td id="teamInfoStat">Not submitted</td>
                  </tr>
              <tr>
                    <th scope="row">2</th>
                    <td>Institution Information <span class="text-danger">(Required)</span></td>
                    <td id="institutionInfoStat">Not submitted</td>
                  </tr>
              <tr>
                    <th scope="row">3</th>
                    <td>Competitor 1 Student Card <span class="text-danger">(Required)</span></td>
                    <td id="cp1PicsStat">Not submitted</td>
                  </tr>
              <tr>
                    <th scope="row">4</th>
                    <td>Competitor 2 Student Card <span class="text-danger">(Required)</span></td>
                    <td id="cp2PicsStat">Not submitted</td>
                  </tr>
              <tr>
                    <th scope="row">5</th>
                    <td>Competitor 3 Student Card <span class="text-danger">(Required)</span></td>
                    <td id="cp3PicsStat">Not submitted</td>
                  </tr>
              <tr>
                    <th scope="row">6</th>
                    <td>Letter of approval <span class="text-danger">(Required)</span></td>
                    <td id="letApprStat">Not submitted</td>
                  </tr>
              <tr>
                    <th scope="row">7</th>
                    <td>Vouncher from 6th CMU-IMC</td>
                    <td id="voucherStat">Not submitted</td>
                  </tr>
              <tr>
                    <th scope="row"></th>
                    <td>*Your application form will be reviewed and approved within 72 hours after submission, If all required information is '<span class="text-success">Approved</span>', your registration is completed. If status returned <span class="text-danger">Rejected</span>', the edit button will appear and you can re-submit your application form.<br>
                    *Once approved, We'll send you an Email concerning registration fee payment.
                    <td></td>
                  </tr>
              <tr>
                    <th scope="row"></th>
                    <td><strong>Payment peroid (Nov1 - Dec24, 2021)</strong></td>
                    <td></td>
                  </tr>
            </tbody>
          </table>
          </div>
      </div>
      <div class="d-flex justify-content-center"><a href="team_setup.html" class="btn btn-warning" id="btnFill"><i class='bx bx-pencil' ></i> Fill Application Form</a></div>
</body>
	<div id="footerContent"></div>
  <script>
        $.ajax({
            url: "php/dashboardController.php",
            success: function (response) {
              console.log(response)
                var res = JSON.parse(response)
                console.log(res)
                const colorClass = {}
                for (let i in res){
                  if (res[i] == 'Submitted'){
                    colorClass[i] = "text-warning"
                  }
                  else if (res[i] == 'Approved'){
                    colorClass[i] = "text-success"
                  }
                  else if (res[i] == "Rejected"){
                    colorClass[i] = "text-danger"
                  }
                  else if (res[i] == "Saved"){
                    colorClass[i] = "text-primary"
                  }else{
                    colorClass[i] = "text-light"
                  }
                }
               /* if (res['paymentStat'] == 'Submitted' ){
                  colorClass['paymentStat'] = 'alert alert-warning'
                }
                else if (res['paymentStat'] == 'Approved' ){
                  colorClass['paymentStat'] = 'alert alert-success'
                }
                else if (res['paymentStat'] == 'Rejected' ){
                  colorClass['paymentStat'] = 'alert alert-danger'
                }*/

                if(res['teamInfoStat'] !== ""){
                document.getElementById("teamInfoStat").innerHTML = res['teamInfoStat']
                document.getElementById("teamInfoStat").setAttribute("class",colorClass['teamInfoStat'])
                }
                if(res['teamInfoStat'] == "Saved"){
                  document.getElementById("btnFill").innerHTML = "<i class='bx bx-pencil' ></i> Edit Application Form</a>";
                  document.getElementById("btnFill").setAttribute("href","team_edit.html")
                }
                if(res['institutionInfoStat'] !== ""){
                document.getElementById("institutionInfoStat").innerHTML = res['institutionInfoStat']
                document.getElementById("institutionInfoStat").setAttribute("class",colorClass['institutionInfoStat'])
                }
                if(res['cp1PicsStat'] !== ""){
                document.getElementById("cp1PicsStat").innerHTML = res['cp1PicsStat']
                document.getElementById("cp1PicsStat").setAttribute("class",colorClass['cp1PicsStat'])
                }
                if(res['cp2PicsStat'] !== ""){
                document.getElementById("cp2PicsStat").innerHTML = res['cp2PicsStat']
                document.getElementById("cp2PicsStat").setAttribute("class",colorClass['cp2PicsStat'])
                }
                if(res['cp3PicsStat'] !== ""){
                document.getElementById("cp3PicsStat").innerHTML = res['cp3PicsStat']
                document.getElementById("cp3PicsStat").setAttribute("class",colorClass['cp3PicsStat'])
                }
                if(res['letApprStat'] !== ""){
                document.getElementById("letApprStat").innerHTML = res['letApprStat']
                document.getElementById("letApprStat").setAttribute("class",colorClass['letApprStat'])
                }
                if(res['voucherStat'] !== ""){
                document.getElementById("voucherStat").innerHTML = res['voucherStat']
                document.getElementById("voucherStat").setAttribute("class",colorClass['voucherStat'])
                }
                if(res['paymentStat'] == 0){
                document.getElementById("paymentStat").innerHTML = "<i class='bx bx-x'></i> Application form is not submitted"
                document.getElementById("paymentStat").setAttribute("class","text-primary text-center")
                }else{
                document.getElementById("paymentStat").innerHTML = "<i class='bx bx-time-five'></i> "+ res['paymentStat']
                document.getElementById("paymentStat").setAttribute("class","text-info text-center")
                }
                if(res['teamName'] !== ""){
                document.getElementById("teamName").innerHTML = res['teamName']
                }
                if((res['uniName'] !== "") && (res['schoolName'] !== "")){
                document.getElementById("schoolName").innerHTML = res['uniName'] + ": " + res['schoolName']
                }   
                if(res['submitConfirm'] == "1"){
                document.getElementById("applicationStatus").innerHTML = "<i class='bx bx-check'></i> Application Form submitted"
                document.getElementById("applicationStatus").setAttribute("class","text-success text-center")
                document.getElementById("btnFill").setAttribute("class","d-none")
                }
                if(res['verified'] !== ""){
                  if(res['verified'] == 1){
                    document.getElementById("verified").setAttribute("class","text-success text-center")
                    document.getElementById("verified").innerHTML = "<i class='bx bx-check'></i> E-Mail Verified"
                  }else{
                    document.getElementById("verified").setAttribute("class","text-danger text-center")
                    document.getElementById("verified").innerHTML = "<i class='bx bx-x'></i> E-Mail Not Verified"
                    document.getElementById("verifiedAlert").setAttribute("class","alert alert-warning")
                  }
                }
            }
          })
    </script>
</html>


