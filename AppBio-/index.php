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
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
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
        <image src="images/logo1.jpg">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <audio src="images/audio.mp3" controls></audio>
          <a class="navbar-brand" href="InfoAlerte.php"><i class="fa fa-database" aria-hidden="true"></i>Informations sur les alertes</a>
          
          
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
                        <li style="padding-top: 10px;">
             <form action="search.php" method="GET" enctype="multipart/form-data">
                   <input style="border: solid 1px #001a33; border-radius: 3em;" type="search" name="supprimer" placeholder="search">

                   <button style="background-color: #001a33; color: white; width: 30px; height: 30px; border: solid 0.5px #001a33; border-radius: 100%;" type="submit" name="search" value="search"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form> 
            </li>
            <li><a href=""><b><?php date_default_timezone_set('UTC'); echo date('<em>l F Y h:i:s A<em>');?></b></a>
              <li><a href="logout.php"><b><i class="fa fa-sign-out" aria-hidden="true"></i>Déconnecter</b></a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

          <div  class="container">
            
          
            <p style="text-align: center; color: #004d99 !important;">BIENVENUE DANS L'ESPACE DE GESTIONS DE REDUCTION DE CO2</p>
              
             
             <hr>
            
            
             <div class="col-sm-12 col-sm-offset-0">
              
              <div  style="border: solid 1px #004d99;"  class="panel panel-default">
                <div  style="border: solid 1px #004d99 ;"  class="panel-heading ">
                 <h4 style="text-align: center;"><i style="color: #001a33" class="fa fa-tachometer fa-2x" aria-hidden="true"></i>
        DASHBOARD</h4>
               </div>
                <hr>
                <div class="panel-body">
                  <div class="jumbotron">
        <div  class="container">
         
          <div class="col-sm-10 col-sm-offset-1">

            <div  class="container1">
          
                <a href="ajoute.php"><h1>
                <i class="fa fa-plus-circle" aria-hidden="true"></i></h1><br>
               <span>Ajouter un utilisateur</span>
              </a>
              <a href="ajoutecap.php"><h1>
                <i class="fa fa-plus-circle" aria-hidden="true"></i></h1><br>
               <span>Ajouter un capteur</span>
              </a>
              <a href="listecap.php"><h1>
               <i class="fa fa-list-alt" aria-hidden="true"></i></h1><br>
               <span>Listes des capteurs</span>
             </a>
             <a href="liste.php"><h1>
               <i class="fa fa-list-alt" aria-hidden="true"></i></h1><br>
               <span >Liste des utilisateurs</span>
             </a>
             <a href="listeville.php"><h1>
               <i class="fa fa-list-alt" aria-hidden="true"></i></h1><br>
               <span>Liste des villes</span>
              </div>
             </a>   
             

             

                </div>
                 
              </div>
             </div>
           </div>
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
     

