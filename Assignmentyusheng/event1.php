<?php
include 'config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}

$sql = "SELECT event_name, description, date_format(starting_date, '%d/%m/%Y') AS starting_date, date_format(ending_date, '%d/%m/%Y') AS ending_date, event_pic FROM event_list WHERE event_type = 'competition'";
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
            <p>COMPETITION</p>
            <h1>Events</h1>
        </div>
        <div class="feature-box">
            <div class="desc">
                <h1>V hack 2023 Info Sessions</h1>
                <div class="description">
                    <div class="description-text">
                        <p>Bringing the hackathon info session virtually to you! Get a sneak peek into your
                            V hack 2023 journey by learning more about the hackathon flow, challenges and
                            the amazing prizes that awaits you through our Info Session.</p><br>
                        <p>This is the perfect chance to get a taste of what V Hack 2023 has in store.
                            So, grab your device, grab a seat, and get ready for a journey like no other! 🚀</p><br>
                        <p>https://bit.ly/VHackInfoSession!</p><br>
                        <p>#VHack2023<br />
                            #IdeateInnovateIgnite</p>
                        <div class="btn"><a href=register_event.php>Register</a></div>
                        <input type="button" class="btn btn-primary" value="Go back!" onclick="history.back()">
                    </div>
                </div>
            </div>
            <div class="desc-img">
                <img src="img/img4.jpeg">
            </div>
        </div>
    </section>

    <section id="event1">
        <div class="feature-box">
            <div class="desc">
                <h1>Varsity Hackathons 2023</h1><br>
                <div class="description">
                    <div class="description-text">
                        <p>Registration for Varsity Hackathon 2023 is now open!</p><br>
                        <p>V Hack 2023 is a student-led international hackathon for local and international
                            undergraduates to
                            compete by formulating the best solutions to solve real-world issues.</p><br>
                        <p>🚩 Register now at https://vhackusm.com/</p><br>
                        <p>Prize pool up to RM 15000 awaiting you!<br />
                            🥇 1st Prize: RM 5000<br />
                            🥈 2nd Prize: RM 3000<br />
                            🥉 3rd Prize: RM 1500<br />
                            🏅 4th - 5th Prize: RM 300<br />
                            🏅 Consolation x5: RM 250</p>
                        <p>📍𝐏𝐫𝐞𝐥𝐢𝐦𝐢𝐧𝐚𝐫𝐲 Round (Virtual) : 11th March 2023 - 15th March 2023<br />
                            📍𝐆𝐫𝐚𝐧𝐝 Final (Physical) :1st April 2023 - 2nd April 2023</p>
                        <p> V Hack 2023 official pages for more updates:
                            https://linktr.ee/vhackusm</p>
                        <p>
                            #VHack2023<br />
                            #IdeateInnovateIgnite</p>
                        <div class="btn"><a href="register_event.php">Register</a></div>
                        <input type="button" class="btn btn-primary" value="Go back!" onclick="history.back()">
                    </div>
                </div>
            </div>
            <div class="desc-img">
                <img src="img/img7.jpeg">
            </div>
        </div>
    </section>

    <?php
    foreach ($result as $row) {
        echo "<pre>";
        echo "<section id=\"event1\">
        <div class=\"feature-box\">
            <div class=\"desc\">
                <h1>" . $row['event_name'] . "</h1><br>
                    <div class=\"description\">
                        <div class=\"description-text\">
                            <p>" . $row['description'] . "</p><br>
                            <p>📍Event Duration :" . $row['starting_date'] . " - " . $row['ending_date'] . "<br />
                            <p> Visit V Hack 2023 official pages for more updates: https://linktr.ee/vhackusm</p>
                            <p>#VHack2023<br />#IdeateInnovateIgnite</p>
                            <div class=\"btn\"><a href=\"register_event.php\">Register</a></div><input type=\"button\" class=\"btn btn-primary\" value=\"Go back!\" onclick=\"history.back()\">
                        </div>
                    </div>
                </div>
                <div class=\"desc-img\">
                    <img src=\"admin/upload/" . $row['event_pic'] . "\">
                </div>
            </div>
        </section>";
        echo "</pre>";
    }
    ?>

</body>

</html>