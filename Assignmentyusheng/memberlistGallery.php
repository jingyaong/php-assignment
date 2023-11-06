<?php session_start() ?>
<!doctype html>
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
    <?php include 'sidebar1.php'; ?>
    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white">Coming Soon Event image</h4>
                        </div>
                        <div class="card-body">

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
                                                    <img src="<?php echo "admin/upload/" . $row['event_image']; ?>"
                                                        width="500px" alt="image">
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
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/esm/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.esm.min.js"></script>
</body>

</html>