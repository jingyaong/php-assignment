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
    <title>Computer Science Events</title>
    <link rel="stylesheet" type="text/css" href="event.css">
    <link rel="stylesheet" type="text/css" href="sidebar.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <section class="home">
        <div class="text">Events</div>
        <div class="leftbox">
            <div class="content">
                <h1>Computer Science Event</h1>
                <p>Hi and welcome to our event on computer science!
                    We've met here today to celebrate the wonderful field of computer science
                    and its influence on our lives. From artificial intelligence to cybersecurity,
                    software engineering to data analysis, computer science has transformed the way we live,
                    work, and communicate.<br />
                    This event will include keynote speakers who will share their industry views and experiences,
                    panel discussions on current computer science subjects, and interactive workshops where
                    you may acquire new skills and approaches. You'll be able to network with other professionals
                    and students in the sector, as well as discover career prospects and pathways.<br />
                    Whether you are a seasoned expert or a student just starting out in the area,
                    this event is ideal for expanding your knowledge and love for computer science.
                    So sit back, relax, and prepare to enter the fascinating world of computer science!
                </p>
            </div>
        </div>
        <div class="events">
            <ul>
                <li>
                    <div class="choice">
                        <h2>Competition</h2>
                    </div>
                    <div class="details">
                        <ol>
                            <li>
                                <h3>V hack 2023 Info Section</h3>
                            </li>
                            <li>
                                <h3>Varsity Hackathon 2023</h3>
                            </li>
                        </ol>
                        <a href="event1.php">View Details</a>
                    </div>
                    <div style="clear:both;"></div>
                </li>
                <li>
                    <div class="choice">
                        <h2>Class</h2>
                    </div>
                    <div class="details">
                        <ol>
                            <li>
                                <h3>Intro to web3</h3>
                            </li>
                        </ol>

                        <a href="event2.php">View Details</a>
                    </div>
                    <div style="clear:both;"></div>
                </li>
                <li>
                    <div class="choice">
                        <h2>Event</h2>
                    </div>
                    <div class="details">
                        <ol>
                            <li>
                                <h3>IEM X ESUM YES Open Day2023</h3>
                            </li>
                        </ol>
                        <a href="event3.php">View Details</a>
                    </div>
                    <div style="clear:both;"></div>
                </li>
            </ul>
        </div>
    </section>

</body>

</html>