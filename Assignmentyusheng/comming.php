<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP CRUD using jquery ajax without page reload</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1600198010167-9b91732a7b43?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjZ8fGJsb29keSUyMGNvbnRyb2xsZXJ8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
    </style>
</head>

<body>



    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Comming Soon Event


                        </h4>
                    </div>
                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Admin</th>
                                    <th>Admin Email</th>


                                    <th>Comming Soon Event</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'dbcons.php';

                                $query = "SELECT * FROM event";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $student['id'] ?>
                                            </td>
                                            <td>
                                                <?= $student['name'] ?>
                                            </td>
                                            <td>
                                                <?= $student['email'] ?>
                                            </td>

                                            <td>
                                                <?= $student['course'] ?>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>