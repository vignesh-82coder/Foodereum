<?php session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="SHORTCUT ICON" href="images/fe.png" type="image/x-icon" /> 
    <link rel="ICON" href="images/fe.png" type="image/ico" />

    <title>Foodereum</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap');

    a, h4 {
       style="font-family: 'Quicksand', sans-serif";
      }
    </style>

  </head>
 
  <body class="violetgradient">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="#">
  <img src="images/fe.png" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>
  <a class="navbar-brand" href="#">Foodereum </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" id="aboutbtn" style="font-family: 'Quicksand', sans-serif;">About</a>
      </li>
    </ul>
  </div>
</nav>

  <?php
  if( !isset($_SESSION['role']) ){
  ?>
  <center>
      <div class="customalert">
          <div class="alertcontent"><i><b>Foodereum</b></i>
              <div id="alertText"> &nbsp </div>
              <img id="qrious">
              <div id="bottomText" style="margin-top: 10px; margin-bottom: 15px;"> &nbsp </div>
              <button id="closebutton" class="formbtn"> OK </button>
          </div>
      </div>
  </center>
    <div style="width: 100%">
      <center>
      <div class="loginformcard" id="card1">
            <h4> Welcome to Foodereum - DAPP</h4>
            
                <div class="cardbtnarea">
                    <button class="col-md-6 rolebtn" id="login">Login</button><br>
                    <a href="https://forms.gle/KmRhrTPG7n3bAqZK9" class="col-md-12" id="signup" style="text-decoration: underline;">Registeration Form for Govt Officials</a>
                </div>
      </div>
      <div class="loginformcard" id="maincard2">
      <h4> Login to your existing account</h4>
            <form style="margin-top: 30px; margin-bottom: 30px;" action="login.php" method="POST" onsubmit="return checkFirstForm(this);">

            <label type="text" class="formlabel"> Email </label>
            <input type="text" class="forminput" name="email" id="email" onkeypress="isNotChar(event)" required>

            <label type="text" class="formlabel" style="margin-top: 10px;"> Password </label>
            <input type="password" class="forminput" name="pw" id="pw" onkeypress="isNotChar(event)" required>

            <button class="formbtn" name="loginsubmit" type="submit">Login</button>

            <br>
            <a href="https://forms.gle/KmRhrTPG7n3bAqZK9" id="gotosignup"> Don't have an account? Register with us</a>
            </form>
                
      </div>
      </center>
    </div>
  
  <?php
    }else{
      include 'redirection.php';
      redirect('trackproduct.php');
    }
    ?>
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Material Design Bootstrap-->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
  
    function isInputNumber(evt){
      var ch = String.fromCharCode(evt.which);
      if(!(/[0-9]/.test(ch))){
          evt.preventDefault();
      }
    }
    function isNotChar(evt){
      var ch = String.fromCharCode(evt.which);
      if(ch=="'"){
        evt.preventDefault();
      }
    }

    function blockSpaces(evt){
      var ch = String.fromCharCode(evt.which);
      if(ch=="'" || ch==" "){
        evt.preventDefault();
      }
    }

    function blockSpecialChar(e){
      var k;
      document.all ? k = e.keyCode : k = e.which;
      return ((k >= 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 46|| k == 42|| k == 33 || k == 32 || (k >= 48 && k <= 57));
    }

    $("#login").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard3").hide("fast","linear");
      $("#maincard2").show("fast","linear");
    });

    $("#gotologin").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard3").hide("fast","linear");
      $("#maincard2").show("fast","linear");
    });

    $("#openlogin").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard3").hide("fast","linear");
      $("#maincard2").show("fast","linear");
    });

    $("#signup").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard2").hide("fast","linear");
      $("#maincard3").show("fast","linear");
    });

    $("#gotosignup").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard2").hide("fast","linear");
      $("#maincard3").show("fast","linear");
    });

    $("#opensignup").on("click", function(){
      $("#card1").hide("fast","linear");
      $("#maincard2").hide("fast","linear");
      $("#maincard3").show("fast","linear");
    });

    $("#closebutton").on("click", function(){
        $(".customalert").hide("fast","linear");
    });

    function checkSecondForm(theform){
      var email = theform.email.value;
      var pw = theform.pw.value;
      var cpw = theform.cpw.value;

      if (!validateEmail(email)) {
        showAlert("Invalid Email address");
        return false;
      }

      if (pw!=cpw) {
        showAlert("Please check your password");
        return false;
      } 
      return true;
    }

    function checkFirstForm(theform){
      var email = theform.email.value;

      if (!validateEmail(email)) {
        showAlert("Invalid Email address");
        return false;
      }
      return true;
    }

    function showAlert(message){
      $("#alertText").html(message);
      $("#qrious").hide();
      $("#bottomText").hide();
      $(".customalert").show("fast","linear");
    }

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $("#aboutbtn").on("click", function(){
        showAlert("In traditional food supply system practiced by government institutions in India, there is a lack of accountability and traceability. The food products are often shipped at multiple locations before they reach the institutions. We're here to change all this! Foodereum is an Ethereum-based food supply chain solution that allows you to authenticate your food products and track at each region using QR codes. With just a few taps, you'll be able to see the complete history of the food products and from where it's been since it was originally procured. All transactions are recorded and permanently accessible for everyone's view.");
    });
    </script>
  </body>
</html>
