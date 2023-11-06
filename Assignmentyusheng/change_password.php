<?php
include 'config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}

$passwordempty = $confirmempty = $weak = $passwordnotsame = '';
$valid = 0;

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    if (!empty($password)) {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^a-zA-Z0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $weak = '*Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        } else if (strlen($password) > 30) {
            $weak = '*Maximum 30 characters only!';
        } else {
            $valid = 1;
        }

        if (strcmp($password, $confirm) != 0) {
            if (empty($confirm)) {
                $confirmempty = '*Please confirm your new password before submitting.';
                $valid == 0;
            } else {
                $passwordnotsame = '*Those passwords did not match. Please enter again.';
                $valid == 0;
            }
        }

        if ($valid == 1) {
            $password = md5($password);
            $sql = "UPDATE user_form SET password = '$password' WHERE id = '" . $_SESSION['id'] . "'";
            mysqli_query($conn, $sql);
            echo '<script>alert("Reset Password Sucessfully!")</script>';
        }
    } else {
        if (empty($password))
            $passwordempty = '*Please enter your new password before submitting.';
        if (empty($confirm))
            $confirmempty = '*Please confirm your new password before submitting.';
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
                    <li><a href="account.php">Account <span>></span></a></li>
                    <li><a href="change_password.php" class="active">Change Password <span>></span></a></li>
                    <li><a href="events_joined.php">Events Joined <span>></span></a></li>
                </ul>
            </div>
            <div class="account-detail">
                <h2>Account</h2>
                <div class="user-detail">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="account-form" method="post">
                        <h4>Change Your Password</h4>
                        <div class="form-group">
                            <label>Enter New Password</label>
                            <input type="text" name="password" placeholder="8 to 30 characters only"
                                value="<?php echo (isset($password)) ? $password : ''; ?>">
                            <span class="error">
                                <?php echo $passwordempty, $weak; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="text" name="confirm" placeholder="Confirm Your Password"
                                value="<?php echo (isset($confirm)) ? $confirm : ''; ?>">
                            <span class="error">
                                <?php echo $confirmempty, $passwordnotsame; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Reset Password">
                        </div>
                    </form>
                </div>
            </div>
    </section>
</body>

</html>