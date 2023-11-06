<?php
include 'config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
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
                    <li><a href="change_password.php">Change Password <span>></span></a></li>
                    <li><a href="events_joined.php" class="active">Events Joined <span>></span></a></li>
                </ul>
            </div>
            <div class="account-detail">
                <h2>Account</h2>
                <div class="user-detail">
                    <h4>Events Joined</h4>
                    <table>
                        <tr>
                            <th>Event Name
                            <th>Date Joined
                        </tr>
                        <?php
                        $sql = "SELECT s.eventName, s.joinDate FROM user_form user JOIN students s ON user.id = s.id WHERE s.id = '".$_SESSION['id']."'";
                        $results = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($results) > 0) {
                            foreach ($results as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['eventName'] . "</td>";
                                echo "<td>" . $row['joinDate'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan = 2>No events joined</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
    </section>
</body>

</html>