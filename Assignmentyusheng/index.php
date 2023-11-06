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
    <title>Computer Science Society</title>
    <link rel="stylesheet" type="text/css" href="sidebar.css">
    <link rel="stylesheet" href="index.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="hero">
        <div class="detel">
            <h1>Welcome to <span>CS Society</span></h1>
            <p>This society is a community of individuals with a shared interest in the field of<br>computer science.
                The society brings together students who are passionate<br> about the latest technological advancements
                and their potential applications. </p>
            <a href="event.php">Join us now!</a>
        </div>
        <div class="images">
            <img src="images/shape.png" class="shape">
            <img src="images/computer.png" class="computer">
        </div>

        <div class="social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</body>

</html>