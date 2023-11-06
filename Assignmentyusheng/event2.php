<?php
include 'config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}

$sql = "SELECT event_name, description, date_format(starting_date, '%d/%m/%Y') AS starting_date, date_format(ending_date, '%d/%m/%Y') AS ending_date, event_pic FROM event_list WHERE event_type = 'class'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Society</title>
    <link rel="stylesheet" href="event1.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <section id="event1">
        <div class="title-text">
            <p>CLASS</p>
            <h1>Events</h1>
        </div>
        <div class="feature-box">
            <div class="desc">
                <h1>🌐 Intro to Web3 🌐</h1>
                <div class="description">
                    <div class="description-text">
                        <p>

                            Web3 ... sounds familiar?😎 It's common to hear it everyway these days due to growing
                            demands in the tech industry.
                            But where should you start? Well, good timing 🎁 because:</p><br>

                        <p>In collaboration with KopiDAO, together with ELVTD and Polygon Malaysia,
                            we are excited to announce this good chance in exploring the fundamentals of Web3. </P><br>

                        <p>Seemingly, Web3 is starting to gain momentum🏃‍♂️ and more significant adoption in the
                            technology industry.
                            Fun fact: big brands like JP Morgan, Instagram, Starbucks, Disney are already integrating
                            Web3 technologies into
                            their business operations.🗃 </p><br>

                        <p>🗓 23rd March 2023 (Thursday)</p>
                        <p>🕕 6-8 pm</P>
                        <p>🏢 DK1 TAR UMT</p>

                        <p>Dinner is provided for all workshop participants😃 Pizzas🍕 and beverages🧃 </p><br>

                        <p>If you are attending, kindly fill in this form (take it as the registration form):
                            https://tally.so/r/nGeEjL</P><br>

                        <p>(First come first serve🤗 Only 80 spots available, the form will be closed once the limit has
                            reached,
                            grab your seats🤭)</p><br>

                        <p>*For soft skill points, you will be given a form to fill in at the end of the workshop👍</p>
                        <br>

                        <p>Some info on KopiDAO☕️: <br />
                        <p>They are a community of builders passionate about the potential of Web3. They are breaking
                            the barriers of
                            entry into Web3, especially with the use of no-code tools to help builders bring their ideas
                            to life at a snap
                            of the fingers. Sounds interesting ?✨️</p><br>

                        <p>As part of their Campus Connect series with Polygon Malaysia, their Web3 Fundamentals
                            workshop will cover
                            everything a student needs to know about Web3 technology at the basic level, including an
                            experiential
                            hands-on workshop. In just under 2 hours (if you follow closely😁), you'll will be able to
                            walk away with
                            valuable knowledge presented using simple-to-follow real world analogies.✨️</p><br>
                        <div class="btn"><a href="register_event.php">Register</a></div>
                        <input type="button" class="btn btn-primary" value="Go back!" onclick="history.back()">
                    </div>
                </div>
            </div>
            <div class="desc-img">
                <img src="img/img6.jpeg">
            </div>
        </div>
    </section>

    <?php
    foreach ($result as $row) {
        echo "<section id=\"event1\">
        <div class=\"title-text\">
            <p>CLASS</p>
            <h1>Events</h1>
        </div>
        <div class=\"feature-box\">
            <div class=\"desc\">
                <h1>🌐 ".$row['event_name']." 🌐</h1>
                <div class=\"description\">
                    <div class=\"description-text\">
                        <p>

                            Web3 ... sounds familiar?😎 It's common to hear it everyway these days due to growing
                            demands in the tech industry.
                            But where should you start? Well, good timing 🎁 because:</p><br>

                            <p>In collaboration with KopiDAO, together with ELVTD and Polygon Malaysia,
                            we are excited to announce this good chance in exploring the fundamentals of Web3. </P><br>

                            <p>Seemingly, Web3 is starting to gain momentum🏃‍♂️ and more significant adoption in the
                            technology industry.
                            Fun fact: big brands like JP Morgan, Instagram, Starbucks, Disney are already integrating
                            Web3 technologies into
                            their business operations.🗃 </p><br>

                        <p>🗓 " . $row['starting_date'] . " to " . $row['ending_date'] . "</p>
                        <p>🕕 6-8 pm</P>
                        <p>🏢 DK1 TAR UMT</p>

                        <p>".$row['description']."</p><br>

                        <p>As part of their Campus Connect series with Polygon Malaysia, their Web3 Fundamentals
                            workshop will cover
                            everything a student needs to know about Web3 technology at the basic level, including an
                            experiential
                            hands-on workshop. In just under 2 hours (if you follow closely😁), you'll will be able to
                            walk away with
                            valuable knowledge presented using simple-to-follow real world analogies.✨️</p><br>
                        <div class=\"btn\"><a href=\"register_event.php\">Register</a></div>
                        <input type=\"button\" class=\"btn btn-primary\" value=\"Go back!\" onclick=\"history.back()\">
                    </div>
                </div>
            </div>
            <div class=\"desc-img\">
                <img src=\"admin/upload/" . $row['event_pic'] . "\">
            </div>
        </div>
    </section>";
    }
    ?>

</body>

</html>