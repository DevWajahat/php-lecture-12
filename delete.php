<?php
include 'connect.php';
$id= $_GET['id'];
$query = "SELECT * FROM `tbl_emp`where id = $id";
$result = mysqli_query($con, $query);
$data= mysqli_fetch_array($result);

$name = $data[1];
$email = $data[2];
$age = $data[3];


?>
<form action="" method="post">
Name:<input type="text" name="name" value=<?php echo $name ?> ><br>
Email:<input type="text" name="email" value=<?php echo $email ?>><br>
Age:<input type="number" name="age" value=<?php echo $age ?>><br>
<input type="submit" name="update" id="" value='update data'>

</form>

<?php

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age =$_POST['age'];
    $update= mysqli_query($con,"UPDATE `tbl_employee` SET `name`='$name',`email`='$email',`age`='$age' WHERE e_id=$id");
    if($update>0)
    {
    header("location:index.php");
    
    }
    
    }

?>