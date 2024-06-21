<?php
include 'connect.php';
$id = $_GET['id'];
$qeury = mysqli_query($con,"");
if($qeury>0){
    header("location:index.php");
}

?>