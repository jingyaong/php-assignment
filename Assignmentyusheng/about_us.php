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
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="about_us.css">
    <link rel="stylesheet" type="text/css" href="sidebar.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <section class="home">
        <div class="text">About Us</div>
        <div class="section">
            <div class="container">
                <div class="content-section">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <div class="content">
                        <h3>What is our purpose?</h3>
                        <p>The Computer Science Society is a community of students and professionals who are passionate
                            about all things related to computer science. Our goal is to provide opportunities for our
                            members to learn, network, and grow their skills.</p>
                    </div>
                </div>
                <div class="image-section">
                    <img src="images/img11.png">
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="content-section1">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <div class="content">
                        <h3>What do we do?</h3>
                        <p>We hold regular events and workshops on topics such as programming languages, web
                            development, data science, and more. We also offer resources such as job boards, mentorship
                            programs, and scholarships to help our members succeed in their careers.</p>
                    </div>
                </div>
                <div class="image-section1">
                    <img src="images/codeimage.jpg">
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="content-section">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <div class="content">
                        <h3>What can we provide?</h3>
                        <p>We offer various resources such as job boards, mentorship programs, and scholarships to help
                            our members succeed in their careers.</p>
                    </div>
                </div>
                <div class="image-section">
                    <img src="images/csResource.jpg">
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="content-section1">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <div class="content">
                        <h3>Our Society</h3>
                        <p>Our society is committed to fostering a welcoming and inclusive community where members can
                            connect with like-minded individuals and grow both personally and professionally.</p>
                    </div>
                </div>
                <div class="image-section1">
                    <img src="images/imgperson.png">
                </div>
            </div>
        </div>
    </section>

</body>

</html>