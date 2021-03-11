<br>
<h4 align="center">Cette suppression est irreversible <i style="color: red;" class="fa fa-exclamation-triangle" aria-hidden="true"></i>, voulez-vous continuer?</h4> 

<form accept="" method="post">

 <div class="col-sm-6">
    <div class="form-group">
<input type="submit" class="btn btn-danger" class="form-control" name="oui" value="Oui,supprimer">
    </div>

</div>

 <div class="col-sm-6">
    <div class="form-group">
<input type="submit" class="btn btn-default" class="form-control" name="Non" value="Non! merci!">
    </div>
   </div>

</form>
<?php   
include('config/bd.php');
$delete_id = $_GET['supp_membre'];
if (isset($_POST['oui'])) {
	
$delete_m = "delete from users where id_membre='$delete_id' ";

$run_delete = mysqli_query($con, $delete_m);

    echo "<script>alert('compte supprimer!!')</script>";

	echo "<script>window.open('liste.php?','_self')</script>";


}if (isset($_POST['Non'])) {


echo "<script>alert('opération de suppression de votre compte annulée!!')</script>";
    echo "<script>window.open('liste.php','_self')</script>";





}

?>

