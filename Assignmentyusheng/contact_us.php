<?php

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
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="contact_us.css">
    <link rel="stylesheet" type="text/css" href="sidebar.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <section class="home">
        <div class="text">Contact Us</div>
        <div class="container">
            <div class="contact-box" id="contact-box">
                <div class="left"></div>
                <div class="right">
                    <form action="send.php" method="post">
                        <h2 id="h2">Contact Us</h2>




                        <input type="email" name="email" id="email " class="field" placeholder="Your Email"
                            value="cs041107@gmail.com" required>


                        <input type="text" class="field" name="subject" id="subject" placeholder="Subject" value=""
                            required>


                        <textarea class="field area" name="message" id="message" placeholder="Message" value=""
                            required=""></textarea>
                        <button class="btn" name="Send">Send</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>