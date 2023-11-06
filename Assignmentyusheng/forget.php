<?php
session_start();
@include 'config.php';

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      // generate new password
      $new_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
      $hashed_password = md5($new_password);

      // update password in database
      $update = "UPDATE user_form SET password = '$hashed_password' WHERE email = '$email' ";
      mysqli_query($conn, $update);

      // send email with new password
      $to = $email;
      $subject = 'New Password for Login';
      $message = 'Your new password is: ' . $new_password;
      ini_set('SMTP', 'mail.example.com');
      ini_set('smtp_port', 587);

      $headers = 'From: wongyusheng9632@gmail.com' . "\r\n" .
         'Reply-To: wongys-wm22@student.tarc.edu.my' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);

      $success_msg = "A new password has been sent to your email address.";

   } else {
      $error[] = 'The email you entered is not registered!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>login now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
         } elseif (isset($success_msg)) {
            echo '<span class="success-msg">' . $success_msg . '</span>';
         }
         ?>
         <input type="email" name="email" required placeholder="enter your email">
         <input type="submit" name="submit" value="forgot password" class="form-btn">

      </form>

   </div>

</body>

</html>