<?php
include 'config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}

$sql = "SELECT event_name FROM event_list";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $event = $_POST['event'];

    $sql = "INSERT INTO students(name,email,phone,gender,eventName,id) VALUES ('$name','$email','$phone','$gender','$event', '".$_SESSION['id']."')";

    if (mysqli_query($conn, $sql)) {
        echo '<script> location.replace("index.php")</script>';
    } else {
        echo "Some thing Error" . $conn->error;
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
                        <h1> Event Register form </h1>
                    </div>
                    <div class="card-body">

                        <form action="register_event.php" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            </div>

                            <div class="form-group">
                                <label>email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="phone" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>
                            <br />

                            <div class="form-group">
                                <select name="gender" class="form-control">
                                    <option value="Women">Woman</option>
                                    <option value="Man">Man</option>
                                </select>
                            </div>
                            <br />
                            <div class="form-group">
                                <select name="event" class="form-control">
                                    <?php
                                    foreach ($result as $row) {
                                    echo "<option value=\"".$row['event_name']."\">".$row['event_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Register">
                            <input type="button" class="btn btn-primary" value="Go back!" onclick="history.back()">
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>