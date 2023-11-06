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
    <?php include "adminheader.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Coming Soon Event Image</h4>
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

                        <form action="galleryhelper.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Event Name</label>
                                <input type="text" name="event_name" required class="form-control"
                                    placeholder="Enter Event Name">
                            </div>
                            <div class="form-group">
                                <label for="">Event image</label>
                                <input type="file" name="event_image" accept="image/*" required class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save_event_image"
                                    class="btn btn-primary">Submit-save</button>
                            </div>
                        </form>
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