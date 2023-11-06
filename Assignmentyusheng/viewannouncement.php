<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}
?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image</title>
    <link rel="stylesheet" type="text/css" href="sidebar1.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Image</title>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white">Coming Soon Event image</h4>
                        </div>
                        <div class="card-body">

                            <body>

                                <div class="container my-5">
                                    <h2>Announcement</h2>

                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Message</th>

                                                <th>Created at</th>



                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $severname = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $database = "blog";

                                            $connection = new mysqli($severname, $username, $password, $database);

                                            if ($connection->connect_error) {
                                                die("Connection failed:" . $connection->connect_error);
                                            }

                                            $sql = "SELECT * FROM announcements";
                                            $result = $connection->query($sql);

                                            if (!$result) {
                                                die("Invaild query: " . $connection->error);
                                            }

                                            while ($row = $result->fetch_assoc()) {
                                                echo "
                  <tr><td>$row[id]</td>
               <td>$row[name]</td>
              <td>$row[message]</td>
              
              <td>$row[created_at]</td>
              
          </tr>
                            
           ";
                                            }
                                            ?>





                                        </tbody>
                                    </table>
                                </div>
                            </body>

</html>