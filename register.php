<?php 
session_start();

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="m-1 font-weight-bold text-primary" id="exampleModalLabel">Add student's Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="connect.php" method="POST" enctype="multipart/form-data">

         <div class="modal-body"> 

        <div class="form-group">
          <label>Sponsor id</label>
          <input type="text" name="username" class="form-control" placeholder="">
        </div>

        <div class="form-group">
          <label>Studentname</label>
          <input type="text" name="password" class="form-control" placeholder="">
        </div>
       <div class="form-group">
          <label>Date Enrolled</label>
          <input type="date" name="rolled" class="form-control" placeholder="fill the space"></div>
       <div class="form-group">
          <label>Age</label>
          <input type="text" name="age" class="form-control" placeholder="">
       </div>
<div class="form-group">
          <label>class</label>
          <input type="text" name="class" class="form-control" placeholder="">
       </div>
<div class="form-group">
          <label>Birth Date</label>
          <input type="date" name="Birth" class="form-control" placeholder="">
       </div>
<div class="form-group">
          <label>Father's Name</label>
          <input type="text" name="fname" class="form-control" placeholder="">
       </div>

<div class="form-group">
          <label>mother's Name</label>
          <input type="text" name="mname" class="form-control" placeholder="">
       </div>
<div class="form-group">
          <label>Gender</label>
         <input type="radio" name="gender" value="m" required> Male
     <input type="radio" name="gender" value="f" required> Female
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div> 

<div class="container-fluid"> 

<!datatales example-->

<div class="card shadow mb-4">
 <div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Student's Profile
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add Student Profile 
</button>
</h6>
</div> 

<div class="card-body">

<?php

 if (isset($_SESSION['success']) && $_SESSION['success'] !='') 
 {
  echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].'</h2>';
  unset($_SESSION['success']);
 }

 if (isset($_SESSION['status']) && $_SESSION['status'] !='')
{
  echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].'</h2>';
  unset($_SESSION['status']);
}

?>
  <div class="table-responsive">
<?php
$connection = mysqli_connect("localhost","root","","youtube");

$query = "SELECT * FROM accounts";
$query_run = mysqli_query($connection, $query);


?>

    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Id</th>
          <th>Sponsor_Id</th>
           <th>Student</th>
           <th>Date_Enrolled</th>
           <th>Age</th>
            <th>Class</th>
            <th>DoBirth</th>
            <th>Father</th>
            <th>Mother</th>
            <th>Gender</th>
            <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
       while ($row = mysqli_fetch_assoc($query_run)) {
       
       ?>

        <tr>
          <td><?php echo $row['id'];?></td>
        <td><?php echo $row['sponsor_id'];?></td>
        <td><?php echo $row['student_name'];?></td>
        <td><?php echo $row['date_enrolled'];?></td>
        <td><?php echo $row['age'];?></td>
        <td><?php echo $row['class'];?></td>
        <td><?php echo $row['DoBirth'];?></td>
        <td><?php echo $row['father_name'];?></td>
        <td><?php echo $row['mother_name'];?></td>
        <td><?php echo $row['gender'];?></td>
   
          <!-- editing button -->
         <!--  <td>
          <form action="register.edit.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
          </form>
        </td> -->
        <!-- deleting button -->
         <td>
          <form action="connect.php" method="POST">
            <input type="hidden" name="delete_id" value="<?php echo $row['id'];?> ">
          <button  onclick="return  confirm('Are you sure you want to delete permanently???')" href="register.php" type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
           </form>
        </td>
        </tr>
        <?php
       }
     }
       else{
        echo "no recond found";
        }
        ?>
      </tbody>
    </table>
     <div class="text-center">
        <a href="print.php" class="btn btn-primary" id="print-btn">Print</a>
      </div>  
  </div>
  
</div>
</div>
</div>
 






<?php
include('includes/scripts.php'); 

?>