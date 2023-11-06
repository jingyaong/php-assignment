<?php
include '../config.php';

session_start();

$empty = $isempty = $notImage = $existErr = $sizeErr = $typeErr = $error = $uploaded = $errorUploading = "";
$validname = $validD = $validDate = $filename = "";

if (!empty($_FILES["profilePic"]["tmp_name"]) && !empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['description'])) {
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $startdate = strtotime($_POST['startdate']);
        $enddate = strtotime($_POST['enddate']);

        $valid = 0;

        if (!preg_match("/^[a-zA-Z0-9\s]*$/", $name)) {
            $validname = '*Only alphabets and numbers are allowed.';
        } else {
            $valid++;
        }
        if (strlen($description) > 500) {
            $validD = '*Maximum 500 characters!';
        } else {
            $valid++;
        }
        if ($startdate) {
            $new_startdate = date('Y-m-d', $startdate);
            $valid++;
        } else {
            $validDate = '*Invalid Date!';
        }
        if ($enddate) {
            $new_enddate = date('Y-m-d', $enddate);
            $valid++;
        } else {
            $validDate = '*Invalid Date!';
        }
        if ($new_startdate > $new_enddate) {
            $validDate = '*Starting date is later than ending date!';
        } else {
            $valid++;
        }

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
        if ($check == false) {
            $notImage = "*File is not an image.\n";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $existErr = "*Sorry, file already exists.\n";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["profilePic"]["size"] > 500000) {
            $sizeErr = "*Sorry, your file is too large.\n";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $typeErr = "*Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "*Sorry, your file was not uploaded.\n";
            // if everything is ok, try to upload file
        } else {
            if ($valid == 5) {
                if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
                    $filename = $_FILES["profilePic"]["name"];
                    $sql = "INSERT INTO event_list (event_name, event_type, description, starting_date, ending_date, event_pic) VALUES ('$name', '$type', '$description', '$new_startdate', '$new_enddate', '$filename')";
                    mysqli_query($conn, $sql);
                    $uploaded = "*The file " . htmlspecialchars(basename($_FILES["profilePic"]["name"])) . " has been uploaded.\n";
                } else {
                    $errorUploading = "*Sorry, there was an error uploading your file.\n";
                }
            }
        }
    }
} else {
    $empty = "*File is required before uploading.\n";
    $isempty = "*Required!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" type="text/css" href="add_event.css">
</head>

<body>
    <?php include 'adminheader.php'; ?>

    <div class="container">
        <div class="left">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="add-event-form" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label>Event Name:</label>
                    <input type="text" name="name">
                    <span class="error">
                        <?php echo $isempty, $validname; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Event Type:</label>
                    <select name="type" id="type">
                        <option value="competition">Competition</option>
                        <option value="class">Class</option>
                        <option value="event">Event</option>
                    </select>
                    <span class="error">
                        <?php echo $isempty; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Event Description:</label>
                    <textarea name="description" rows="4"
                        value="<?php echo (isset($description)) ? $description : ''; ?>"></textarea>
                    <span class="error">
                        <?php echo $isempty, $validD; ?>
                    </span>
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <label>Starting Date:</label>
                        <input type="date" name="startdate">
                        <span class="error">
                            <?php echo $isempty, $validDate; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Ending Date:</label>
                        <input type="date" name="enddate">
                        <span class="error">
                            <?php echo $isempty, $validDate; ?>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <h3>Upload Event Picture Here:</h3>
                    <input type="file" name="profilePic" required>
                    <span class="error">
                        <?php
                        echo "<pre>";
                        echo $empty,
                            $notImage,
                            $existErr,
                            $sizeErr,
                            $typeErr,
                            $error,
                            $uploaded,
                            $errorUploading;
                        echo "</pre>";
                        ?>
                    </span>
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
        <div class="right">
            <h4>Event Picture Uploaded:</h4>
            <?php
            $sql = "SELECT event_pic FROM event_list WHERE event_pic = '$filename'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            ?>
            <img src="upload/<?php echo $row['event_pic']; ?>">
        </div>
    </div>
</body>

</html>