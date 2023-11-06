<?php
include 'config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../index.php');
}

$sql = "SELECT event_name, description, date_format(starting_date, '%d/%m/%Y') AS starting_date, date_format(ending_date, '%d/%m/%Y') AS ending_date, event_pic FROM event_list WHERE event_type = 'event'";
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
            <p>OPEN DAY</p>
            <h1>Events</h1>
        </div>
        <div class="feature-box">
            <div class="desc">
                <h1></h1>
                <div class="description">
                    <div class="description-text">
                        <p>Hey there! TAR UMT is organizing bus transportation to this event.
                            Kindly fill in this form to book a seat if you're going to this event
                            (remember to fill in the event registration form too)</p><br>
                        <p>Date : 18th March 2023 (Saturday)</p>
                        <p>Time : 9am - 5pm</p>
                        <p>Venue : Dewan Tunku Canselor, Universiti Malaya </p>

                        <p>🏢Open Day Event Registration Link : https://forms.gle/C2jC6oKGqvs1ZZxD8</p><br>

                        <p>🚌TAR UMT Bus Transport Registration link:
                            https://forms.gle/6oFCFBvutLFr5hobA</p><br>

                        <p>*Attendance leave letters will be provided (to be submitted during application for attendance
                            leave in intranet)</p><br>

                        <p>Event description:<br />
                            Join us for the Ultimate Career Fair happening this March 2023! With 40 over companies
                            present, you won't want to miss this perfect opportunity!</p><br>

                        <p>Discover your dream career at our IEM X ESUM YES Open Day 2023! 🤩</p>

                        <p>Are you a student or fresh graduate looking for your next career opportunity?
                            🎓Or a working engineer seeking a new challenge? Look no further!
                            Join us for the largest career fair event of the year at Universiti Malaya - the IEM X ESUM
                            YES Open Day 2023
                            on 18th March 2023, from 9am to 5pm, at Dewan Tunku Canselor, Universiti Malaya. </p><br>

                        <p>This event will bring together 40 of the biggest and most reputable companies in the
                            industry,
                            including Nestlé, Dell Technologies, Huawei, Western Digital, AAF, Texas Instruments,
                            Toyota,
                            IAQ Solutions, MDC Concrete, IJM, Plexus Manufacturing, Mikro MSC and many more! What's
                            more,
                            we also have exhibition booths, career talkshows, and networking sessions too! 😄</p><br>

                        <p>Don't miss out on this incredible opportunity to meet face-to-face with industry leaders,
                            discover the perfect career and potentially land a job. Register today and mark the date on
                            your calendar! We look forward to seeing you there!🥳</p><br>
                        <div class="btn"><a href="register_event.php">Register</a></div>
                        <input type="button" class="btn btn-primary" value="Go back!" onclick="history.back()">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    foreach ($result as $row) {
    echo "<section id=\"event1\">
        <div class=\"title-text\">
            <p>OPEN DAY</p>
            <h1>Events</h1>
        </div>
        <div class=\"feature-box\">
            <div class=\"desc\">
                <h1></h1>
                <div class=\"description\">
                    <div class=\"description-text\">
                        <p>Hey there! TAR UMT is organizing the ".$row['event_name']." event.
                            Kindly fill in this form to book a seat if you're going to this event
                            (remember to fill in the event registration form too)</p><br>
                        <p>Date : ".$row['starting_date']." to ".$row['ending_date']." </p>
                        <p>Time : 9am - 5pm</p>
                        <p>Venue : Dewan Tunku Canselor, Universiti Malaya </p>

                        <p>🏢Open Day Event Registration Link : https://forms.gle/C2jC6oKGqvs1ZZxD8</p><br>

                        <p>🚌TAR UMT Bus Transport Registration link:
                            https://forms.gle/6oFCFBvutLFr5hobA</p><br>

                        <p>*Attendance leave letters will be provided (to be submitted during application for attendance
                            leave in intranet)</p><br>

                        <p>Event description:<br />
                            ".$row['description']."</p><br>

                        <p>Discover your dream career at our IEM X ESUM YES Open Day 2023! 🤩</p>

                        <p>Are you a student or fresh graduate looking for your next career opportunity?
                            🎓Or a working engineer seeking a new challenge? Look no further!
                            Join us for the largest career fair event of the year at Universiti Malaya - the IEM X ESUM
                            YES Open Day 2023
                            from ".$row['starting_date']." to ".$row['ending_date'].", from 9am to 5pm, at Dewan Tunku Canselor, Universiti Malaya. </p><br>

                        <p>This event will bring together 40 of the biggest and most reputable companies in the
                            industry,
                            including Nestlé, Dell Technologies, Huawei, Western Digital, AAF, Texas Instruments,
                            Toyota,
                            IAQ Solutions, MDC Concrete, IJM, Plexus Manufacturing, Mikro MSC and many more! What's
                            more,
                            we also have exhibition booths, career talkshows, and networking sessions too! 😄</p><br>

                        <p>Don't miss out on this incredible opportunity to meet face-to-face with industry leaders,
                            discover the perfect career and potentially land a job. Register today and mark the date on
                            your calendar! We look forward to seeing you there!🥳</p><br>
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