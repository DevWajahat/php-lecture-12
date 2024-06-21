<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Establish database connection before executing the query
    $con = mysqli_connect("localhost", "root", "", "db_curd");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Escape user inputs for security
    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);
    $age = mysqli_real_escape_string($con, $age);

    // Attempt insert query execution
    $sql = "INSERT INTO tbl_emp (name, email, age) VALUES ('$name', '$email', '$age')";

    if (mysqli_query($con, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    // Close connection
    //mysqli_close($con);
}
?>
<div class="body">
    <form class="modal-content" action="" method="post">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="age"><b>Age</b></label>
            <input type="number" placeholder="Enter Age" name="age" required>

            <div class="clearfix">
                <button type="submit" name="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
    </div>
<br><br>
<div class="body">
<table>

    <tr>
        <th style="text-align:center;">ID.</th>
        <th style="text-align:center;">Name</th>
        <th style="text-align:center;">age</th>
        <th style="text-align:center;">email</th>
        <th style="text-align:center;" colspan=2>Operaions</th>
    </tr>
    <?php
    $query= "SELECT * FROM tbl_emp";
    $data = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($data)){
        ?>
    <tr>
        <td style="text-align:center;" ><?php echo $row [0] ?></td>
        <td style="text-align:center;"  ><?php echo $row [1] ?></td>
        <td style="text-align:center;"  ><?php echo $row [2] ?></td>
        <td style="text-align:center;"  ><?php echo $row [3] ?></td>
        <td style="text-align:center;"  ><a href="Update.php?id=<?php echo $row [0]; ?>">Update</a></td>
        <td style="text-align:center;"   ><a href="delete.php?id=<?php echo $row [0]; ?>">Delete</a></td>
    </tr>
        <?php
    }
    ?>
</table>
</div>
</body>
</html>