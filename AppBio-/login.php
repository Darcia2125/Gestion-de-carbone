<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="La nouvelle technologie de télécommunication et de réseau">
    
    

    <title id="WEBSIT_NAME">
    <?php 
      require('constants/constants.php');
    echo isset($title)
         ? $title . '_' . WEBSIT_NAME
         : WEBSIT_NAME;
    ?>

  </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/customer.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/database/libs/font-awesome-4.7.0/css/font-awesome.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <link rel="stylesheet" type="text/css" href="libs/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="libs/alertifyjs/css/themes/bootstrap.min.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <link href="favicon.ico" rel="icon" type="image/jpg" style="border-radius: 0.5em;" />
  </head>

  <body style="background-image:url(2.png);
              background-repeat: no-repeat;
              background-attachment: fixed;" class="login">
    
  <?php include'includes/functions.php'; ?>

  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#!"><i class="fa fa-database" aria-hidden="true"></i>STOCKAGE  > Connecter</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
           <li><a href=""><b><?php date_default_timezone_set('UTC'); echo date('<em>l F Y h:i:s A<em>');?></b></a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div  class="container">

  <image src="images/logo1.jpg">
  <p style="text-align: center; color: #004d99 !important;">BIENVENUE A NOTRE SYSTEME DE GESTION de CO2 <br>VEUILLEZ VOUS IDENTIFIEZ POUR CONTINUER
  <br><br><br><a id="register" style="text-align: center; color: #004d99 !important;" href="#!"><i class="fa fa-users" aria-hidden="true"></i> Connecter ou Inscrire ??</a></p>
   <?php include('includes/_alert.php');?>
  <br><br>
  <hr>
<div class="col-sm-4 col-sm-offset-4">
              
                <div  class="panel panel-default">
                <div  class="panel-heading ">
                 <h1 style="text-align: center;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Se connecter </h1>
               </div>
                <hr>
                <div class="panel-body">
           

               <form data-parsley-validate  method="post" action="" class="well">
                   <div class="input-group margin-bottom-sm">
               
                     <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                     <input type="email"  placeholder="email" class="form-control" name="email"  required="" />   
                  </div><br><br>
                  <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input type="password"   class="form-control" name="password" placeholder="******" required=""/>
               
                 </div><br><br>
 
                 <div class="form-group">
                    <input style="background-color: #004d99; border : #004d99" type="submit" name="envoi" class="btn btn-primary" value="Login"/>
                 </div>

               </form>
             
           </div>
         </div>
          </div>

        </div>



     

          <div class="bcg" class="container">
           
            <div class="col-sm-4 col-sm-offset-4">
                <marquee direction:"down"> 
               <p style="color:#004d99; text-align: center;"  >Essayons de faire notre mieux pour protéger notre environnement</p></marquee>
            </div>
         
        </div>  
    <script src="libs/parsley.min.js"></script>
      </body>
      </html>

          <?php

include('config/bd.php');
        



  include('includes/functions.php');
 if (isset($_POST['envoi'])) {
  

  $email =       $_POST['email'];

  $password =    $_POST['password'];
     
     $sel_user="SELECT * FROM admin WHERE email='$email' AND password ='$password' ";
     
     $run_user = mysqli_query($con, $sel_user);

     $check_user = mysqli_num_rows($run_user);

     if ($_SESSION['email'] = $email){

     echo "<script>alert('success!')</script>";

     echo "<script>window.open('index.php?Logged_in= Conneté avec succè en tant que Administrateur de ce site!!','_self')</script>";

     }else{
        //if ($check_user==0){
     
           echo "<script>alert('Email ou mot de passe incorrecte , réessayez svp!!')</script>";
        }
      }   
       
?>
