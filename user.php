<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `crud` (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($con, $sql);

    if($result){
        // echo "Data inserted successfully";
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
    <title>CRUD Operation Create</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <h1>Crud Operation</h1>
            <p>Please fill out this form to create.</P>

            <label><b>Name</b></label>
            <input type="text" name="name" required>

            <label><b>Email</b></label>
            <input type="email" name="email" required>

            <label><b>Mobile</b></label>
            <input type="text" name="mobile" required>

            <label><b>Password</b></label>
            <input type="password" name="password" required>

            <button type="submit" name="submit">Submit</button>
    </form>  
</body>
</html>