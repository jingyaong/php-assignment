<?php session_start() ?>

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

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Image</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Image</title>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white">Coming Soon Event image</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['status']) && $_SESSION != '') {
                                ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Hey!</strong>
                                    <?php echo $_SESSION['status']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <?php

                                unset($_SESSION['status']);
                            }
                            ?>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "blog");
                            $query = "SELECT * FROM events";
                            $query_run = mysqli_query($conn, $query);

                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Event name</th>
                                        <th>image</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($query_run) > 0) //record is there or not
                                    {
                                        foreach ($query_run as $row) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['event_name'] ?>
                                                </td>
                                                <td>
                                                    <img src="<?php echo "upload/" . $row['event_image']; ?>" width="100px"
                                                        alt="image">
                                                </td>
                                                <td>
                                                    <a href="editgallery.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-info">EDIT</a>
                                                </td>
                                                <td>
                                                    <form action="galleryhelper.php" method="POST">
                                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                        <input type="hidden" name="del_event_image"
                                                            value="<?php echo $row['event_image']; ?>">
                                                        <button type="submit" name="delete_event_image"
                                                            class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td>No record Available</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/esm/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.esm.min.js"></script>
    </body>

    </html>