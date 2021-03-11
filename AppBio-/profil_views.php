    <?php
     include('config/bd.php');
   
     $id_membre = $_GET['profil_views'];

     $get_pro = "SELECT * from users where id_membre='$id_membre'";

     $run_pro = mysqli_query($con, $get_pro);


     $i = 0;
     while ($row_pro = mysqli_fetch_array($run_pro)) {

      $id_membre = $row_pro['id_membre'];
      $nom = $row_pro['nom'];
      $poste = $row_pro['poste'];
      $avatar = $row_pro['avatar'];
      $commune = $row_pro['commune'];
      $sex = $row_pro['sex'];
      $numero = $row_pro['numero'];
      $email = $row_pro['email'];
       $matricule = $row_pro['matricule'];
      $password = $row_pro['password'];
      $date = $row_pro['date'];
      

      $i ++;
 
      ?>
    
     <div id="main-content">

      <div class="container">
        <div class="row">
       
          <div class="col-sm-7 col-sm-offset-2">
              <div class="panel panel-default">
               <div class="panel-heading">
                <h3 style="text-align:center;" class="panel-title"><b>Profil de <?php echo "$nom"; ?></b></h3>
            
           </div>
          <div class="panel-body">
            
            	
            	<img class='imghov' style="border-radius: 100%;" src="images/<?php echo "$avatar"; ?>"  width='140' height='150'>

            	<hr>
            	
    
              <div class="row">
               <div class="col-sm-6">
                 <div class="form-group">
                   <b>Nom:</b>     <?php echo "$nom"; ?></br></br>
                   <hr>
                   <b>Poste:</b>   <?php echo "$poste"; ?></br></br>
                   <hr>
                   <b>Adresse:</b> <a href="https://www.google.com/maps?q=<?php echo "$commune"; ?>" target="_blank"><?php echo "$commune"; ?></a></br></br>
                   <hr>
                   <b>Sex: </b>    <?php echo "$sex"; ?></br></br>
                   <hr>

                   <a class="btn btn-info" href="modif.php?modif_membre=<?php echo $id_membre ; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editer</a>

                  
               </div>
             </div>
             <!--vile-->
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                 <b>Numéro:</b>    <a href="tel:<?php echo "$numero"; ?>"><?php echo "$numero"; ?></a></br></br>
                 <hr>
                 <b>Email:  </b>   <a href="mailto:<?php echo "$email"; ?>"><?php echo "$email"; ?></a></br></br>
                 <hr>
                 <b>Matricule:</b>    <?php echo "$matricule"; ?></br></br>
                 <hr>
                 <b>Password: </b>    <?php echo "$password"; ?></br></br>
                 <hr>
                 <a class="btn btn-danger" href="supprim.php?supp_membre=<?php echo $id_membre ; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>

                </div>
                
              </div>

              </div>
            </div>
          </div>
            
          </div>
      

        </div>
      
     </div><!-- /.container -->

       
   </div>
    <?php } ?>

      