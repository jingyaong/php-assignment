<?php

$connection = mysqli_connect("localhost", "root", "");

$database = mysqli_select_db($connection, "user_db");

$id = $_GET['id'];
$sql = "select * from user_form where id = '$id'";

$run = mysqli_query($connection, $sql);


while ($row = mysqli_fetch_array($run)) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];

}

?>

<?php
$connection = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db($connection, "user_db");


if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "update user_form set name= '$name',email= '$email',password='$password' where id =  '$id'";

    if (mysqli_query($connection, $sql)) {

        echo '<script> location.replace("admin_login.php")</script>';
    } else {
        echo "Some thing Error" . $connection->error;

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1> Admin Edit </h1>
                    </div>
                    <div class="card-body">

                        <form action="edit.php" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                    value="<?php echo $name; ?>">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email"
                                    value="<?php echo $email ?>">
                            </div>

                            <div class="form-group">
                                <label>password</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter password"
                                    value="<?php echo $password ?>">
                            </div>
                            <br />
                            <input type="submit" class="btn btn-primary" name="submit" value="edit">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>