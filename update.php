<?php
include 'connect.php';

// Get data from database by ID;
$id = $_GET['updateid'];
$sql = "SELECT * FROM `crud` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE `crud` SET id = $id, name = '$name', email = '$email', mobile = '$mobile', password = '$password' WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if($result){
        // echo "Data updated successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user-style.css">
    <title>CRUD Operation Read</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <h1>CRUD Operation</h1>
            <p>Please fill out this form to update.</P>

            <label><b>Name</b></label>
            <input type="text" name="name" required value=<?php echo $name;?>>

            <label><b>Email</b></label>
            <input type="email" name="email" required value=<?php echo $email;?>>

            <label><b>Mobile</b></label>
            <input type="text" name="mobile" required value=<?php echo $mobile;?>>

            <label><b>Password</b></label>
            <input type="password" name="password" required value=<?php echo $password;?>>

            <button type="submit" name="submit">Update</button>
    </form>  
</body>
</html>