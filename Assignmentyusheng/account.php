<?php
include 'config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}

$empty = $notImage = $existErr = $sizeErr = $typeErr = $error = $uploaded = $errorUploading = "";

if (!empty($_FILES["profilePic"]["tmp_name"])) {
    if (isset($_POST["submit"])) {
        $target_dir = "uploads/";
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
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
                $filename = $_FILES["profilePic"]["name"];
                $sql = "UPDATE user_form SET profile_pic = '$filename' WHERE id = '" . $_SESSION['id'] . "'";
                mysqli_query($conn, $sql);
                $uploaded = "*The file " . htmlspecialchars(basename($_FILES["profilePic"]["name"])) . " has been uploaded.\n";
            } else {
                $errorUploading = "*Sorry, there was an error uploading your file.\n";
            }
        }
    }
} else {
    $empty = "*File is required before uploading.\n";
}

$emptyname = $emptyemail = $validname = $validemail = '';
$valid = 0;

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    if (!empty($name)) {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $validname = '*Only alphabets and whitespace are allowed.';
        } else if (strlen($name) < 8) {
            $validname = '*Your name needs to have at least 8 characters.';
        } else if (strlen($name) > 30) {
            $validname = '*Maximum 30 characters only!';
        } else {
            $validname = '*Valid name.';
            $valid++;
        }
    } else {
        $emptyname = '*Required.';
    }
    $email = $_POST['email'];
    if (!empty($email)) {
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        if (!preg_match($pattern, $email)) {
            $validemail = '*Email is not valid.';
        } else {
            $validemail = '*Valid email.';
            $valid++;
        }
    } else {
        $emptyemail = '*Required.';
    }

    if ($valid == 2) {
        $sql = "UPDATE user_form SET username = '$name' WHERE id = '" . $_SESSION['id'] . "'";
        mysqli_query($conn, $sql);
        $sql = "UPDATE user_form SET email = '$email' WHERE id = '" . $_SESSION['id'] . "'";
        mysqli_query($conn, $sql);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
    <link rel="stylesheet" type="text/css" href="account.css">
    <link rel="stylesheet" type="text/css" href="sidebar.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <section class="home">
        <div class="text">Your Account</div>
        <div class="account-page">
            <div class="profile">
                <div class="profile-detail">
                    <?php
                    $sql = "SELECT username, email, profile_pic FROM user_form WHERE id = '" . $_SESSION['id'] . "'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <img src="uploads/<?php echo $row['profile_pic']; ?>">
                    <h2>
                        <?php echo $row['username']; ?>
                        <h2>
                            <p>
                                <?php echo $row['email']; ?>
                            </p>
                </div>
                <ul>
                    <li><a href="account.php" class="active">Account <span>></span></a></li>
                    <li><a href="change_password.php">Change Password <span>></span></a></li>
                    <li><a href="events_joined.php">Events Joined <span>></span></a></li>
                </ul>
            </div>
            <div class="account-detail">
                <h2>Account</h2>
                <div class="user-detail">
                    <h4>Account Details</h4>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="profile-pic" method="post"
                        enctype="multipart/form-data">
                        <h3>Update Your Profile Picture:</h3>
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
                        <input type="submit" name="submit" value="Upload Profile Pic">
                    </form>
                    <form class="account-form" method="post">
                        <h3>Update Your Profile:</h3>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="8 to 30 characters only"
                                value="<?php echo (isset($name)) ? $name : ''; ?>">
                            <span class="error">
                                <?php echo $emptyname, $validname; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="abc123@gmail.com"
                                value="<?php echo (isset($email)) ? $email : ''; ?>">
                            <span class="error">
                                <?php echo $emptyemail, $validemail; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <input type="text" name="usertype" value="User" readonly>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" value="Update">
                        </div>
                    </form>
                </div>
            </div>
    </section>
</body>

</html>