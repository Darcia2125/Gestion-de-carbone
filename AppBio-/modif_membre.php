    <?php
     include('config/bd.php');
   
     $id_membre = $_GET['modif_membre'];

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
                <h3 style="text-align:center;" class="panel-title"><b>Mise à jours des infos du membre</b></h3>
            
              </div>
            <div class="panel-body">
      
                <!--nom-->
           <form  method="post" enctype="multipart/form-data">
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="nom" >Nom<span class="text-danger">*</span></label>
                  <input type="text" placeholder="nom..." name="nom" id="nom" class="form-control" value="<?php echo"$nom"; ?>" required="required">
                </div>
                
              </div>
                  <!--vile-->
             
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="poste" >Poste occupé<span class="text-danger">*</span></label>
                  <input type="text" placeholder="post..." name="poste" id="poste" value="<?php echo"$poste"; ?>" class="form-control" required="required">
                </div>
                
              </div>
               
             </div>
              
             
            <div class="row">
              <div class="col-sm-6">
                 <div class="form-group">
                   <label for="avatar">changer mon avatar</label>
                   <input type="file" name="avatar"  value="images/<?php echo $avatar; ?>" id="avatar" required=''>
                 </div>
               </div>
             </div>
               
             <!--vile-->
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="commune" >Adresse<span class="text-danger">*</span></label>
                  <input type="text" placeholder="commune..." name="commune" id="commune" value="<?php echo"$commune"; ?>" class="form-control" required="required">
                </div>
                
              </div>

               <!--sex-->
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="sex" >Sex<span class="text-danger">*</span></label>
                  <select name="sex" id="sex" value="<?php echo"$sex"; ?>" class="form-control" required="required">
                    <option>
                      Homme
                    </option>
                    <option>
                      Femme
                    </option>
                  </select>
                </div>
              </div>
              
               
             </div>


               
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="numero" >Numéro<span class="text-danger">*</span></label>
                  <input type="number"  name="numero" id="numero" value="<?php echo"$numero"; ?>" class="form-control" placeholder="numero...">
                </div>
                
              </div>

               
             
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="email" >Email<span class="text-danger">*</span></label>
                  <input type="email"  name="email" id="email" class="form-control" value="<?php echo"$email"; ?>" placeholder="email...">
                </div>
                
              </div>
               
               
             </div>

        
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                
                  <label class="control-label" for="matricule" >Matricule<span class="text-danger">*</span></label>
                    <input type="text"  name="matricule" id="matricule" value="<?php echo" $matricule"; ?>" class="form-control" placeholder="matricule" />
              
                </div>
                
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                
                  <label class="control-label" for="password" >Password<span class="text-danger"></span></label>
                    <input type="password"  name="password" id="password" value="<?php echo"$password"; ?>" class="form-control" placeholder="password" />
              
                </div>
                
              </div>
               
             </div>


              
             
             <input style="background-color: #004d99; border : #004d99;" type="submit" class="btn btn-primary" value="mettre à jour" name="update">
              
           </form> 

             <?php
     include('config/bd.php');
   if (isset($_POST['update'])) {
     

      $id_membre = $_GET['modif_membre'];
      $nom = $_POST['nom'];
      $poste = $_POST['poste'];
      $commune = $_POST['commune'];
      $sex = $_POST['sex'];
      $numero = $_POST['numero'];
      $email = $_POST['email'];
      $matricule = $_POST['matricule'];
      $password = $_POST['password'];
    
      $avatar= $_FILES['avatar']['name'];
      $avatar_tmp = $_FILES['avatar']['tmp_name'];

      move_uploaded_file($avatar_tmp,"images/$avatar");

     $get_update = "UPDATE users SET nom='$nom', poste='$poste', avatar='$avatar', commune='$commune', sex = '$sex', numero = '$numero', email='$email', matricule='$matricule', password='$password'  WHERE id_membre='$id_membre'";

     $run_update = mysqli_query($con, $get_update);

   if ($run_update) {

  echo "<script>alert('mise à jour avec succè!')</script>";
  echo "<script>window.open('liste.php','_self')</script>";
}else{
  echo "<script>alert('fail')</script>";
 

       }
 }
      ?>

          </div>
          
        </div>
            
          </div>
      

        </div>
      
     </div><!-- /.container -->

       
   </div>
    <?php } ?>