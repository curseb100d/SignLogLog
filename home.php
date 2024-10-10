<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:signin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <h1>Hello World!
    <?php echo $_SESSION['username']; ?>
    </h1>

    <div class="container">
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>