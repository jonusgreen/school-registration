
<?php
session_start();

$connection = mysqli_connect("localhost","root","","youtube");


if(isset($_POST['faculty_save']))
{
    $name = $_POST['name'];
    $design = $_POST['designation'];
    $description = $_POST['description'];
    $images = $_FILES["faculty_image"]['name'];
    
    if (file_exists("upload/" . $_FILES["faculty_image"]["name"])) 
    {
        $store = $_FILES["faculty_image"]["name"];
        $_SESSION['status'] = "image already exists. '.$store.'";
                header('Location: faculity.php');

       }
   
else
{

     $query = "INSERT INTO faculty (`name`,`design`,descript,`images`) VALUES ('$name','$design','$description','$images')";

     $query_run = mysqli_query($connection, $query); 
      if($query_run)
      {
        move_uploaded_file($_FILES['image']['tmp_name'], $target))
               $_SESSION['success'] = "faculty Added";
                header('Location: faculity.php');
      }
      else
      {
$_SESSION['status'] = "faculty not Added";
header('Location: faculity.php');
      }
       }
}
 
      
       
      

if(isset($_POST['faculty_update_btn']))
 {
    $id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_designation = $_POST['edit_designation'];
    $edit_description = $_POST['edit_description'];
    $edit_faculty_image = $_FILE["edit_faculty_image"]['name'];
   
$query = "UPDATE faculty SET name='$edit_name', design='$edit_designation', descript='$edit_description', images='$edit_faculty_image' WHERE id='$id' ";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
  move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/".$_FILES["faculty_image"]["name"]);
$_SESSION['success'] = "your data is updated";
header("Location: faculity.php");
}
else
{
$_SESSION['status'] = "your data is not updated";
header("Location: faculity.php");
}
}





// deleting datata
if(isset($_POST['delet_btn']))
{
$id = $_POST['delet_id'];
$query = "DELETE  FROM faculty WHERE id='$id' ";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
$_SESSION['success'] = "your data is deleted";
header('location: faculity.php');
}
else
{
$_SESSION['status'] = "your data is not deleted";
header('location: faculity.php');
}

}

?>
 