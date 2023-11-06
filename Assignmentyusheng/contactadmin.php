<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />

</head>

<body>

    <div class="container my-5">
        <h2> List of Login people</h2>
        <a class="btn btn-primary" href="/Assignment/contact_us.php" role="button">New User Login</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th> message</th>
                    <th>Created at</th>
                    <th>Action</th>


                </tr>
            </thead>

            <tbody>
                <?php
                $severname = "localhost";
                $username = "root";
                $password = "";
                $database = "db_contact";

                $connection = new mysqli($severname, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed:" . $connection->connect_error);
                }

                $sql = "SELECT * FROM user_form";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invaild query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                  <tr><td>$row[id]</td>
               <td>$row[name]</td>
              <td>$row[email]</td>
              <td>$row[created_at]</td>
              <td>$row[created_at]</td>
              <td>
                  <a class='btn btn-primary btn-sm' href='/Assignment/edit.php ? id=$row[id]'>Edit</a>
                  <a class='btn btn-danger btn-sm' href='/Assignment/delete.php? id=$row[id]'>Delate</a>
              </td>
          </tr>
                            
            ";
                }
                ?>