
<?php
include('security.php');
session_start();
$connection = mysqli_connect("localhost","root","","youtube");
if(isset($_POST['registerbtn']))
{


$username = $_POST['username'];
$password = $_POST['password'];
$rolled = $_POST['rolled']; 
$age = $_POST['age'];
$class = $_POST['class'];
$Birth = $_POST['Birth'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$gender = $_POST['gender'];



 $query = "INSERT INTO accounts (sponsor_id,student_name,date_enrolled,age,class,DoBirth,father_name,mother_name,gender,) values('$username','$password','$rolled','$age','$class','$Birth','$fname','$mname','$gender',)";
   
 $query_run = mysqli_query($connection, $query);
     if ($query_run)
     {
      move_uploaded_file($_FILES['image']['tmp_name'], $target);
       $_SESSION['success'] ="students profile addded";
    header('location: register.php');
      
     }
     
        else{

           $_SESSION['status'] ="students profile not addded";
    header('location: register.php');

        }
     }




if(isset($_POST['updatebtn']))
 {
    $id = $_POST['edit_id'];
    $edit_username = $_POST['edit_username'];
    $edit_password = $_POST['edit_password'];
    $edit_rolled = $_POST['edit_rolled'];
    $edit_age = $_POST['edit_age'];
    $edit_class = $_POST['edit_class'];
    $edit_Birth = $_POST['edit_Birth'];
    $edit_fname = $_POST['edit_fname'];
    $edit_mname = $_POST['edit_mname'];
  $edit_gender = $_POST['edit_gender'];

$query = "UPDATE accounts SET sponsor_id='$edit_username', student_name='$edit_password', date_enrolled='$edit_rolled', age='$edit_age', class='$edit_class', DoBirth='$edit_Birth', father_name='$edit_fname', mother_name='$edit_mname', gender='$edit_gender' WHERE id='$id' ";

$query_run = mysqli_query($connection, $query);

if($query_run)
{

$_SESSION['success'] = "your data is updated";
 header('location: register.php');
}
else
{
$_SESSION['status'] = "your data is not updated";
 header('location: register.php');
}
}


// deleting datata
if(isset($_POST['delete_btn']))
{
$id = $_POST['delete_id'];
$query = "DELETE  FROM accounts WHERE id='$id' ";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
$_SESSION['success'] = "your data is deleted";
header('location: register.php');
}
else
{
$_SESSION['status'] = "your data is not deleted";
header('location: register.php');
}

}


// longin connection


if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
     $password_login = $_POST['password'];

     $query = "SELECT * FROM accounts WHERE email='$email_login' AND password='$password_login' ";
     $query_run = mysqli_query($connection, $query);

     if (mysqli_fetch_array($query_run)) 
     {
     $_SESSION['username'] = $email_login;
     header('location:login.php');
     }
     else
     {
          $_SESSION['status'] = 'email id / password is incorrect' ;
     header('location:login.php');
     }

}


?>
