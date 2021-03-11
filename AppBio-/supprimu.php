<?php 
session_start();
if (!isset($_SESSION['email'])) {
   echo "<script>window.open('login.php','_self')</script>";
}else{

 ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="La technologie en global">
    <meta name="author" content="Moumouni Komoye Harouna">

    

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
    
  <?php require'includes/functions.php';
  require('includes/_alert.php');
  require('includes/_flash.php');
 require('config/db.php');

   ?>

   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#!"><i class="fa fa-database" aria-hidden="true"></i>STORAGE SYSTEM  > supprimer</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li style="padding-top: 10px;">
             <form action="search.php" method="GET" enctype="multipart/form-data">
                   <input style="border: solid 1px #001a33; border-radius: 3em;" type="search" name="supprimer" placeholder="search">

                   <button style="background-color: #001a33; color: white; width: 30px; height: 30px; border: solid 0.5px #001a33; border-radius: 100%;" type="submit" name="search" value="search"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form> 
            </li>
            <li><a href=""><b>V1.0</b></a></li>
            <li><a href=""><b><?php date_default_timezone_set('UTC'); echo date('<em>l F Y h:i:s A<em>');?></b></a>
              <li><a href="logout.php"><b><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</b></a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div  class="container">
<image src="images/logo1.jpg"> 
  <a style="color:red" href="InfoAlerte"> Cliquer ici poour voir l'alerte</a><audio src="images/audio.mp3" controls></audio>   
  
  <p style="text-align: center; color: #004d99 !important;">trouver un capteur et le supprimer <i class="fa fa-trash" aria-hidden="true"></i></p>
  <hr>
  <?php include'dashboard.php'; ?>
<div class="col-sm-11 col-sm-offset-0">
              
                <div  style="border: solid 1px #004d99;"  class="panel panel-default">
                <div  style="border: solid 1px #004d99;"  class="panel-heading ">
                 <h4 style="text-align: center;"><a style="float: left; color: white; font-size: 15px;" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a> Retirer un membre <i class="fa fa-trash" aria-hidden="true"></i></h4><br></h1>
               </div>
                <hr>
        <div id="main-content">

         <div class="container">
          <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <?php
         if (isset($_GET['supp_membre'])) {
          include('supp_cap.php');
         }?>
           </div>
        </div>
            
      </div>
      

    </div>
      
   </div><!-- /.container -->

       
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
    
      </body>
      </html>


<script src="libs/parsley.min.js"></script>
</body>
</html>

<?php } ?>
     

