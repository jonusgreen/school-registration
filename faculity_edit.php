<?php 
session_start();


include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid"> 
<div class="card shadow mb-4">
 <div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">EDIT SPONSOR
</h6>
</div> 

<div class="card-body">
<?php
$connect = mysqli_connect("localhost","root","","youtube");

if(isset($_POST['edit_data_btn']))
 {

   $id = $_POST['edit_id'];

$query = "SELECT * FROM faculty WHERE id='$id' ";
$query_run = mysqli_query($connect, $query);

foreach($query_run as $row) 
{
  

?>



<form action="code.php" method="_POST" enctype="multipart/form-data">
	 <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">

<div class="form-group">
          <label>name</label>
          <input type="text" name="edit_name" value="<?php echo $row['name']?>" class="form-control" placeholder="">
        </div>

        <div class="form-group">
          <label>Designation</label>
          <input type="text" name="edit_designation" value="<?php echo $row['design']?>" class="form-control" placeholder="">
        </div>
       <div class="form-group">
          <label>Description</label>
          <input type="text" name="edit_description" value="<?php echo $row['descript']?>" class="form-control" placeholder="fill the space">
        </div>
       <div class="form-group">
          <label>Image upload</label>
          <input type="file" name="edit_faculty_image" id="faculty_image" value="<?php echo $row['images']?>" class="form-control" placeholder="" 
        </div>

       <a  href="faculity.php" class="btn btn-danger">CANCEL</a>
       <button type="submit" name="faculty_update_btn" class="btn btn-primary">upate</button>
       </form>

<?php 
}

}
?>


</div>
</div>
 

<!--/container-fluid-->


<?php
include('includes/scripts.php'); 
include('includes/footer.php'); 

?>
