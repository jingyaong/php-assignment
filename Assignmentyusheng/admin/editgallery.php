<?php session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4>Edit Comming Soon Image</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "blog");

                        $id = $_GET['id'];
                        $query = "SELECT * FROM events WHERE id='$id' ";
                        $query_run = mysqli_query($conn, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                                ?>
                                <form action="galleryhelper.php" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>" />
                                    <div class="form-group">
                                        <label for="">Event Name</label>
                                        <input type="text" name="event_name" value="<?php echo $row['event_name']; ?>" required
                                            class="form-control" placeholder="Enter Event Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Event image</label>
                                        <input type="file" name="event_image" accept="image/*" required class="form-control">
                                        <input type="hidden" name="event_image_old" value="<?php echo $row['event_image']; ?>">
                                    </div>
                                    <img src="<?php echo "upload/" . $row['event_image']; ?>" width="100px">
                                    <div class="form-group">
                                        <button type="submit" name="update_event_image" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                                <?php
                            }
                        } else {
                            echo "No record Available";
                        }
                        ?>


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