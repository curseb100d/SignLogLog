<!-- Include connect.php -->
<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user-style.css">
    <title>CRUD Operation Read</title>
</head>
<body>
    <form>
        <div class="container">
            <button class="button"><a href="user.php">Add User</a></button>
            
            <h1>CRUD Table</h1>
            <table>
                <tr>
                    <th>ID No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Operations</th>
                </tr>
                    <?php
                    $sql = "SELECT * FROM `crud`";
                    $result = mysqli_query($con, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];
                            $password = $row['password'];

                            echo '
                            <tr>
                                <td><b>'.$id.'</b></td>
                                <td>'.$name.'</td>
                                <td>'.$email.'</td>
                                <td>'.$mobile.'</td>
                                <td>'.$password.'</td>
                                <td>
                                    <button><a href="update.php?updateid='.$id.'">Update</a></button>
                                    <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
                                </td>
                            </tr>';
                        }
                    }
                    ?> 
            </table>
        </div>
    </form>
</body>
</html>