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


<body style="background-color:powderblue;">

    <div class="container my-5">
        <h2> List of Login people</h2>
        <a class="btn btn-primary" href="/Assignment/register_form.php" role="button">New User Login</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th> phone</th>

                    <th>gender</th>
                    <th>event</th>
                    <th>Action</th>


                </tr>
            </thead>

            <tbody>
                <?php
                $severname = "localhost";
                $username = "root";
                $password = "";
                $database = "event";

                $connection = new mysqli($severname, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed:" . $connection->connect_error);
                }

                $sql = "SELECT * FROM eventedit";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invaild query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                <tr>
                <td>$row[id]</td>
               <td>$row[name]</td>
              <td>$row[email]</td>
              <td>$row[phone]</td>
               
               <td>$row[gender]</td>
               <td>$row[event]</td>
            
              <td>
  <a class='btn btn-primary btn-sm' href='/Assignment_Latest/Assignment_Latest/admin/edit.php?id=$row[id]'>Edit</a>
  <a class='btn btn-danger btn-sm' href='/Assignment_Latest/Assignment_Latest/admin/deletess.php?id=$row[id]' onclick='return confirmDelete()'>Delete</a>
</td>

    





            ";
                }
                ?>





            </tbody>
        </table>
    </div>
</body>

</html>