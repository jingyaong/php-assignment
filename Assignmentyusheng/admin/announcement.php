<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Society</title>

    <link rel="stylesheet" type="text/css" href="adminheader.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />

    <style type="text/css">
        * {
            text-decoration: none;
        }

        .navbar {
            background: crimson;
            font-family: calibri;
            padding-right: 15px;
            padding-left: 15px;
        }

        .navdiv {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo a {
            font-size: 35px;
            font-weight: 600;
            color: white;
        }

        li {
            list-style: none;
            display: inline-block;
        }

        li a {
            color: white;
            font-size: 18px;
            font-weight: bold;
            margin-right: 25px;
        }

        button {
            background-color: black;
            margin-left: 10px;
            border-radius: 10px;
            padding: 10px;
            width: 90px;
        }

        button a {
            color: white;
            font-weight: bold;
            font-size: 15px;
        }
    </style>


</head>





<!DOCTYPE html>
<html>

<?php include "adminheader.php"; ?>

<body style="background-color:powderblue;">
    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "blog");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];



        $message = $_POST['message'];

        $sql = "insert into announcements(name,message)values(' $name','$message')";

        if (mysqli_query($connection, $sql)) {
            echo '<script> location.replace("announcement.php")</script>';
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
        <title>Announcement</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h1>Announcement</h1>
                        </div>
                        <div class="card-body">

                            <form action="announcement.php" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Announcement</label>
                                    <textarea id="message" name="message" rows="12" cols="150" class="form-control"
                                        placeholder="Enter text here" required></textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" name="submit" value="submit"
                                    onclick="return confirm('Are you sure you want to submit this form?')">
                            </form>

                        </div>
                    </div>

                </div>

            </div>


        </div>

    </body>

    </html>